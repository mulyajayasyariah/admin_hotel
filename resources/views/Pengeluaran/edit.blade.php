@extends('layouts.app')
@section('title','Edit Pengeluaran')

@section('content')
     <!-- DataTales Example -->
     <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('pengeluaran.edit.update',$kat_peng->id) }}" method="post">
                {{ csrf_field() }}
                <h6>Tanggal</h6>
                <div class="form-group">  
                    <input type="date" id="tgl" name="tgl" class="form-control" value="{{  date('Y-m-d'), $kat_peng->tgl }}">
                </div>
                <h6>Kategori</h6>
                <div class="form-group">
                    <select class="form-control select2" style="widht:100%;" name="id_kategori" id="id_kategori">
                        <option disable value>Pilih Kategori</option>
                        <option  value="{{ $kat_peng->id_kategori }}">{{ $kat_peng->Kategori_Pengeluaran->nama}}</option>
                        @foreach ($kat_peng_tambah as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <h6>Keterangan</h6>
                <div class="form-group">  
                    <input type="text" id="keterangan" name="keterangan" class="form-control" value="{{ $kat_peng->keterangan }}">
                </div>
                <h6>Jenis Transaksi</h6>
                <div class="form-group">
                    <select class="form-control select2" style="widht:100%;" name="id_transaksi" id="id_transaksi" value="{{ $kat_peng->id_transaksi }}">
                        <option disable value>--Jenis Transaksi--</option>
                        @foreach ($kat_peng_tambah_jenis as $data)
                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <h6>Total</h6>
                <div class="form-group">  
                    <input type="number" id="total" name="total" class="form-control" placeholder="Total" value="{{ $kat_peng->total }}">
                </div>
                <div class="form-group">  
                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                </div>
            </form>
        </div>
    </div>
@endsection