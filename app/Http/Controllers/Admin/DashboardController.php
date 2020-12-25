<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Circulation;
use App\Http\Controllers\Controller;
use App\Member;
use App\Pengembalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Return the dashboard page.
     * 
     * @return view
     */
    public function dashboard()
    {   
        $totalBooks = Book::all();
        $totalMembers = Member::all();
        $totalCirculations = Circulation::all();
        $pengembalian = DB::table('log_pinjam')
                            ->join('buku', 'buku.id_buku', 'log_pinjam.id_buku')
                            ->join('anggota', 'anggota.id_anggota', 'log_pinjam.id_anggota')
                            ->select('log_pinjam.*', 'buku.judul_buku', 'anggota.nama')
                            ->paginate(5);
        
        return view('admin.dashboard', [
            'totalBooks' => $totalBooks,
            'totalMembers' => $totalMembers,
            'totalCirculations' => $totalCirculations,
            'pengembalian' => $pengembalian,
        ]);
    }
}
