@extends('layouts.app')
@section('title','Edit Kategori Pengeluaran')

@section('content')
     <!-- DataTales Example -->
     <div class="card">
        <div class="card-body">
            <form action="{{ route('Kategori_Pengeluaran.edit.update',$dtpeng->id) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">  
                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" value="{{ $dtpeng->nama }}">
                </div>
                <div class="form-group">  
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection