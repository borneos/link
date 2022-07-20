<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mockery\Matcher\HasKey;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::join('posts', 'users.id', '=', 'posts.user_id')
        ->join('landings', 'landings.post_id', '=', 'posts.id')
        ->select('users.*', 'landings.image')
        ->where('users.id', Auth::user()->id)->get();

        return view('profile.profile', [
            'users' => $users
        ]);
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
        //
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required|min:8',
            'confirmpassword' => 'same:newpassword|min:8'
        ]);

        // dd($request);


        $user = User::findOrFail($id);

        if (Hash::check($request->oldpassword, $user->password)){
            // $user->password = Hash::make($request->newpassword);
            $user->fill(['password' => Hash::make($request->newpassword)])->save();

            Alert::success('Success', 'Berhasil mengubah password');
            // return header("refresh:5;url=logout");
            // return redirect('login')->withSuccessMessage('Password berhasil diubah, silahkan login kembali');
            return redirect()->route('logout');
        } else {
            Alert::error('Error', 'Gagal mengubah password');
            return redirect()->route('profile.index');
        }
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
