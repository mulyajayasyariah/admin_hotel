@extends('layouts.app')
@section('title','Tambah Kategori Tambahan')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('Kategori_Tambahan.tambah.simpan') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="col-md-4">
                        <label for="nama">Nama</label>
                        <br>
                        <input type="text" name="nama" id="nama">
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