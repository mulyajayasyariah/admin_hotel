@extends('layouts.app')
@section('title','Edit Hotel')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('hotel.edit.update',$datahotel->id) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="nama_hotel">Nama Hotel</label>
                            <br>
                            <input class="form-control mb-2" type="text" name="nama_hotel" id="nama_hotel" value="{{ $datahotel->nama_hotel }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="alamat_hotel">Alamat Hotel</label>
                            <br>
                            <input class="form-control mb-2" type="text" name="alamat_hotel" id="alamat_hotel" value="{{ $datahotel->alamat_hotel }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="nohp_hotel">No Telepon</label>
                            <br>
                            <input class="form-control mb-2" type="text" name="nohp_hotel" id="nohp_hotel" value="{{ $datahotel->nohp_hotel }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="email_hotel">Email</label>
                            <br>
                            <input class="form-control mb-2" type="email" name="email_hotel" id="email_hotel" value="{{ $datahotel->email_hotel }}">
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
