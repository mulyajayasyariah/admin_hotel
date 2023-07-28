@extends('layouts.app')
@section('title','Tambah Kategori Transaksi')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('Kategori_Transaksi.tambah.simpan') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="col-md-4">
                        <label for="nama_transaksi">Nama Transaksi</label>
                        <br>
                        <input type="text" name="nama_transaksi" id="nama_transaksi">
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