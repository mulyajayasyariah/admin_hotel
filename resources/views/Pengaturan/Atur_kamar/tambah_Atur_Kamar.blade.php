@extends('layouts.app')
@section('title','Tambah Kamar')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('AturKamar.tambah.simpan') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="col-md-4">
                    <label for="no_kamar">No Kamar</label>
                    <br>
                    <input type="text" name="no_kamar" id="no_kamar">
                </div>
            </div>
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
            </div>
            <div class="form-group">
                <div class="col-md-4 mt-4">
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection
