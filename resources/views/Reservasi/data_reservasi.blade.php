@extends('layouts.app')
@section('title','Data Reservasi')

@section('content')
@include('sweetalert::alert')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table table-responsive table-hover table-bordered w-full">
                <table id="table" style="font-size: 15px;width: 100%;" class="col-md-12">
                    <thead>
                        <tr>
                            <td>Nomor Booking</td>
                            <td>Tanggal Booking</td>
                            <td>Tanggal Check In</td>
                            <td>Tanggal Check Out</td>
                            <td>No Kamar</td>
                            <td>Nama Tamu</td>
                            <td>Kategori Transaksi</td>
                            <td>Diskon</td>
                            <td>Total</td>
                            <td>DP</td>
                            <td>Harus Dibayar</td>
                            <td>Metode Bayar</td>
                            <td>Keterangan</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datareservasi as $item)
                            <tr>
                                <td>{{ $item->id_booking }}</td>
                                <td>{{ date('d-m-Y',strtotime($item->booking)) }}</td>
                                <td>{{ date('d-m-Y',strtotime($item->checkin)) }}</td>
                                <td>{{ date('d-m-Y',strtotime($item->checkout)) }}</td>
                                <td>{{ $item->nokamar }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->Kategori_Transaksi->nama_transaksi }}</td>
                                <td>{{ number_format($item->diskon) }}</td>
                                <td>{{ number_format($item->total) }}</td>
                                <td>{{ number_format($item->dp) }}</td>
                                <td>{{ number_format($item->harusdibayar) }}</td>
                                <td>{{ $item->metodebayar->nama }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>
                                    <a href="{{ route('data_reservasi.edit',$item->id) }}" class="btn btn-outline-dark">
                                        <i class="fas fa-edit"></i></a>
                                    <a href="{{ route('data_reservasi.hapus',$item->id) }}"
                                        class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script>
$(document).ready(function() {
    $('#table').DataTable( {
        // dom: 'Blfrtip'
    } );
} );
</script>
@endsection