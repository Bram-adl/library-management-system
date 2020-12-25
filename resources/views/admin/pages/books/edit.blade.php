@extends('admin.layouts.app')

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Edit Buku</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Buku</a></li>
                    <li class="breadcrumb-item"><a href="/books">Data Buku</a></li>
                    <li class="breadcrumb-item active">Edit Buku</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('main-content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Buku</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ action('BookController@update', $book->id_buku) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="id_buku">ID Buku</label>
                                <input type="text" name="id_buku" id="id_buku" placeholder="B005" class="form-control @error('id_buku') is-invalid @enderror" value="{{ $book->id_buku }}" readonly>
                                @error('id_buku')
                                    <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="judul_buku">Judul Buku</label>
                                <input type="text" name="judul_buku" id="judul_buku" placeholder="Judul Buku" class="form-control @error('judul_buku') is-invalid @enderror" value="{{ $book->judul_buku }}">
                                @error('judul_buku')
                                    <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="pengarang">Pengarang</label>
                                <input type="text" name="pengarang" id="pengarang" placeholder="Pengarang" class="form-control @error('pengarang') is-invalid @enderror" value="{{ $book->pengarang }}">
                                @error('pengarang')
                                    <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="penerbit">Penerbit</label>
                                <input type="text" name="penerbit" id="penerbit" placeholder="Penerbit" class="form-control @error('penerbit') is-invalid @enderror" value="{{ $book->penerbit }}">
                                @error('penerbit')
                                    <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="th_terbit">Tahun Terbit</label>
                                <input type="text" name="th_terbit" id="th_terbit" placeholder="Tahun Terbit" class="form-control @error('th_terbit') is-invalid @enderror" value="{{ $book->th_terbit }}">
                                @error('th_terbit')
                                    <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="/books" class="btn btn-warning text-white">Batal</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection