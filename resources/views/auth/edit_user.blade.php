@extends('layouts.app')
@section('title','Edit User')

@section('content')
@include('sweetalert::alert')
<div class="container-fluid">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-md-4">
                    <div class="p-5">
                        <form action="{{ route('user.edit.update',$datauser->id) }}" method="POST" class="user">
                            @csrf
                            <div class="form-group">
                                <select name="role" id="exampleInputrole" class="form-control @error('role')is-invalid @enderror">
                                    <option value="{{ $datauser->id_role }}">{{ $datauser->role->nama }}</option>
                                    @foreach ($datarole as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <span class="invalid-feedback"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select name="hotel" id="exampleInputhotel" class="form-control @error('hotel')is-invalid @enderror">
                                    <option value="{{ $datauser->id_hotel }}">{{$datauser->hotel->nama_hotel}}</option>
                                    @foreach ($datahotel as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_hotel }}</option>
                                    @endforeach
                                </select>
                                @error('hotel')
                                    <span class="invalid-feedback"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input name ="nama" type="text" class="form-control @error('nama')is-invalid @enderror" id="exampleInputNama"
                                    placeholder="Nama" value="{{ $datauser->nama }}">
                                    @error('nama')
                                        <span class="invalid-feedback"> {{ $message }} </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <input name ="nohp" type="text" class="form-control @error('nohp')is-invalid @enderror" id="exampleInputNoHP"
                                    placeholder="No Hp" value="{{ $datauser->nohp }}">
                                    @error('nohp')
                                        <span class="invalid-feedback"> {{ $message }} </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <input name="email" type="email" class="form-control @error('email')is-invalid @enderror" id="exampleInputEmail"
                                    placeholder="Email" value="{{ $datauser->email }}">
                                    @error('email')
                                        <span class="invalid-feedback"> {{ $message }} </span>
                                    @enderror
                            </div>
                                <div class="form-group">
                                <input name="username" type="text" class="form-control @error('Username')is-invalid @enderror" id="exampleInputUsername"
                                    placeholder="Username" value="{{ $datauser->username }}">
                                    @error('username')
                                        <span class="invalid-feedback"> {{ $message }} </span>
                                    @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input name="password" type="password" class="form-control @error('password')is-invalid @enderror"
                                        id="exampleInputPassword" placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback"> {{ $message }} </span>
                                        @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input name= "password_confirmation" type="password" class="form-control  @error('password_confirmation')is-invalid @enderror"
                                        id="exampleRepeatPassword" placeholder="Repeat Password">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback"> {{ $message }} </span>
                                        @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block" >Simpan Perubahan</button>                              
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
</script>
@endsection