@extends('layouts.app')
@section('title','Kategori Harga Kamar')

@section('content')
@include('sweetalert::alert')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('Harga_Kamar.tambah') }}"
                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> <i
                        class="fas fa-download fa-sm text-white-50"></i> Tambah</a>
            </div>
            <div class="card-body">
                <div class="table table-responsive table-hover table-bordered w-full">
                    <table class="col-md-12">
                        <thead>
                            <tr>
                                <th>No </th>
                                <th>Kategori Kamar</th>
                                <th>Jenis Transaksi</th>
                                <th>Harga Kamar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        @foreach ($dathargakamar as $item)
                        <tbody>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->Kategori_Kamar->jenis_kamar }}</td>
                            <td>{{ $item->Kategori_Transaksi->nama_transaksi }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>
                                <a href="{{ route('Harga_Kamar.edit',$item->id) }}"
                                    class="btn btn-outline-dark">Edit <i class="fas fa-edit"></i></a>
                                <a href="{{ route('Harga_Kamar.hapus',$item->id) }}"
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
