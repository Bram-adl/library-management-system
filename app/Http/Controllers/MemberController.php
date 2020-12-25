<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();
        return view('admin.pages.members.index', ['members' => $members]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validasi
        $request->validate([
            'id_anggota' => 'required|string|unique:anggota',
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'jk' => 'required|string',
            'no_hp' => 'required|numeric',
        ]);

        Member::create([
            'id_anggota' => $request->id_anggota,
            'nama' => $request->nama,
            'alamat'=> $request->alamat,
            'jk'=> $request->jk,
            'no_hp' => $request->no_hp
        ]);

        return redirect()->route('members.index');
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
        $member = Member::firstWhere('id_anggota', $id);

        return view('admin.pages.members.edit', ['member' => $member]);
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
        //Validasi
        $request->validate([
            'nama' => 'required|string',
            'jk' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
        ]);

        $id = Member::where('id_anggota', $id)
                        ->update([
                            'nama' => $request->nama,
                            'jk' => $request->jk,
                            'alamat' => $request->alamat,
                            'no_hp' => $request->no_hp,
        ]);
        return redirect()->route('members.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();

        return redirect()->route('members.index');
    }
}
