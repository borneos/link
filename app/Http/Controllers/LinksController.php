<?php

namespace App\Http\Controllers;

use App\Landing;
use App\Links;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id)
    {
        //


    }

    public function storeLinks(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'link' => 'required',
        ]);

        $links = new Links();

        $links->landings_id = $id;
        $links->name = $request->name;
        $links->link = $request->link;
        $links->visited = 0;

        // dd($links);
        $links->save();
        Alert::success('Success', 'Link has been saved');
        return redirect()->route('dashboard-landing');
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

    public function showLink(Request $request){

        $links = Links::where('id', $request->id)->first();

        $counter = Links::where('id', $request->id)->increment('visited');
        return redirect($links->link);
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
        $links = Links::findOrFail($id);
        return response()->json($links, 200);
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
        $links = Links::findOrFail($id);
        $links->name = $request->name;
        $links->link = $request->link;

        // dd($links);
        $links->save();
        Alert::success('Success', 'Data has been updated!');
        return redirect()->route('dashboard-landing');

    }

    public function changeLinks($id){

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
        $links = Links::findOrFail($id);

        $links->delete();
        Alert::success('Success', 'Data has been deleted!');
        return redirect()->route('dashboard-landing');
    }
}
