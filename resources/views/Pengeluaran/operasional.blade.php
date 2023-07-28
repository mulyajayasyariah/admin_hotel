@extends('layouts.app')
@section('title','Data Pengeluaran')


@section('content')
@include('sweetalert::alert')

<!-- Content -->

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="tglawal">Tanggal Awal</label>
                    <input type="date" id="tglawal" name="tglawal" class="form-control">
                    <a class="btn btn-primary" href="" data-toggle="modal" id="caritamu"
                    data-target="#caritamu">Filter</a>
                </div>
                <div class="col-md-2">
                  <label for="tglakhir">Tanggal Akhir</label>
                  <input type="date" id="tglakhir" name="tglakhir" class="form-control">
                  {{-- <a class="btn btn-primary" href="">Filter</a> --}}
              </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="card-tools">
                <div class="form-group">
                    {{-- <a href="{{ route('pengeluaran.tambah') }}" class="btn btn-success">Tambah Data</a> --}}
                    <a href="{{ route('pengeluaran.tambah') }}" class="btn btn-success">Tambah Data</a>
                    {{-- <a href="{{ route('pengeluaran.cetaklaporan') }}" target="_blank" class="btn btn-primary pull-right">Cetak
                        Laporan Pengeluaran</a> --}}
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Kategori</th>
                            <th>Keterangan</th>
                            <th>Jenis Transaksi</th>
                            <th>Total</th>
                            <th>Operator</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dtpengeluaran as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ date('d-m-Y',strtotime($item->tgl))}}</td>
                            <td>{{ $item->Kategori_Pengeluaran->nama }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>{{ $item->Kategori_transaksikeluar->nama }}</td>
                            <td>{{ $item->total }}</td>
                            <td>{{ $item->user->nama }}</td>
                            <td>
                                <a href="{{ route('pengeluaran.edit',$item->id) }}"><i class="fas fa-edit"></i></a>
                                |
                                <a href="{{ route('pengeluaran.hapus',$item->id) }}"><i class="fas fa-trash-alt"
                                        style="color:red"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- <div class="card-footer">
            {{ $dtpengeluaran->links() }}
        </div> --}}
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
