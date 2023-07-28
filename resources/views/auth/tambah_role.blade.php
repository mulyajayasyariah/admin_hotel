@extends('layouts.app')
@section('title','Tambah Role')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('tambah.role.simpan') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="nama_role">Nama Role</label>
                            <br>
                            <input class="form-control mb-2" type="text" name="nama_role" id="nama_role">
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-4">
                            <label for="id_hotel">Nama Hotel</label>
                            <br>
                            <select class="form-control" name="id_hotel" id="id_hotel">
                                <option disable value>--Pilih Hotel--</option>
                                @foreach ($datahotel as $item)
                                    <option value="{{ $item->id }}">{{$item->nama_hotel}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
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
