@extends('layouts.app')
@section('title','Tambah Jenis Pembayaran')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('MetodeBayar.tambah.simpan') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="col-md-4">
                    <label for="nama">Jenis Pembayaran</label>
                    <br>
                    <input type="text" name="nama" id="nama">
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
