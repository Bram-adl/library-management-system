<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.pages.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'username' => 'required|string',
            'email' => 'required|email|unique:user',
            'password' => 'required|string|min:4',
            'level' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $image = $request->foto;
        $imageName = time() . "." . $image->extension();

        $image->move(public_path('images'), $imageName);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'level' => $request->level,
            'foto' => $imageName,
        ]);

        return redirect()->route('users.index');
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
        $user = User::firstWhere('id_user', $id);
        
        return view('admin.pages.users.edit', ['user' => $user]);
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
        $request->validate([
            'username' => 'required|string',
            'email' => 'sometimes|email|',
            'password' => 'sometimes',
            'level' => 'required|string',
            'foto' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = User::firstWhere('id_user', $id);
        $foto = $user->foto;
        
        if ($request->foto) {
            $image = $request->foto;
            $imageName = time() . "." . $image->extension();

            $image->move(public_path('images'), $imageName);

            if (file_exists(public_path('images') . $foto)) {
                @unlink(public_path('images') . $foto);
            }

            $user->foto = $imageName;
            $user->save();
        }

        $user->username = $request->username;
        $user->email = $request->email;

        if ( $request->password ) {
            $user->password = Hash::make($request->password);
        }

        $user->level = $request->level;
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id_user', $id);
        $user->delete();

        return redirect()->back();
    }
}
