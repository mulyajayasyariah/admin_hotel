@extends('layouts.app')
@section('title','Edit Kategori Tambahan')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('Kategori_Tambahan.edit.update',$dtkategori_tambahan->id) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="col-md-4">
                        <label for="nama">Nama</label>
                        <br>
                        <input type="text" name="nama" id="nama" value="{{ $dtkategori_tambahan->nama }}">
                    </div>
                    <div class="col-md-4">
                        <label for="harga">Harga</label>
                        <br>
                        <input type="number" name="harga" id="harga" value="{{ $dtkategori_tambahan->harga }}">
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