@extends('layouts.app')
@section('title','Data Kategori Tambahan')

@section('content')
@include('sweetalert::alert')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('Kategori_Tambahan.tambah') }}"
                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> <i
                        class="fas fa-download fa-sm text-white-50"></i> Tambah</a>
            </div>
            <div class="card-body">
                <div class="table table-responsive table-hover table-bordered w-full">
                    <table class="col-md-12">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        @foreach ($dtkategori_tambahan as $item)
                        <tbody>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>
                                <a href="{{ route('Kategori_Tambahan.edit',$item->id) }}"
                                    class="btn btn-outline-dark">Edit <i class="fas fa-edit"></i></a>
                                <a href="{{ route('Kategori_Tambahan.hapus',$item->id) }}"
                                    class="btn btn-outline-danger">Hapus <i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
