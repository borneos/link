<?php

namespace App\Http\Controllers;

use App\Landing;
use App\Links;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get data where user id
        $posts = Post::where('user_id', Auth::user()->id)->get();
        // $posts = Post::select(['id', 'prefix', 'value', 'shortUrl', 'visited'])->where('user_id', Auth::user()->id)->where('type' , '!=', 'landing')->get();
        return view('dashboard.post', [
            'posts' => $posts
        ]);
    }

    public function data(){

        // $posts = Post::select(['id', 'prefix', 'value', 'shortUrl', 'visited']);
        $posts = Post::where('user_id', Auth::user()->id)->where('type' , '!=', 'landing')->get();

        // Yajra Datatables, serverside rendering
        return Datatables::of($posts)
            ->addIndexColumn()
            ->editColumn('action', function($post){
                return '<form action="'.route('generate.destroy', $post->id).'" method="POST">
                    <a href="'.route('edit-posts', [$post->prefix, $post->id]).'" class="btn btn-primary" title="Edit"><i class="fas fa-pen"></i></a>
                    '.csrf_field().'
                    '.method_field("DELETE").'
                    <button title="Delete" type="submit" class="btn btn-link" onclick="return confirm(\'Are you sure?\')"> <i class="fas fa-trash"></i> </button>
                </form>
                ';
            })->make(true);

        // return Datatables::of($posts)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = Auth::user()->id;
        // dd($user);

        $request->validate([
            'prefix' => 'required|unique:posts|max:255',
            // 'value' => 'required'
        ],
        [
            'prefix.max' => 'Maaf, shortlink tidak dapat disimpan karena melebihi batas 100 karakter'
        ]);

        // retrieve request
        $post = new Post();
        $post->prefix = $request->prefix;
        $post->value = $request->value;
        $post->shortUrl =  config('app.url').'/'.$request->prefix;
        $post->user_id = $user;

        if ($post->save()) {

            Alert::success('Success', 'Data has been saved');
            return redirect()->route('generate.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    // get data prefix
    public function getPrefix(Request $request){
        $prefix = $request->prefix;


        $post = Post::select('prefix')->where('prefix', $prefix)->get()->count();
        return response()->json($post, 200);
    }

    public function shortenLink($prefix){
        $post = Post::where('prefix', $prefix)->first();
        $postIncrement = Post::where('prefix', $prefix)->increment('visited');
        if ($post == null){
            return abort(404);
        }
        // cek jika $post->type === landing maka return ke view landing
        else if($post->type == 'landing'){

            $landings = Landing::select('landings.*', 'posts.prefix')->join('posts', 'landings.post_id', '=',  'posts.id')->where(['posts.prefix' => $prefix, 'posts.type' => 'landing'])->get();

            $links = Links::select('links.*')->join('landings','landings.id', '=', 'links.landings_id')->join('posts', 'posts.id', '=', 'landings.post_id')->where('posts.prefix', $prefix)->get();

            // $data_link = json_decode($landings[0]->links);
            return view('landing', [
                'landings' => $landings,
                'links' => $links
                // 'data_link' => $data_link
            ]);
        }
        // if post === true
        else if ($post->type != 'landing'){
            // update visitor+1 from post where prefix = $prefix

            if (strpos($post->value, 'https://') !== false){
                return redirect($post->value);
            } else {
                return redirect('https://'.$post->value);
            }

        }

    }

    public function generateRandomString() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 7; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    public function generateLink(Request $request){
        $request->validate([
            'prefix' => 'unique:posts'
        ]);

        if ($request->valuewa && $request->valueaddress){

            $postWA = new Post();
            $postWA->prefix = $this->generateRandomString();
            $postWA->value = $request->valuewa;
            $postWA->shortUrl =  config('app.url').'/'.$postWA->prefix;
            $postWA->type = 'wa';

            $postAddress = new Post();
            $postAddress->prefix = $this->generateRandomString();
            $postAddress->value = $request->valueaddress;
            $postAddress->shortUrl =  config('app.url').'/'.$postAddress->prefix;
            $postAddress->type = 'address';

            $postWA->save();
            $postAddress->save();
            return response()->json([$postWA, $postAddress], 200);

        }
        else if ($request->valuewa){

            $postWA = new Post();
            $postWA->prefix = $this->generateRandomString();
            $postWA->value = $request->valuewa;
            $postWA->shortUrl =  config('app.url').'/'.$postWA->prefix;
            $postWA->type = 'wa';
            $postWA->save();
            return response()->json($postWA, 200);

        } else if ($request->valueaddress){

            $postAddress = new Post();
            $postAddress->prefix = $this->generateRandomString();
            $postAddress->value = $request->valueaddress;
            $postAddress->shortUrl =  config('app.url').'/'.$postAddress->prefix;
            $postAddress->type = 'address';
            $postAddress->save();
            return response()->json($postAddress, 200);

        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($prefix, $id)
    {
        //
        $post = Post::where(['prefix' => $prefix , 'id' => $id])->get();

        // dd($post->count());

        if ($post->count() != 0){
            return view('dashboard.edit', [
                'post' => $post[0]
            ]);
        }else{
            return abort(404);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post = Post::findOrFail($id);
        $post->prefix = $request->prefix;
        $post->value = $request->value;

        dd($post);
        $post->save();
        Alert::success('Success', 'Data has been updated!');
        return redirect()->route('generate.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::findOrFail($id);

        $post->delete();
        Alert::success('Success', 'Data has been deleted!');
        return redirect()->route('generate.index');
    }
}
