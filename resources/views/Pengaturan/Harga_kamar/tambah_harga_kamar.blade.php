@extends('layouts.app')
@section('title','Tambah Kategori Tambahan')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('Harga_Kamar.tambah.simpan') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="col-md-4">
                    <label for="id_kategori_kamar">Kategori Kamar</label>
                    <br>
                    <select style="width: 194px; height: 30px;" name="id_kategori_kamar" id="id_kategori_kamar">
                        <option disable value>--Pilih Kategori--</option>
                        @foreach ($datkatkamar as $item)
                        <option value="{{ $item->id }}">{{ $item->jenis_kamar }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="id_kategori_transaksi">Kategori Transaksi</label>
                    <br>
                    <select style="width: 194px; height: 30px;" name="id_kategori_transaksi" id="id_kategori_transaksi">
                        <option disable value>--Pilih Kategori--</option>
                        @foreach ($datkattrans as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_transaksi }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="harga">Harga</label>
                    <br>
                    <input type="number" name="harga" id="harga">
                </div>
                <div class="col-md-4 mt-4">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Simpan Data</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection