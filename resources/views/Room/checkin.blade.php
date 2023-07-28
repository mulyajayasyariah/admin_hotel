@extends('layouts.app')
@section('title','Kamar')

<style>

</style>

@section('content')
@include('sweetalert::alert')
<div class="container-fluid"> 
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row border-bottom-dark">
                @php
                    $datastatus = App\Models\status_kamar::where('id', 101)->first();
                @endphp

                @if($datastatus && (int)$datastatus->status === 1)
                    <a href="#" data-toggle="modal" data-target="#checkout"
                    id="data-checkout" data-nomor="{{ $datastatus->id }}" data-transaksi="{{ $datastatus->id_transaksi }}" 
                    class="btn btn-danger" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;
                    display: flex; justify-content: center; align-items: center;
                    background-color:red ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">101</a>

                @elseif($datastatus && (int)$datastatus->status === 2)
                    <a href="{{ url('checkin/kamar_ready') }}/101" class="btn btn-secondary"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:grey;width: 110px; height: 80px; margin: 10px; font-size: 45px;">101</a>
                @else
                    <a href="{{ url('checkin/input_checkin') }}/101" class="btn btn-success"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:rgb(12, 209, 12) ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">
                    101</a>
                @endif
                
                @php
                    $datastatus = App\Models\status_kamar::where('id', 102)->first();
                @endphp

                @if($datastatus && (int)$datastatus->status === 1)
                    <a href="#" data-toggle="modal" data-target="#checkout"
                    id="data-checkout" data-nomor="{{ $datastatus->id }}" data-transaksi="{{ $datastatus->id_transaksi }}" 
                    class="btn btn-danger" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;
                    display: flex; justify-content: center; align-items: center;
                    background-color:red ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">102</a>

                @elseif($datastatus && (int)$datastatus->status === 2)
                    <a href="{{ url('checkin/kamar_ready') }}/102" class="btn btn-secondary"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:grey;width: 110px; height: 80px; margin: 10px; font-size: 45px;">102</a>
                @else
                    <a href="{{ url('checkin/input_checkin') }}/102" class="btn btn-success"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:rgb(12, 209, 12) ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">
                    102</a>
                @endif

                @php
                    $datastatus = App\Models\status_kamar::where('id', 103)->first();
                @endphp

                @if($datastatus && (int)$datastatus->status === 1)
                    <a href="#" data-toggle="modal" data-target="#checkout"
                    id="data-checkout" data-nomor="{{ $datastatus->id }}" data-transaksi="{{ $datastatus->id_transaksi }}" 
                    class="btn btn-danger" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;
                    display: flex; justify-content: center; align-items: center;
                    background-color:red ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">103</a>

                @elseif($datastatus && (int)$datastatus->status === 2)
                    <a href="{{ url('checkin/kamar_ready') }}/103" class="btn btn-secondary"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:grey;width: 110px; height: 80px; margin: 10px; font-size: 45px;">103</a>
                @else
                    <a href="{{ url('checkin/input_checkin') }}/103" class="btn btn-success"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:rgb(12, 209, 12) ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">
                    103</a>
                @endif

                @php
                    $datastatus = App\Models\status_kamar::where('id', 104)->first();
                @endphp

                @if($datastatus && (int)$datastatus->status === 1)
                    <a href="#" data-toggle="modal" data-target="#checkout"
                    id="data-checkout" data-nomor="{{ $datastatus->id }}" data-transaksi="{{ $datastatus->id_transaksi }}" 
                    class="btn btn-danger" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;
                    display: flex; justify-content: center; align-items: center;
                    background-color:red ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">104</a>

                @elseif($datastatus && (int)$datastatus->status === 2)
                    <a href="{{ url('checkin/kamar_ready') }}/104" class="btn btn-secondary"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:grey;width: 110px; height: 80px; margin: 10px; font-size: 45px;">104</a>
                @else
                    <a href="{{ url('checkin/input_checkin') }}/104" class="btn btn-success"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:rgb(12, 209, 12) ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">
                    104</a>
                @endif
            </div>
            <div class="row border-bottom-dark">
                @php
                    $datastatus = App\Models\status_kamar::where('id', 201)->first();
                @endphp
                @if($datastatus && (int)$datastatus->status === 1)
                    <a href="#" data-toggle="modal" data-target="#checkout"
                    id="data-checkout" data-nomor="{{ $datastatus->id }}" data-transaksi="{{ $datastatus->id_transaksi }}" 
                    class="btn btn-danger" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;
                    display: flex; justify-content: center; align-items: center;
                    background-color:red ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">201</a>

                @elseif($datastatus && (int)$datastatus->status === 2)
                    <a href="{{ url('checkin/kamar_ready') }}/201" class="btn btn-secondary"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:grey;width: 110px; height: 80px; margin: 10px; font-size: 45px;">201</a>
                @else
                    <a href="{{ url('checkin/input_checkin') }}/201" class="btn btn-success"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:rgb(12, 209, 12) ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">
                    201</a>
                @endif

                @php
                    $datastatus = App\Models\status_kamar::where('id', 202)->first();
                @endphp
                @if($datastatus && (int)$datastatus->status === 1)
                    <a href="#" data-toggle="modal" data-target="#checkout"
                    id="data-checkout" data-nomor="{{ $datastatus->id }}" data-transaksi="{{ $datastatus->id_transaksi }}" 
                    class="btn btn-danger" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;
                    display: flex; justify-content: center; align-items: center;
                    background-color:red ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">202</a>

                @elseif($datastatus && (int)$datastatus->status === 2)
                    <a href="{{ url('checkin/kamar_ready') }}/202" class="btn btn-secondary"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:grey;width: 110px; height: 80px; margin: 10px; font-size: 45px;">202</a>
                @else
                    <a href="{{ url('checkin/input_checkin') }}/202" class="btn btn-success"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:rgb(12, 209, 12) ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">
                    202</a>
                @endif
                
                @php
                    $datastatus = App\Models\status_kamar::where('id', 203)->first();
                @endphp
                @if($datastatus && (int)$datastatus->status === 1)
                    <a href="#" data-toggle="modal" data-target="#checkout"
                    id="data-checkout" data-nomor="{{ $datastatus->id }}" data-transaksi="{{ $datastatus->id_transaksi }}" 
                    class="btn btn-danger" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;
                    display: flex; justify-content: center; align-items: center;
                    background-color:red ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">203</a>

                @elseif($datastatus && (int)$datastatus->status === 2)
                    <a href="{{ url('checkin/kamar_ready') }}/203" class="btn btn-secondary"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:grey;width: 110px; height: 80px; margin: 10px; font-size: 45px;">203</a>
                @else
                    <a href="{{ url('checkin/input_checkin') }}/203" class="btn btn-success"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:rgb(12, 209, 12) ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">
                    203</a>
                @endif

                @php
                    $datastatus = App\Models\status_kamar::where('id', 204)->first();
                @endphp
                @if($datastatus && (int)$datastatus->status === 1)
                    <a href="#" data-toggle="modal" data-target="#checkout"
                    id="data-checkout" data-nomor="{{ $datastatus->id }}" data-transaksi="{{ $datastatus->id_transaksi }}" 
                    class="btn btn-danger" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;
                    display: flex; justify-content: center; align-items: center;
                    background-color:red ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">204</a>

                @elseif($datastatus && (int)$datastatus->status === 2)
                    <a href="{{ url('checkin/kamar_ready') }}/204" class="btn btn-secondary"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:grey;width: 110px; height: 80px; margin: 10px; font-size: 45px;">204</a>
                @else
                    <a href="{{ url('checkin/input_checkin') }}/204" class="btn btn-success"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:rgb(12, 209, 12) ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">
                    204</a>
                @endif

                @php
                    $datastatus = App\Models\status_kamar::where('id', 205)->first();
                @endphp
                @if($datastatus && (int)$datastatus->status === 1)
                    <a href="#" data-toggle="modal" data-target="#checkout"
                    id="data-checkout" data-nomor="{{ $datastatus->id }}" data-transaksi="{{ $datastatus->id_transaksi }}" 
                    class="btn btn-danger" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;
                    display: flex; justify-content: center; align-items: center;
                    background-color:red ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">205</a>

                @elseif($datastatus && (int)$datastatus->status === 2)
                    <a href="{{ url('checkin/kamar_ready') }}/205" class="btn btn-secondary"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:grey;width: 110px; height: 80px; margin: 10px; font-size: 45px;">205</a>
                @else
                    <a href="{{ url('checkin/input_checkin') }}/205" class="btn btn-success"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:rgb(12, 209, 12) ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">
                    205</a>
                @endif

                @php
                    $datastatus = App\Models\status_kamar::where('id', 206)->first();
                @endphp
                @if($datastatus && (int)$datastatus->status === 1)
                    <a href="#" data-toggle="modal" data-target="#checkout"
                    id="data-checkout" data-nomor="{{ $datastatus->id }}" data-transaksi="{{ $datastatus->id_transaksi }}" 
                    class="btn btn-danger" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;
                    display: flex; justify-content: center; align-items: center;
                    background-color:red ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">206</a>

                @elseif($datastatus && (int)$datastatus->status === 2)
                    <a href="{{ url('checkin/kamar_ready') }}/206" class="btn btn-secondary"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:grey;width: 110px; height: 80px; margin: 10px; font-size: 45px;">206</a>
                @else
                    <a href="{{ url('checkin/input_checkin') }}/206" class="btn btn-success"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:rgb(12, 209, 12) ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">
                    206</a>
                @endif

                @php
                    $datastatus = App\Models\status_kamar::where('id', 207)->first();
                @endphp
                @if($datastatus && (int)$datastatus->status === 1)
                    <a href="#" data-toggle="modal" data-target="#checkout"
                    id="data-checkout" data-nomor="{{ $datastatus->id }}" data-transaksi="{{ $datastatus->id_transaksi }}" 
                    class="btn btn-danger" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;
                    display: flex; justify-content: center; align-items: center;
                    background-color:red ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">207</a>

                @elseif($datastatus && (int)$datastatus->status === 2)
                    <a href="{{ url('checkin/kamar_ready') }}/207" class="btn btn-secondary"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:grey;width: 110px; height: 80px; margin: 10px; font-size: 45px;">207</a>
                @else
                    <a href="{{ url('checkin/input_checkin') }}/207" class="btn btn-success"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:rgb(12, 209, 12) ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">
                    207</a>
                @endif

                @php
                    $datastatus = App\Models\status_kamar::where('id', 208)->first();
                @endphp
                @if($datastatus && (int)$datastatus->status === 1)
                    <a href="#" data-toggle="modal" data-target="#checkout"
                    id="data-checkout" data-nomor="{{ $datastatus->id }}" data-transaksi="{{ $datastatus->id_transaksi }}" 
                    class="btn btn-danger" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;
                    display: flex; justify-content: center; align-items: center;
                    background-color:red ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">208</a>

                @elseif($datastatus && (int)$datastatus->status === 2)
                    <a href="{{ url('checkin/kamar_ready') }}/208" class="btn btn-secondary"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:grey;width: 110px; height: 80px; margin: 10px; font-size: 45px;">208</a>
                @else
                    <a href="{{ url('checkin/input_checkin') }}/208" class="btn btn-success"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:rgb(12, 209, 12) ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">
                    208</a>
                @endif

                @php
                    $datastatus = App\Models\status_kamar::where('id', 209)->first();
                @endphp
                @if($datastatus && (int)$datastatus->status === 1)
                    <a href="#" data-toggle="modal" data-target="#checkout"
                    id="data-checkout" data-nomor="{{ $datastatus->id }}" data-transaksi="{{ $datastatus->id_transaksi }}" 
                    class="btn btn-danger" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;
                    display: flex; justify-content: center; align-items: center;
                    background-color:red ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">209</a>

                @elseif($datastatus && (int)$datastatus->status === 2)
                    <a href="{{ url('checkin/kamar_ready') }}/209" class="btn btn-secondary"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:grey;width: 110px; height: 80px; margin: 10px; font-size: 45px;">209</a>
                @else
                    <a href="{{ url('checkin/input_checkin') }}/209" class="btn btn-success"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:rgb(12, 209, 12) ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">
                    209</a>
                @endif

                @php
                    $datastatus = App\Models\status_kamar::where('id', 210)->first();
                @endphp
                @if($datastatus && (int)$datastatus->status === 1)
                    <a href="#" data-toggle="modal" data-target="#checkout"
                    id="data-checkout" data-nomor="{{ $datastatus->id }}" data-transaksi="{{ $datastatus->id_transaksi }}" 
                    class="btn btn-danger" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;
                    display: flex; justify-content: center; align-items: center;
                    background-color:red ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">210</a>

                @elseif($datastatus && (int)$datastatus->status === 2)
                    <a href="{{ url('checkin/kamar_ready') }}/210" class="btn btn-secondary"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:grey;width: 110px; height: 80px; margin: 10px; font-size: 45px;">210</a>
                @else
                    <a href="{{ url('checkin/input_checkin') }}/210" class="btn btn-success"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:rgb(12, 209, 12) ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">
                    210</a>
                @endif
            </div>
            <div class="row">
                @php
                    $datastatus = App\Models\status_kamar::where('id', 301)->first();
                @endphp
                @if($datastatus && (int)$datastatus->status === 1)
                    <a href="#" data-toggle="modal" data-target="#checkout"
                    id="data-checkout" data-nomor="{{ $datastatus->id }}" data-transaksi="{{ $datastatus->id_transaksi }}" 
                    class="btn btn-danger" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;
                    display: flex; justify-content: center; align-items: center;
                    background-color:red ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">301</a>

                @elseif($datastatus && (int)$datastatus->status === 2)
                    <a href="{{ url('checkin/kamar_ready') }}/301" class="btn btn-secondary"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:grey;width: 110px; height: 80px; margin: 10px; font-size: 45px;">301</a>
                @else
                    <a href="{{ url('checkin/input_checkin') }}/301" class="btn btn-success"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:rgb(12, 209, 12) ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">
                    301</a>
                @endif

                @php
                    $datastatus = App\Models\status_kamar::where('id', 302)->first();
                @endphp
                @if($datastatus && (int)$datastatus->status === 1)
                    <a href="#" data-toggle="modal" data-target="#checkout"
                    id="data-checkout" data-nomor="{{ $datastatus->id }}" data-transaksi="{{ $datastatus->id_transaksi }}" 
                    class="btn btn-danger" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;
                    display: flex; justify-content: center; align-items: center;
                    background-color:red ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">302</a>

                @elseif($datastatus && (int)$datastatus->status === 2)
                    <a href="{{ url('checkin/kamar_ready') }}/302" class="btn btn-secondary"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:grey;width: 110px; height: 80px; margin: 10px; font-size: 45px;">302</a>
                @else
                    <a href="{{ url('checkin/input_checkin') }}/302" class="btn btn-success"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:rgb(12, 209, 12) ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">
                    302</a>
                @endif

                @php
                    $datastatus = App\Models\status_kamar::where('id', 303)->first();
                @endphp
                @if($datastatus && (int)$datastatus->status === 1)
                    <a href="#" data-toggle="modal" data-target="#checkout"
                    id="data-checkout" data-nomor="{{ $datastatus->id }}" data-transaksi="{{ $datastatus->id_transaksi }}" 
                    class="btn btn-danger" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;
                    display: flex; justify-content: center; align-items: center;
                    background-color:red ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">303</a>

                @elseif($datastatus && (int)$datastatus->status === 2)
                    <a href="{{ url('checkin/kamar_ready') }}/303" class="btn btn-secondary"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:grey;width: 110px; height: 80px; margin: 10px; font-size: 45px;">303</a>
                @else
                    <a href="{{ url('checkin/input_checkin') }}/303" class="btn btn-success"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:rgb(12, 209, 12) ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">
                    303</a>
                @endif

                @php
                    $datastatus = App\Models\status_kamar::where('id', 304)->first();
                @endphp
                @if($datastatus && (int)$datastatus->status === 1)
                    <a href="#" data-toggle="modal" data-target="#checkout"
                    id="data-checkout" data-nomor="{{ $datastatus->id }}" data-transaksi="{{ $datastatus->id_transaksi }}" 
                    class="btn btn-danger" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;
                    display: flex; justify-content: center; align-items: center;
                    background-color:red ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">304</a>

                @elseif($datastatus && (int)$datastatus->status === 2)
                    <a href="{{ url('checkin/kamar_ready') }}/304" class="btn btn-secondary"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:grey;width: 110px; height: 80px; margin: 10px; font-size: 45px;">304</a>
                @else
                    <a href="{{ url('checkin/input_checkin') }}/304" class="btn btn-success"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:rgb(12, 209, 12) ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">
                    304</a>
                @endif

                @php
                    $datastatus = App\Models\status_kamar::where('id', 305)->first();
                @endphp
                @if($datastatus && (int)$datastatus->status === 1)
                    <a href="#" data-toggle="modal" data-target="#checkout"
                    id="data-checkout" data-nomor="{{ $datastatus->id }}" data-transaksi="{{ $datastatus->id_transaksi }}" 
                    class="btn btn-danger" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;
                    display: flex; justify-content: center; align-items: center;
                    background-color:red ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">305</a>

                @elseif($datastatus && (int)$datastatus->status === 2)
                    <a href="{{ url('checkin/kamar_ready') }}/305" class="btn btn-secondary"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:grey;width: 110px; height: 80px; margin: 10px; font-size: 45px;">305</a>
                @else
                    <a href="{{ url('checkin/input_checkin') }}/305" class="btn btn-success"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:rgb(12, 209, 12) ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">
                    305</a>
                @endif

                @php
                    $datastatus = App\Models\status_kamar::where('id', 306)->first();
                @endphp
                @if($datastatus && (int)$datastatus->status === 1)
                    <a href="#" data-toggle="modal" data-target="#checkout"
                    id="data-checkout" data-nomor="{{ $datastatus->id }}" data-transaksi="{{ $datastatus->id_transaksi }}" 
                    class="btn btn-danger" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;
                    display: flex; justify-content: center; align-items: center;
                    background-color:red ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">306</a>

                @elseif($datastatus && (int)$datastatus->status === 2)
                    <a href="{{ url('checkin/kamar_ready') }}/306" class="btn btn-secondary"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:grey;width: 110px; height: 80px; margin: 10px; font-size: 45px;">306</a>
                @else
                    <a href="{{ url('checkin/input_checkin') }}/306" class="btn btn-success"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:rgb(12, 209, 12) ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">
                    306</a>
                @endif

                @php
                    $datastatus = App\Models\status_kamar::where('id', 307)->first();
                @endphp
                @if($datastatus && (int)$datastatus->status === 1)
                    <a href="#" data-toggle="modal" data-target="#checkout"
                    id="data-checkout" data-nomor="{{ $datastatus->id }}" data-transaksi="{{ $datastatus->id_transaksi }}" 
                    class="btn btn-danger" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;
                    display: flex; justify-content: center; align-items: center;
                    background-color:red ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">307</a>

                @elseif($datastatus && (int)$datastatus->status === 2)
                    <a href="{{ url('checkin/kamar_ready') }}/307" class="btn btn-secondary"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:grey;width: 110px; height: 80px; margin: 10px; font-size: 45px;">307</a>
                @else
                    <a href="{{ url('checkin/input_checkin') }}/307" class="btn btn-success"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:rgb(12, 209, 12) ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">
                    307</a>
                @endif

                @php
                    $datastatus = App\Models\status_kamar::where('id', 308)->first();
                @endphp
                @if($datastatus && (int)$datastatus->status === 1)
                    <a href="#" data-toggle="modal" data-target="#checkout"
                    id="data-checkout" data-nomor="{{ $datastatus->id }}" data-transaksi="{{ $datastatus->id_transaksi }}" 
                    class="btn btn-danger" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;
                    display: flex; justify-content: center; align-items: center;
                    background-color:red ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">308</a>

                @elseif($datastatus && (int)$datastatus->status === 2)
                    <a href="{{ url('checkin/kamar_ready') }}/308" class="btn btn-secondary"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:grey;width: 110px; height: 80px; margin: 10px; font-size: 45px;">308</a>
                @else
                    <a href="{{ url('checkin/input_checkin') }}/308" class="btn btn-success"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:rgb(12, 209, 12) ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">
                    308</a>
                @endif

                @php
                    $datastatus = App\Models\status_kamar::where('id', 309)->first();
                @endphp
                @if($datastatus && (int)$datastatus->status === 1)
                    <a href="#" data-toggle="modal" data-target="#checkout"
                    id="data-checkout" data-nomor="{{ $datastatus->id }}" data-transaksi="{{ $datastatus->id_transaksi }}" 
                    class="btn btn-danger" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;
                    display: flex; justify-content: center; align-items: center;
                    background-color:red ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">309</a>

                @elseif($datastatus && (int)$datastatus->status === 2)
                    <a href="{{ url('checkin/kamar_ready') }}/309" class="btn btn-secondary"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:grey;width: 110px; height: 80px; margin: 10px; font-size: 45px;">309</a>
                @else
                    <a href="{{ url('checkin/input_checkin') }}/309" class="btn btn-success"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:rgb(12, 209, 12) ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">
                    309</a>
                @endif

                @php
                    $datastatus = App\Models\status_kamar::where('id', 310)->first();
                @endphp
                @if($datastatus && (int)$datastatus->status === 1)
                    <a href="#" data-toggle="modal" data-target="#checkout"
                    id="data-checkout" data-nomor="{{ $datastatus->id }}" data-transaksi="{{ $datastatus->id_transaksi }}" 
                    class="btn btn-danger" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;
                    display: flex; justify-content: center; align-items: center;
                    background-color:red ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">310</a>

                @elseif($datastatus && (int)$datastatus->status === 2)
                    <a href="{{ url('checkin/kamar_ready') }}/310" class="btn btn-secondary"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:grey;width: 110px; height: 80px; margin: 10px; font-size: 45px;">310</a>
                @else
                    <a href="{{ url('checkin/input_checkin') }}/310" class="btn btn-success"
                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                    background-color:rgb(12, 209, 12) ;width: 110px; height: 80px; margin: 10px; font-size: 45px;">
                    310</a>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Tamu Checkin</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Kamar</th>
                                        <th>Nama</th>
                                        <th>Jenis Tamu</th>
                                        <th>Jenis Transaksi</th>
                                        <th>Jumlah Tamu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $datatampil = App\Models\status_kamar::with('Kategori_Transaksi')->where('status',1)->get();
                                    @endphp
                                    @foreach ($datatampil as $item)
                                        <tr>
                                            <td>{{ $item->id}}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->statustamu }}</td>
                                            <td>{{ $item->Kategori_Transaksi->nama_transaksi }}</td>
                                            <td>{{ $item->jumlahtamu }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4">Total Tamu</th>
                                        <th>{{ $jumlahtamu }}</th>
                                    </tr>
                                </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tamu Belum Bayar</h6>
                    <button type="button" class="btn btn-circle btn-outline-success">
                        <i style="font-size: 35px;">+</i>
                    </button>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Kamar</th>
                                        <th>Nama</th>
                                        <th>Jumlah Kekurangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php
                                        $datatampil = App\Models\status_kamar::with('Kategori_Transaksi')->where('status',1)->get();
                                    @endphp --}}
                                    @foreach ($datatungggakan as $item)
                                        <tr>
                                            <td>{{ $item->id}}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ number_format($item->kekurangan) }}</td>
                                            <td>
                                                <a href="#" id="lunaskan" data-transaksi="{{ $item->id_transaksi }}" class="btn btn-outline-success">Lunaskan</a>
                                            </td>
                                            {{-- <td>{{ $item->jumlahtamu }}</td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3">Total Tamu</th>
                                        <th>{{ $jumlahtamu }}</th>
                                    </tr>
                                </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Tamu-->
<div class="modal fade" id="checkout" name="checkout" tabindex="-1" role="dialog" aria-labelledby="checkoutTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="checkoutTitle">Data Checkout</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body table-responsive">
            <input type="hidden" type="text" id="nokamar" name="nokamar">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Nama</th>
                        <th>No Hp</th>
                    </tr>
                </thead>
                <tbody id="modalTableBody"></tbody>
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <a href="#" onclick="aksicheckout()" data-dismiss="modal" id="tombol_checkout" class="btn btn-success">Check Out</a>
        </div>
      </div>
  </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    } );
</script>
<script>
    $(document).ready(function() {
        $(document).on('click','#lunaskan',function(){
        var idtrans = $(this).data('transaksi');
        $.ajax({
            url: "{{ route('checkin.update_tgl_lunas') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                "id_transaksi": idtrans,
            },
            success: function(response) {
                    // Clear existing table rows
                    $('#modalTableBody').empty();

                    // Populate the table with the fetched details
                    $.each(response, function(index, result) {
                        var row = '<tr>' +
                                    '<td>' + result.checkin + '</td>' +
                                    '<td>' + result.checkout + '</td>' +
                                    '<td>' + result.nama + '</td>' +
                                    // '<td>' + result.nohp + '</td>' +
                                '</tr>';
                        $('#modalTableBody').append(row);
                    });
                    $('#nokamar').val(nokamar);
                    $('#checkout').modal('show');
                },
                error: function(xhr) {
                    console.log(xhr.responseText); // Handle the error appropriately
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(document).on('click','#data-checkout',function(){
        var nokamar = $(this).data('nomor');
        var idtrans = $(this).data('transaksi');
        $.ajax({
            url: "{{ route('checkout.ambildatacheckout') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                "id_transaksi": idtrans,
            },
            success: function(response) {
                    // Clear existing table rows
                    $('#modalTableBody').empty();

                    // Populate the table with the fetched details
                    $.each(response, function(index, result) {
                        var row = '<tr>' +
                                    '<td>' + result.checkin + '</td>' +
                                    '<td>' + result.checkout + '</td>' +
                                    '<td>' + result.nama + '</td>' +
                                    // '<td>' + result.nohp + '</td>' +
                                '</tr>';
                        $('#modalTableBody').append(row);
                    });
                    $('#nokamar').val(nokamar);
                    $('#checkout').modal('show');
                },
                error: function(xhr) {
                    console.log(xhr.responseText); // Handle the error appropriately
                }
        });
        });
    });
</script>
<script>
    function aksicheckout(){
        var id = $('#nokamar').val();

        // alert(id);
        $.ajax({
            url: "{{ route('checkout.simpan') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                "id": id,
            },
            success: function(response) {
            // Handle the success response
            // $('#checkout').modal('hide');
            // console.log(response.success);
                Swal.fire({
                title: 'CheckOut Kamar',
                text: response.message,
                icon: 'success',
                showConfirmButton: false,
                timer: 1500
            });

            // Redirect the user after a delay
            setTimeout(function() {
                window.location.href = response.redirect_url;
            }, 1500);
            },
            error: function(xhr) {
                // Handle the error response
                // console.log(xhr.responseJSON.error);
                alert('Error CheckOut data: ' + xhr.responseJSON.message);
            },
        });
    };
</script>
@endsection



{{-- CODING TOMBOL KAMAR DONE --}}
{{-- @php
    $datastatus = App\Models\status_kamar::where('id', 104)->first();
@endphp

@if($datastatus && (int)$datastatus->status === 1)
    <a href="#" data-toggle="modal" data-target="#checkout"
    id="data-checkout" data-nomor="{{ $datastatus->id }}" data-transaksi="{{ $datastatus->id_transaksi }}" 
    class="btn btn-danger" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;
    display: flex; justify-content: center; align-items: center;
    background-color:red ;width: 120px; height: 80px; margin: 20px; font-size: 45px;">104</a>

@elseif($datastatus && (int)$datastatus->status === 2)
    <a href="{{ url('checkin/kamar_ready') }}/104" class="btn btn-secondary"
    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
    background-color:grey;width: 120px; height: 80px; margin: 20px; font-size: 45px;">104</a>
@else
    <a href="{{ url('checkin/input_checkin') }}/104" class="btn btn-success"
    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
    background-color:rgb(12, 209, 12) ;width: 120px; height: 80px; margin: 20px; font-size: 45px;">
    104</a>
@endif --}}