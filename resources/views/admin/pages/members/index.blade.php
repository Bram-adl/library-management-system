@extends('admin.layouts.app')

@push('styles')
<!-- DataTables -->
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
                <h1>Data Anggota</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
                    <li class="breadcrumb-item active">Data Anggota</li>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabel Data Anggota</h3>
                        <a href="/members/create" class="btn btn-primary btn-sm float-right">Tambah Anggota</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Anggota</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>No HP</th>
                                    <th>Kelola</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($members as $key=>$member)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{$member->id_anggota}}</td>
                                    <td>{{$member->nama}}</td>
                                    <td>{{$member->jk}}</td>
                                    <td>{{$member->alamat}}</td>
                                    <td>{{$member->no_hp}}</td>
                                    <td>
                                        <a href="{{action('MemberController@edit', $member->id_anggota)}}" class="btn btn-sm btn-success">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger" onclick="event.preventDefault(); event.target.nextElementSibling.submit();">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <form action="{{ action('MemberController@destroy', $member->id_anggota) }}" method="POST" style="visibility: hidden;">
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
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

@push('script')
<!-- DataTables  & Plugins -->
<script src="{{ asset('AdminLTE-3.1.0/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.1.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.1.0/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.1.0/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.1.0/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.1.0/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.1.0/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.1.0/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.1.0/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('AdminLTE-3.1.0/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.1.0/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.1.0/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('AdminLTE-3.1.0/dist/js/demo.js') }}"></script>
<!-- Page specific script -->
<script>
    $(function() {
        $('#example2').DataTable({
            "paging": true,
            "pageLength": 5,
            "lengthChange": true,
            "lengthMenu": [5, 10, 15, 20],
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<script>
    document.getElementById('kelola-data').classList.add('menu-open')
    document.getElementById('kelola-data').children[0].classList.add('active')
    document.getElementById('data-anggota').classList.add('active')
</script>
@endpush