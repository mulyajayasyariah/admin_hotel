@extends('layouts.app')
@section('title','Tambah Kategori Pengeluaran')

@section('content')
     <!-- DataTales Example -->
     <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('pengeluaran.tambah.simpan') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">  
                    <input type="date" id="tgl" name="tgl" class="form-control" value="{{  date('Y-m-d', time())}}">
                </div>
                <div class="form-group">
                    <select class="form-control select1" style="widht:100%;" name="id_kategori" id="id_kategori" >
                        <option disable value>--Pilih Kategori--</option>
                        @foreach ($kat_peng_tambah as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">  
                    <input type="text area" id="keterangan" name="keterangan" class="form-control" placeholder="Lombok/Galon">
                </div>
                <div class="form-group">
                    <select class="form-control select2" style="widht:100%;" name="id_transaksi" id="id_transaksi" >
                        <option disable value>--Jenis Transaksi--</option>
                        @foreach ($kat_peng_tambah_jenis as $data)
                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">  
                    <input type="number" id="total" name="total" class="form-control" placeholder="Total">
                </div>

                <div class="form-group">  
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
@endsection