@extends('admin.layouts.app')

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Edit Anggota</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Anggota</a></li>
                    <li class="breadcrumb-item"><a href="/members">Data Anggota</a></li>
                    <li class="breadcrumb-item active">Edit Anggota</li>
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
                        <h3 class="card-title">Edit Anggota</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ action('MemberController@update', $member->id_anggota) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="id_anggota">ID Anggota</label>
                                <input type="text" name="id_anggota" id="id_anggota" placeholder="A005" class="form-control @error('id_anggota') is-invalid @enderror" value="{{ $member->id_anggota }}" readonly>
                                @error('id_anggota')
                                    <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" placeholder="Nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $member->nama }}">
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
                                <label for="alamat">alamat</label>
                                <input type="text" name="alamat" id="alamat" placeholder="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ $member->alamat }}">
                                @error('alamat')
                                    <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="no_hp">No Handphone</label>
                                <input type="text" name="no_hp" id="no_hp" placeholder="No Handphone" class="form-control @error('no_hp') is-invalid @enderror" value="{{ $member->no_hp }}">
                                @error('no_hp')
                                    <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="/members" class="btn btn-warning text-white">Batal</a>
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