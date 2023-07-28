@extends('layouts.app')
@section('title','Jenis Pembayaran')

@section('content')
@include('sweetalert::alert')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('MetodeBayar.tambah') }}"
                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> <i
                        class="fas fa-download fa-sm text-white-50"></i> Tambah</a>
            </div>
            <div class="card-body">
                <div class="table table-responsive table-hover w-full">
                    <table id="table" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dtMetodeBayar as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>
                                    <a href="{{ route('MetodeBayar.edit',$item->id) }}"
                                        class="btn btn-outline-dark">Edit <i class="fas fa-edit"></i></a>
                                    <a href="{{ route('MetodeBayar.hapus',$item->id) }}"
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
