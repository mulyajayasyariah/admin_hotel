@extends('layouts.app')
@section('title','Manajemen Akun')

@section('content')
@include('sweetalert::alert')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab1-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">Daftar User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab2-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">Daftar Role</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab3-tab" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">Daftar Hotel</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                        <a href="{{ route('register') }}"
                            class="d-none d-sm-inline-block btn btn-sm btn-outline-success shadow-sm mb-3"> <i
                                class="fas fa-download fa-sm"></i> Tambah</a>
                        <div class="table table-responsive table-hover w-full">
                            <table id="table" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No </th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                        <th>Hotel</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datauser as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->role->nama }}</td>
                                        <td>{{ $item->hotel->nama_hotel }}</td>
                                        <td>
                                            <a href="{{ route('user.edit',$item->id) }}" class="btn btn-outline-dark">Edit
                                                <i class="fas fa-edit"></i></a>
                                            <a href="{{ route('user.hapus',$item->id) }}"
                                                class="btn btn-outline-danger">Hapus <i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                        <a href="{{ route('tambah.role') }}"
                            class="d-none d-sm-inline-block btn btn-sm btn-outline-success shadow-sm mb-3"> <i
                                class="fas fa-download fa-sm"></i> Tambah</a>
                        <div class="table table-responsive table-hover w-full">
                            <table id="table2" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No </th>
                                        <th>Nama</th>
                                        {{-- <th>Hotel</th> --}}
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datarole as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        {{-- <td>{{ $item->hotel->nama_hotel }}</td> --}}
                                        <td>
                                            <a href="{{ route('role.edit',$item->id) }}" class="btn btn-outline-dark">Edit
                                                <i class="fas fa-edit"></i></a>
                                            <a href="{{ route('role.hapus',$item->id) }}"
                                                class="btn btn-outline-danger">Hapus <i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                        <a href="{{ route('tambah.hotel') }}"
                            class="d-none d-sm-inline-block btn btn-sm btn-outline-success shadow-sm mb-3"> <i
                                class="fas fa-download fa-sm"></i> Tambah</a>
                        <div class="table table-responsive table-hover w-full">
                            <table id="table2" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No </th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>No Hotel</th>
                                        <th>Email Hotel</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datahotel as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_hotel }}</td>
                                        <td>{{ $item->alamat_hotel }}</td>
                                        <td>{{ $item->nohp_hotel }}</td>
                                        <td>{{ $item->email_hotel }}</td>
                                        <td>
                                            <a href="{{ route('hotel.edit',$item->id) }}" class="btn btn-outline-dark">Edit
                                                <i class="fas fa-edit"></i></a>
                                            <a href="{{ route('hotel.hapus',$item->id) }}"
                                                class="btn btn-outline-danger">Hapus <i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('#table').DataTable( );
    } );
</script>
<script>
    $(document).ready(function() {
        $('#table2').DataTable( );
    } );
</script>
@endsection
