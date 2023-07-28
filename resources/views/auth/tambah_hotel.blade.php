@extends('layouts.app')
@section('title','Tambah Hotel')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('tambah.hotel.simpan') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="nama">Nama Hotel</label>
                            <br>
                            <input class="form-control mb-2" type="text" name="nama" id="nama">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="alamat">Alamat Hotel</label>
                            <br>
                            <input class="form-control mb-2" type="text" name="alamat" id="alamat">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="nohp">No Telepon</label>
                            <br>
                            <input class="form-control mb-2" type="text" name="nohp" id="nohp">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="email">Email</label>
                            <br>
                            <input class="form-control mb-2" type="email" name="email" id="email">
                        </div>
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
