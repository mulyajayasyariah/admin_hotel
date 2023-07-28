@extends('layouts.app')
@section('title','Kamar')

<style>

</style>

@section('content')
@include('sweetalert::alert')
<!-- Content here -->
<!-- DataTales Example -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table style="width: 100%;" id="dataTable" width="50%" cellspacing="0">
                    {{-- @foreach ($datatransaksi as $item) --}}
                    <tbody>
                        {{-- LANTAI 1 --}}
                        <tr>
                            <td>@php
                                $datastatus = App\Models\status_kamar::where('id', 101)->first();
                                @endphp

                                @if($datastatus && (int)$datastatus->status === 1)
                                <a href="{{ url('checkin/checkout/simpan') }}/101" class="btn btn-danger"
                                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                                    background-color:red;width: 120px; height: 80px; margin: 20px; font-size: 45px;">101</a>
                                @elseif($datastatus && (int)$datastatus->status === 2)
                                <a href="{{ url('checkin/input_checkin') }}/101" class="btn btn-secondary"
                                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                                    background-color:grey ;width: 120px; height: 80px; margin: 20px; font-size: 45px;">101</a>
                                @else
                                <a href="{{ url('checkin/input_checkin') }}/101" class="btn btn-success"
                                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                                        background-color:rgb(12, 209, 12) ;width: 120px; height: 80px; margin: 20px; font-size: 45px;">
                                    101
                                </a>
                                @endif
                            </td>
                            <td>@php
                                    $datastatus = App\Models\status_kamar::where('id', 102)->first();
                                @endphp

                                @if($datastatus && (int)$datastatus->status === 1)
                                <a href="{{ url('checkin/input_checkin') }}/102" class="btn btn-danger"
                                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                                    background-color:red ;width: 120px; height: 80px; margin: 20px; font-size: 45px;">102</a>
                                @elseif($datastatus && (int)$datastatus->status === 2)
                                <a href="{{ url('checkin/input_checkin') }}/102" class="btn btn-secondary"
                                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                                    background-color:grey;width: 120px; height: 80px; margin: 20px; font-size: 45px;">102</a>
                                @else
                                <a href="{{{ url('checkin/input_checkin') }}}/102" class="btn btn-success"
                                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                                background-color:rgb(12, 209, 12) ;width: 120px; height: 80px; margin: 20px; font-size: 45px;">
                                    102
                                </a>
                                @endif
                            </td>
                            <td>@php
                                $datastatus = App\Models\status_kamar::where('id', 103)->first(); // Replace
                                @endphp

                                @if($datastatus && (int)$datastatus->status === 1)
                                <a href="{{ url('checkin/input_checkin') }}/103" class="btn btn-danger"
                                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                                    background-color:red ;width: 120px; height: 80px; margin: 20px; font-size: 45px;">103</a>
                                @elseif($datastatus && (int)$datastatus->status === 2)
                                <a href="{{ url('checkin/input_checkin') }}/103" class="btn btn-secondary"
                                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                                    background-color:grey ;width: 120px; height: 80px; margin: 20px; font-size: 45px;">103</a>
                                @else
                                <a href="{{ url('checkin/input_checkin') }}/103" class="btn btn-success"
                                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;display: flex; justify-content: center; align-items: center;
                                background-color:rgb(12, 209, 12) ;width: 120px; height: 80px; margin: 20px; font-size: 45px;">
                                    103
                                </a>
                                @endif
                            </td>
                            <td>@php
                                    $datastatus = App\Models\status_kamar::where('id', 104)->first();
                                @endphp

                                @if($datastatus && (int)$datastatus->status === 1)
                                <a href="#" onclick="ambildatacheckout()" data-toggle="modal" data-target="#checkout"
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
                                @endif
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        {{-- LANTAI 2 --}}
                        <tr>
                            <td><a style="width: 120px; height: 80px; margin: 20px; font-size: 25px;"
                                    class="btn btn-primary" id="201" name="201"
                                    href="{{ url('checkin/input_checkin') }}/201">
                                    201
                            </td>
                            <td><a style="width: 120px; height: 80px; margin: 20px; font-size: 25px;"
                                    class="btn btn-primary" id="202" name="202"
                                    href="{{ url('checkin/input_checkin') }}/202">
                                    202
                            </td>
                            <td><a style="width: 120px; height: 80px; margin: 20px; font-size: 25px;"
                                    class="btn btn-primary" id="203" name="203"
                                    href="{{ url('checkin/input_checkin') }}/203">
                                    203
                            </td>
                            <td><a style="width: 120px; height: 80px; margin: 20px; font-size: 25px;"
                                    class="btn btn-primary" id="204" name="204"
                                    href="{{ url('checkin/input_checkin') }}/204">
                                    204
                            </td>
                            <td><a style="width: 120px; height: 80px; margin: 20px; font-size: 25px;"
                                    class="btn btn-primary" id="205" name="205"
                                    href="{{ url('checkin/input_checkin') }}/205">
                                    205
                            </td>
                            <td><a style="width: 120px; height: 80px; margin: 20px; font-size: 25px;"
                                    class="btn btn-primary" id="206" name="206"
                                    href="{{ url('checkin/input_checkin') }}/206">
                                    206
                            </td>
                            <td><a style="width: 120px; height: 80px; margin: 20px; font-size: 25px;"
                                    class="btn btn-primary" id="207" name="207"
                                    href="{{ url('checkin/input_checkin') }}/207">
                                    207
                            </td>
                            <td><a style="width: 120px; height: 80px; margin: 20px; font-size: 25px;"
                                    class="btn btn-primary" id="208" name="208"
                                    href="{{ url('checkin/input_checkin') }}/208">
                                    208
                            </td>
                            <td><a style="width: 120px; height: 80px; margin: 20px; font-size: 25px;"
                                    class="btn btn-primary" id="209" name="209"
                                    href="{{ url('checkin/input_checkin') }}/209">
                                    209
                            </td>
                            <td><a style="width: 120px; height: 80px; margin: 20px; font-size: 25px;"
                                    class="btn btn-primary" id="210" name="210"
                                    href="{{ url('checkin/input_checkin') }}/210">
                                    210
                            </td>
                        </tr>
                        {{-- LANTAI 3 --}}
                        <tr>
                            <td><a style="width: 120px; height: 80px; margin: 20px; font-size: 25px;"
                                    class="btn btn-primary" id="301" name="301"
                                    href="{{ url('checkin/input_checkin') }}/301">
                                    301
                            </td>
                            <td><a style="width: 120px; height: 80px; margin: 20px; font-size: 25px;"
                                    class="btn btn-primary" id="302" name="302"
                                    href="{{ url('checkin/input_checkin') }}/302">
                                    302
                            </td>
                            <td><a style="width: 120px; height: 80px; margin: 20px; font-size: 25px;"
                                    class="btn btn-primary" id="303" name="303"
                                    href="{{ url('checkin/input_checkin') }}/303">
                                    303
                            </td>
                            <td><a style="width: 120px; height: 80px; margin: 20px; font-size: 25px;"
                                    class="btn btn-primary" id="304" name="304"
                                    href="{{ url('checkin/input_checkin') }}/304">
                                    304
                            </td>
                            <td><a style="width: 120px; height: 80px; margin: 20px; font-size: 25px;"
                                    class="btn btn-primary" id="305" name="305"
                                    href="{{ url('checkin/input_checkin') }}/305">
                                    305
                            </td>
                            <td><a style="width: 120px; height: 80px; margin: 20px; font-size: 25px;"
                                    class="btn btn-primary" id="306" name="306"
                                    href="{{ url('checkin/input_checkin') }}/306">
                                    306
                            </td>
                            <td><a style="width: 120px; height: 80px; margin: 20px; font-size: 25px;"
                                    class="btn btn-primary" id="307" name="307"
                                    href="{{ url('checkin/input_checkin') }}/307">
                                    307
                            </td>
                            <td><a style="width: 120px; height: 80px; margin: 20px; font-size: 25px;"
                                    class="btn btn-primary" id="308" name="308"
                                    href="{{ url('checkin/input_checkin') }}/308">
                                    308
                            </td>
                            <td><a style="width: 120px; height: 80px; margin: 20px; font-size: 25px;"
                                    class="btn btn-primary" id="309" name="309"
                                    href="{{ url('checkin/input_checkin') }}/309">
                                    309
                            </td>
                            <td><a style="width: 120px; height: 80px; margin: 20px; font-size: 25px;"
                                    class="btn btn-primary" id="310" name="310"
                                    href="{{ url('checkin/input_checkin') }}/310">
                                    310
                            </td>
                        </tr>
                    </tbody>
                    {{-- @endforeach --}}
                </table>
            </div>
        </div>
    </div>
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        {{-- <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Tamu Checkin</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Kamar</th>
                                    <th>Nama</th>
                                    <th>No Hp</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                @foreach ($datastatus as $item)
                                <tbody>
                                        <tr>
                                                <td>{{ $item->id}}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->nohp }}</td>
                                                <td>
                                                        <a href="#"
                                                                class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                        </tr>
                                </tbody>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}
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
    function ambildatacheckout(){
        var nokamar = $('#data-checkout').data('nomor');
        var idtrans = $('#data-checkout').data('transaksi');
        
        // alert(idtrans);
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
        
        // $('#checkout').modal('show'); // Show the modal
    };
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
    <a href="#" onclick="ambildatacheckout()" data-toggle="modal" data-target="#checkout"
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