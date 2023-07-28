@extends('layouts.app')
@section('title','Edit Jenis Pembayaran')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('MetodeBayar.edit.update',$dtMetodeBayar->id) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="col-md-4">
                        <label for="nama">Jenis Pembayaran</label>
                        <br>
                        <input type="text" name="nama" id="nama" value="{{ $dtMetodeBayar->nama }}">
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