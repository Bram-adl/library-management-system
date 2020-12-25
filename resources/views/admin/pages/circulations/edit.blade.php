@extends('admin.layouts.app')

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-6">
                <h1>Edit Data Sirkulasi</h1>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="/circulations">Data Sirkulasi</a></li>
                    <li class="breadcrumb-item">Edit Data Sirkulasi</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('main-content')
<section class="content">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Buku</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ action('CirculationController@update', $circulation[0]->id_sirkulasi) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="id_sirkulasi">ID SKL</label>
                                <input type="text" name="id_sirkulasi" id="id_sirkulasi" placeholder="S001" class="form-control @error('id_sirkulasi') is-invalid @enderror" value="{{ $circulation[0]->id_sirkulasi }}" readonly>
                                @error('id_sirkulasi')
                                <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="id_buku">Buku</label>
                                <select name="id_buku" id="id_buku" class="form-control">
                                    <option value="" selected hidden disabled>-- Pilih Buku --</option>
                                    @foreach ($books as $book)
                                    <option value="{{ $book->id_buku }}" {{ $book->id_buku === $circulation[0]->id_buku ? 'selected' : '' }}>{{ $book->judul_buku }}</option>
                                    @endforeach
                                </select>
                                @error('id_buku')
                                <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="id_anggota">Anggota</label>
                                <select name="id_anggota" id="id_anggota" class="form-control">
                                    <option value="" selected hidden disabled>-- Pilih Anggota --</option>
                                    @foreach ($members as $member)
                                    <option value="{{ $member->id_anggota }}" {{ $member->id_anggota === $circulation[0]->id_anggota ? 'selected' : '' }}>{{ $member->nama }}</option>
                                    @endforeach
                                </select>
                                @error('id_anggota')
                                <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control @error('tanggal_pinjam') is-invalid @enderror" value="{{ $circulation[0]->tanggal_pinjam }}">
                                @error('tanggal_pinjam')
                                <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tanggal_kembali">Tanggal Kembali</label>
                                <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control @error('tanggal_kembali') is-invalid @enderror" value="{{ $circulation[0]->tanggal_kembali }}">
                                @error('tanggal_kembali')
                                <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="/circulations" class="btn btn-warning text-white">Batal</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection