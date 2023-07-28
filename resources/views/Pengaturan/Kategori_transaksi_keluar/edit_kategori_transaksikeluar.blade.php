@extends('layouts.app')
@section('title','Edit Kategori Transaksi Pengeluaran')

@section('content')
@include('sweetalert::alert')
     <!-- DataTales Example -->
     <div class="card">
        <div class="card-body">
            <form action="{{ route('Kategori_TransaksiKeluar.edit.update',$dtkatkel->id) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">  
                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" value="{{ $dtkatkel->nama }}">
                </div>
                <div class="form-group">  
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection