@extends('admin.layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('AdminLTE-3.1.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('AdminLTE-3.1.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('AdminLTE-3.1.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Sirkulasi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
                    <li class="breadcrumb-item active">Data Sirkulasi</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection

@section('main-content')
<section class="content">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabel Data Sirkulasi</h3>
                        <a href="/circulations/create" class="btn btn-primary btn-sm float-right">Tambah Sirkulasi</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID SKL</th>
                                    <th>Buku</th>
                                    <th>Peminjam</th>
                                    <th>Tgl Pinjam</th>
                                    <th>Tgl Kembali</th>
                                    <th>Kelola</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($circulations as $key=>$circulation)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $circulation->id_sirkulasi }}</td>
                                    <td>{{ $circulation->judul_buku }}</td>
                                    <td>{{ $circulation->nama }}</td>
                                    <td>{{ $circulation->tanggal_pinjam }}</td>
                                    <td>{{ $circulation->tanggal_kembali }}</td>
                                    <td>
                                        <a href="{{ action('CirculationController@edit', $circulation->id_sirkulasi) }}" class="btn btn-sm btn-success">
                                            <i class="fas fa-arrow-circle-up"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger" onclick="event.preventDefault(); event.target.nextElementSibling.submit()">
                                            <i class="fas fa-arrow-circle-down"></i>
                                        </a>
                                        <form action="{{ action('CirculationController@destroy', $circulation->id_sirkulasi) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
<script>
    document.getElementById('sirkulasi').classList.add('active')
</script>
@endpush