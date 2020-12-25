@extends('admin.layouts.app')

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-6">
                <h1>Data Pengguna Sistem</h1>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
                    <li class="breadcrumb-item active">Pengguna Sistem</li>
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
            <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabel Data Pengguna Sistem</h3>
                        <a href="/users/create" class="btn btn-primary btn-sm float-right">Tambah Pengguna Sistem</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <th>Kelola</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key=>$user)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><img src="/images/{{ $user->foto }}" style="height: 100px; width: 100px; object-fit: cover;"></td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->level }}</td>
                                    <td>
                                        <a href="/users/{{ $user->id_user }}/edit" class="btn btn-sm btn-success">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger" onclick="event.preventDefault(); event.target.nextElementSibling.submit()">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <form action="/users/{{ $user->id_user }}" method="POST" id="delete">
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
    document.getElementById('pengguna-sistem').classList.add('active')
</script>
@endpush