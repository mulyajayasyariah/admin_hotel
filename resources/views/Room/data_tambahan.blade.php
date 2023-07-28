@extends('layouts.app')
@section('title','Data Tambahan')

@section('content')
<div class="container-xxl">
    <div class="card shadow mb-4">
        <div class="card">
            <div class="card-header">
                {{-- <a href="{{ route('Kategori_Tambahan.tambah') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" > <i
                    class="fas fa-download fa-sm text-white-50" ></i> Tambah</a> --}}
            </div>
            <div class="card-body">
                <div class="table table-responsive table-hover table-bordered w-full" >
                    <table class="col-md-12">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Transaksi</th>
                                <th>Jenis Tambahan</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                                <th>Harga</th>
                                <th>User</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        @foreach ($dttambahan as $item)
                            <tbody>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->id_transaksi }}</td>
                                <td>{{ $item->Kategori_Tambahan->nama }}</td>
                                <td>{{ $item->jumlah}}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>{{ $item->total }}</td>
                                <td>{{ $item->id_user }}</td>
                                <td>
                                    <a href="#" class="btn btn-outline-dark">Edit <i  class="fas fa-edit"></i></a>
                                    <a href="#"  class="btn btn-outline-danger">Hapus <i class="fas fa-trash-alt"></i></a>
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
