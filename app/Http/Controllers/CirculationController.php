<?php

namespace App\Http\Controllers;

use App\Circulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CirculationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $circulations = DB::table('sirkulasi')
                            ->join('buku', 'buku.id_buku', 'sirkulasi.id_buku')
                            ->join('anggota', 'anggota.id_anggota', 'sirkulasi.id_anggota')
                            ->select(
                                'sirkulasi.id_sirkulasi', 'sirkulasi.tanggal_pinjam', 'sirkulasi.tanggal_kembali',
                                'anggota.nama', 'buku.judul_buku',
                            )
                            ->get();

        return view('admin.pages.circulations.index', ['circulations' => $circulations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = DB::table('buku')->get();
        $members = DB::table('anggota')->get();
        
        return view('admin.pages.circulations.create', [
            'books' => $books,
            'members' => $members,
        ]);
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
            'id_sirkulasi' => 'required|string|unique:sirkulasi',
            'id_buku' => 'required|string',
            'id_anggota' => 'required|string',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date',
        ]);

        Circulation::create([
            'id_sirkulasi' => $request->id_sirkulasi,
            'id_buku' => $request->id_buku,
            'id_anggota' => $request->id_anggota,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
        ]);

        return redirect()->route('circulations.index');
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
        $circulation = DB::table('sirkulasi')
                            ->join('buku', 'buku.id_buku', 'sirkulasi.id_buku')
                            ->join('anggota', 'anggota.id_anggota', 'sirkulasi.id_anggota')
                            ->select(
                                'sirkulasi.id_sirkulasi', 'sirkulasi.tanggal_pinjam', 'sirkulasi.tanggal_kembali',
                                'anggota.nama', 'buku.judul_buku', 'sirkulasi.id_buku', 'sirkulasi.id_anggota',
                            )
                            ->where('id_sirkulasi', $id)
                            ->get();
        $books = DB::table('buku')->get();
        $members = DB::table('anggota')->get();
        
        return view('admin.pages.circulations.edit', [
            'circulation' => $circulation,
            'books' => $books,
            'members' => $members,
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
        // Validate
        $request->validate([
            'id_sirkulasi' => 'required|string',
            'id_buku' => 'required|string',
            'id_anggota' => 'required|string',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date',
        ]);

        Circulation::where('id_sirkulasi', $id)
                            ->update([
                                'id_sirkulasi' => $request->id_sirkulasi,
                                'id_buku' => $request->id_buku,
                                'id_anggota' => $request->id_anggota,
                                'tanggal_pinjam' => $request->tanggal_pinjam,
                                'tanggal_kembali' => $request->tanggal_kembali,
                            ]);

        return redirect()->route('circulations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $circulation = Circulation::find($id)->delete();

        return redirect()->route('circulations.index');
    }
}
