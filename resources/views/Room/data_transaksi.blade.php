@extends('layouts.app')
@section('title','Data Transaksi')

@section('content')
@include('sweetalert::alert')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table table-responsive table-hover table-bordered w-full">
                <table id="table" style="font-size: 15px;width: 100%;" class="col-md-12">
                    <thead>
                        <tr>
                            <td>Nomor Transaksi</td>
                            {{-- <td>Tanggal Booking</td> --}}
                            <td>Tanggal Check In</td>
                            <td>Tanggal Check Out</td>
                            <td>No Kamar</td>
                            <td>Nama Tamu</td>
                            {{-- <td>Status Tamu</td> --}}
                            {{-- <td>Kategori Kamar</td> --}}
                            <td>Kategori Transaksi</td>
                            {{-- <td>Jumlah Tamu</td> --}}
                            {{-- <td>Harga Dasar</td> --}}
                            <td>Diskon</td>
                            <td>Deposit</td>
                            <td>Total</td>
                            <td>Keterangan</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_transaksi as $item)
                            <tr>
                                <td>{{ $item->id_transaksi }}</td>
                                {{-- <td>{{ date('d-m-Y',strtotime($item->booking)) }}</td> --}}
                                <td>{{ date('d-m-Y',strtotime($item->checkin)) }}</td>
                                <td>{{ date('d-m-Y',strtotime($item->checkout)) }}</td>
                                <td>{{ $item->id_nokamar }}</td>
                                <td>{{ $item->nama }}</td>
                                {{-- <td>{{ $item->statustamu }}</td> --}}
                                {{-- <td>{{ $item->id_kategori_kamar }}</td> --}}
                                <td>{{ $item->Kategori_Transaksi->nama_transaksi }}</td>
                                {{-- <td>{{ $item->jumlahtamu }}</td> --}}
                                {{-- <td>{{ number_format($item->hargakamar) }}</td> --}}
                                <td>{{ number_format($item->diskon) }}</td>
                                <td>{{ number_format($item->deposit) }}</td>
                                <td>{{ number_format($item->total) }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>
                                    <a href="{{ route('checkin.edit',$item->id) }}" class="btn btn-outline-dark">
                                        <i class="fas fa-edit"></i></a>
                                    <a href="{{ route('checkin.hapus',$item->id) }}"
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