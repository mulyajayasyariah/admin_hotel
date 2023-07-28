@extends('layouts.app')
@section('title','Edit Kategori Tambahan')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('AturKamar.edit.update',$dtkamar->id) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="col-md-4">
                        <label for="no_kamar">No Kamar</label>
                        <br>
                        <input type="text" name="no_kamar" id="no_kamar" value="{{ $dtkamar->no_kamar }}">
                    </div><div class="col-md-4">
                        <label for="jenis_kamar">Jenis Kamar</label>
                        <br>
                        <input type="text" name="jenis_kamar" id="jenis_kamar" value="{{ $dtkamar->jenis_kamar }}">
                    </div>
                    <div class="col-md-4">
                        <label for="jenis_ranjang">Jenis Ranjang</label>
                        <br>
                        <input type="text" name="jenis_ranjang" id="jenis_ranjang" value="{{ $dtkamar->jenis_ranjang }}">
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