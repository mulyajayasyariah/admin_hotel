@extends('layouts.app')
@section('title','Edit Role')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('role.edit.update',$datarole->id) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="nama">Nama Role</label>
                            <br>
                            <input class="form-control mb-2" type="text" name="nama" id="nama" value="{{ $datarole->nama }}">
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-4">
                            <label for="id_hotel">Nama Hotel</label>
                            <br>
                            <select class="form-control" name="id_hotel" id="id_hotel">
                                <option value="{{ $datarole->id_hotel }}">{{ $datarole->hotel->nama_hotel }}</option>
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
