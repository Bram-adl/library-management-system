@extends('admin.layouts.app')

@push('styles')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endpush

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Tambah Anggota</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="/members">Data Anggota</a></li>
                    <li class="breadcrumb-item active">Tambah Anggota</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
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
                        <h3 class="card-title">Tambah Anggota</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ action('MemberController@store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="id_anggota">ID Anggota</label>
                                <input type="text" name="id_anggota" id="id_anggota" placeholder="A005" class="form-control @error('id_anggota') is-invalid @enderror">
                                @error('id_anggota')
                                <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nama">Nama Anggota</label>
                                <input type="text" name="nama" id="nama" placeholder="Nama" class="form-control @error('nama') is-invalid @enderror">
                                @error('nama')
                                <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <div class="form-check">
                                    <input class="form-check-input @error('jk') is-invalid @enderror" type="radio" name="jk" value="LK" id="lk" >
                                    <label for="lk" class="form-check-label">Laki-laki</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input @error('jk') is-invalid @enderror" type="radio" name="jk" value="PR" id="pr">
                                    <label for="pr" class="form-check-label">Perempuan</label>
                                </div>
                                @error('jk')
                                    <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" id="alamat" placeholder="Alamat" class="form-control @error('alamat') is-invalid @enderror">
                                @error('alamat')
                                <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="no_hp">No Handphone</label>
                                <input type="text" name="no_hp" id="no_hp" placeholder="No handphone" class="form-control @error('no_hp') is-invalid @enderror">
                                @error('no_hp')
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