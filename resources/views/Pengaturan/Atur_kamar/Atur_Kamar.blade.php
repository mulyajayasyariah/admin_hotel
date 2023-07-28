@extends('layouts.app')
@section('title','Pengaturan Kamar')

@section('content')
@include('sweetalert::alert')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('AturKamar.tambah') }}"
                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> <i
                        class="fas fa-download fa-sm text-white-50"></i> Tambah</a>
            </div>
            <div class="card-body">
                <div class="table table-responsive table-hover table-bordered w-full">
                    <table id="table" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No Kamar</th>
                                <th>Jenis Kamar</th>
                                <th>Jenis Ranjang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dtaturkamar as $item)
                            <tr>
                                <td>{{ $item->no_kamar }}</td>
                                <td>{{ $item->Kategori_Kamar->jenis_kamar }}</td>
                                <td>{{ $item->Kategori_Kamar->jenis_ranjang }}</td>
                                <td>
                                    <a href="{{ route('AturKamar.edit',$item->id) }}"
                                        class="btn btn-outline-dark">Edit <i class="fas fa-edit"></i></a>
                                    <a href="{{ route('AturKamar.hapus',$item->id) }}"
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
        $('#table').DataTable( {
            dom: 'Blfrtip'
        } );
    } );
    </script>
@endsection
