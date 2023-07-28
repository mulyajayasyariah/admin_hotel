@extends('layouts.app')
@section('title','Tambah Kategori Pengeluaran')

@section('content')
     <!-- DataTales Example -->
     <div class="card">
        <div class="card-body">
            <form action="{{ route('Kategori_Pengeluaran.tambah.simpan') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">  
                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama">
                </div>
                <div class="form-group">  
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection