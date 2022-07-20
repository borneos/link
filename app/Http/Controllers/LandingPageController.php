<?php

namespace App\Http\Controllers;

use App\Landing;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\CloudinaryStorage;
use App\Links;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $landings = Landing::select('landings.*', 'posts.prefix')->join('posts', 'landings.post_id', '=',  'posts.id')->where(['posts.user_id' => Auth::user()->id, 'posts.type' => 'landing'])->get();

        $links = Links::select('links.*')->join('landings','landings.id', '=', 'links.landings_id')->join('posts', 'posts.id', '=', 'landings.post_id')->where('posts.user_id', Auth::user()->id)->get();

        // $data_link = json_decode($landings[0]->links);

        return view('landing.dashboard', [
            'landings' => $landings,
            'links' => $links
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $landing = Post::select('prefix')->where(['type' => 'landing', 'user_id' => Auth::user()->id])->get()->count();
        // // $landing = Post::select('prefix')->where(['type' => 'landing' , 'user_id' => $request->id])->get()->count();

        $datas = Landing::select('landings.*', 'posts.*')->join('posts', 'landings.post_id', '=',  'posts.id')->where('posts.user_id', Auth::user()->id)->get();

        return view('landing.dashboard');

        // return view('landing.biodata');
        // return response()->json($landing, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'prefix' => 'required|unique:posts',
            // 'value' => 'required'
        ]);

        $user = Auth::user()->id;

        $post = new Post();
        $post->prefix = $request->prefix;
        // $post->value = config('app.url').'/'.'landing-page';
        $post->value = config('app.url') . '/' . $request->prefix;
        $post->shortUrl =  config('app.url') . '/' . $request->prefix;
        $post->user_id = $user;
        $post->type = 'landing';

        $post->save();

        $post_id = Post::select('id')->where(['type' => 'landing', 'user_id' => Auth::user()->id])->first();
        $landing = new Landing();

        $landing->post_id = $post_id->id;
        $landing->image = '';
        $landing->title = '';
        $landing->description = '';
        $landing->social_facebook = '';
        $landing->social_twitter = '';
        $landing->social_youtube = '';
        $landing->social_instagram = '';
        $landing->social_linkedin = '';
        $landing->links = '';

        // dd($landing);

        $landing->save();
        // dd($request->prefix);

        // return response()->json($post, 200);

        Alert::success('Success', 'Data has been saved');
        return redirect()->route('landing.index');
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

    public function biodata()
    {

        $landings = Landing::select('landings.*', 'posts.prefix')->join('posts', 'landings.post_id', '=',  'posts.id')->where(['posts.user_id' => Auth::user()->id, 'posts.type' => 'landing'])->get();

        // $landings = Landing::get();

        // dd($landings);

        return view('landing.biodata', [
            'landings' => $landings
        ]);
    }

    public function showDashboardLanding(Request $request)
    {

        $landings = Landing::select('landings.*', 'posts.prefix', 'posts.value', 'posts.visited')->join('posts', 'landings.post_id', '=',  'posts.id')->where(['posts.user_id' => Auth::user()->id, 'posts.type' => 'landing'])->get();

        $links = Links::select('links.*')->join('landings','links.landings_id', '=', 'landings.id')->join('posts', 'landings.post_id', '=', 'posts.id')->where('posts.user_id', Auth::user()->id)->get();

        $landing_count = Landing::select('landings.*', 'posts.prefix')->join('posts', 'landings.post_id', '=',  'posts.id')->where(['posts.user_id' => Auth::user()->id, 'posts.type' => 'landing'])->count();


        if ($landing_count == 0){
            return view('landing.create');
        } else {
            // $data_link = json_decode($landings[0]->links);
            // dd($data_link);

            return view('landing.dashboard', [
                'landings' => $landings,
                'links' => $links
            ]);
        }

    }

    public function getPrefix(Request $request)
    {
        $prefix = $request->prefix;
        // $id = $request->id;

        $post = Post::select('prefix')->where(['prefix' => $prefix, 'type' => 'landing'])->get()->count();
        // $post = Post::select('prefix')->where(['prefix' => $prefix, 'type' => 'landing', 'user_id' => Auth::user()->id ])->get()->count();
        return response()->json($post, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $landing = Landing::findOrFail($id);

        return view('landing.biodata', [
            'landing' => $landing
        ]);
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
        $landing = Landing::findOrFail($id);


        $image = $request->file('images');
        if ($image){
            // store image to cloudinary
            $result = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());
            $landing->image = $result ?? '';
        }

        $landing->title = $request->title ?? '';
        $landing->description = $request->description ?? '';
        $landing->social_facebook = $request->facebook ?? '';
        $landing->social_twitter =  $request->twitter ?? '';
        $landing->social_youtube =  $request->youtube ?? '';
        $landing->social_instagram = $request->instagram ?? '';
        $landing->social_linkedin = $request->linkedin ?? '';

        $landing->save();

        Alert::success('Success', 'Biodata telah disimpan');
        return redirect()->route('biodata');
    }

    public function updateLinks(Request $request, $id)
    {

        $landing = Landing::findOrFail($id);

        $item = [];
        $no = 1;
        $data = '';

        if ($request->url == null){
            $data = '';
        } else {
            foreach ($request->url as $key => $value) {

                $item[] = [
                    'id' => $no,
                    'url' => $request->url[$key],
                    'text' => $request->text[$key],
                ];
                $no++;
            }
            $data = json_encode($item);
        }

        Landing::whereIn('id', [$id])->update(['links' => $data]);


        Alert::success('Success', 'Link telah disimpan');
        return redirect()->route('dashboard-landing');
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
    }
}
