@extends('admin.layouts.app')

@push('styles')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endpush

@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Tambah Buku</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="/books">Data Buku</a></li>
                    <li class="breadcrumb-item active">Tambah Buku</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection

@section('main-content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Buku</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ action('BookController@store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="id_buku">ID Buku</label>
                                <input type="text" name="id_buku" id="id_buku" placeholder="B005" class="form-control @error('id_buku') is-invalid @enderror">
                                @error('id_buku')
                                    <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="judul_buku">Judul Buku</label>
                                <input type="text" name="judul_buku" id="judul_buku" placeholder="Judul Buku" class="form-control @error('judul_buku') is-invalid @enderror">
                                @error('judul_buku')
                                    <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="pengarang">Pengarang</label>
                                <input type="text" name="pengarang" id="pengarang" placeholder="Pengarang" class="form-control @error('pengarang') is-invalid @enderror">
                                @error('pengarang')
                                    <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="penerbit">Penerbit</label>
                                <input type="text" name="penerbit" id="penerbit" placeholder="Penerbit" class="form-control @error('penerbit') is-invalid @enderror">
                                @error('penerbit')
                                    <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="th_terbit">Tahun Terbit</label>
                                <input type="text" name="th_terbit" id="th_terbit" placeholder="Tahun Terbit" class="form-control @error('th_terbit') is-invalid @enderror">
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
<!-- /.content -->
@endsection

@push('script')
<script src="{{ asset('AdminLTE-3.1.0/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.1.0/dist/js/demo.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
</script>
@endpush