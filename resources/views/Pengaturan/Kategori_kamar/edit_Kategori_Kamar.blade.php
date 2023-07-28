@extends('layouts.app')
@section('title','Edit Kategori Kamar')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('Kategori_Kamar.edit.update',$dtkatkamar->id) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="col-md-4">
                        <label for="jenis_kamar">Jenis Kamar</label>
                        <br>
                        <input type="text" name="jenis_kamar" id="jenis_kamar" value="{{ $dtkatkamar->jenis_kamar }}">
                    </div>
                    <div class="col-md-4">
                        <label for="jenis_ranjang">Jenis Ranjang</label>
                        <br>
                        <input type="text" name="jenis_ranjang" id="jenis_ranjang" value="{{ $dtkatkamar->jenis_ranjang }}">
                    </div>
                    <div class="col-md-4">
                        <label for="jumlahkamar">Jumlah Kamar</label>
                        <br>
                        <input type="number" name="jumlahkamar" id="jumlahkamar" value="{{ $dtkatkamar->jumlahkamar }}">
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