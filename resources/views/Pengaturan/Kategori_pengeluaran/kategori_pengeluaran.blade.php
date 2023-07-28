@extends('layouts.app')
@section('title','Data Kategori Pengeluaran')

@section('content')
@include('sweetalert::alert')
     <!-- DataTales Example -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('Kategori_Pengeluaran.tambah') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" > <i
                class="fas fa-download fa-sm text-white-50" data-togle = "modal"></i> Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    @foreach ($dtKategori_Pengeluaran as $item)
                    <tbody>
                        <td>{{ $loop->iteration }}</td>  
                        <td>{{ $item->nama }}</td>
                        <td>
                            <a href="{{ route('Kategori_Pengeluaran.edit',$item->id) }}" class="btn btn-outline-dark">Edit <i  class="fas fa-edit"></i></a>
                            <a href="{{ route('Kategori_Pengeluaran.hapus',$item->id) }}"  class="btn btn-outline-danger">Hapus <i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection