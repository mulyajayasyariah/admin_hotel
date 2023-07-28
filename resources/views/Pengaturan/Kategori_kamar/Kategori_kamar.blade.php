@extends('layouts.app')
@section('title','Kategori Kamar')

@section('content')
@include('sweetalert::alert')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('Kategori_Kamar.tambah') }}"
                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> <i
                        class="fas fa-download fa-sm text-white-50"></i> Tambah</a>
            </div>
            <div class="card-body">
                <div class="table table-responsive table-hover table-bordered w-full">
                    <table id="table" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No </th>
                                <th>Jenis Kamar</th>
                                <th>Jenis Ranjang</th>
                                <th>Jumlah Kamar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dtkatkamar as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->jenis_kamar }}</td>
                                <td>{{ $item->jenis_ranjang }}</td>
                                <td>{{ $item->jumlahkamar }}</td>
                                <td>
                                    <a href="{{ route('Kategori_Kamar.edit',$item->id) }}" class="btn btn-outline-dark">Edit
                                        <i class="fas fa-edit"></i></a>
                                    <a href="{{ route('Kategori_Kamar.hapus',$item->id) }}"
                                        class="btn btn-outline-danger">Hapus <i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('#table').DataTable( );
    } );
    </script>
@endsection
