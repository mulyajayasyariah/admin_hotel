@extends('layouts.app')
@section('title','Reservasi Kamar')

<style>

</style>

@section('content')
@include('sweetalert::alert')
<!-- Content here -->
<div class="container-fluid"> 
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row mb-4 mt-2">
                <a href="{{ route('reservasi.input_reservasi') }}"  id="tambah_reservasi" 
                class="btn btn-rounded btn-success btn-floating float ml-4"><i class="fa fa-plus"></i>   Buat Reservasi</a>
            </div>
            <div class="row">
                <div class="col mb-4 mt-2">
                    <form action="{{ route('reservasi') }}" method="GET">
                        <input type="hidden" type="date" id="inputDate" name="inputDate" value="{{ $sebelum }}" >
                        <button type="submit" style="border:0px; background-color: transparent;"><  10 Hari Sebelumnya</button>
                    </form>
                </div>
                <div class="col mb-4 mt-2">
                    <form action="{{ route('reservasi') }}" method="GET">
                        <span>Dari : </span>
                        <input type="date" id="inputDate" value="{{  date('Y-m-d', time())}}" name="inputDate">
                        <button type="submit" class="btn btn-outline-success">Cari</button>
                    </form>
                </div>
                <div class="col mb-4 mt-2">
                    <span>Hingga {{ date('d F Y',strtotime($lastDate)) }}</span>
                </div>
                <div class="col mb-4 mt-2">
                    <form action="{{ route('reservasi') }}" method="GET">
                        <input type="hidden" type="date" id="inputDate" name="inputDate" value="{{ $lastDate }}" >
                        <button type="submit" style="border:0px; background-color: transparent;" class="fa-pull-right">10 Hari Selanjutnya ></button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="table table-responsive">
                    <table class="table-bordered table-hover" style="font-size:15px ;width: 100%;">
                        <thead id="tableHead">
                            <tr id="targetHeader">
                                <th>Kamar</th>
                                {{-- <pre>
                                    @dd($tanggalmulai)
                                </pre> --}}
                                @foreach ($tanggalmulai as $tanggal)
                                    <th>{{ date('d F',strtotime($tanggal)) }}</th>                                    
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nokamar as $id)
                                <tr id="{{ $id }}">
                                    <td>{{ $id }}</td>
                                    @foreach ($tanggalmulai as $date)
                                        @php
                                            $result = $caridata->where('checkin', $date)
                                                ->where('nokamar', $id)
                                                ->first();
                                            // $firstWord = $result ? explode(' ', $result->nama)[0] : '';  //hanya 1 Kata
                                        @endphp
                                            <td>
                                                @if ($result)
                                                    @if($result->id_kategori_transaksi==1 && $result->harusdibayar==0)
                                                        <a href="{{ url('checkin/input_checkin') }}/{{ $result->nokamar }}"
                                                            style="background-color: blue ;font-size: 15px;" class="btn btn-outline-light" >{{ $result->nama }}</a>
                                                    @elseif($result->id_kategori_transaksi==1 && $result->harusdibayar!=0 )
                                                        <a href="{{ url('checkin/input_checkin') }}/{{ $result->nokamar }}" data="{{ $result->id }}"
                                                            style="background-color: rgb(255, 0, 0);font-size: 15px;" class="btn btn-outline-light">{{ $result->nama }}</a>
                                                    @elseif($result->id_kategori_transaksi==2)
                                                        <a href="{{ url('checkin/input_checkin') }}/{{ $result->nokamar }}" data="{{ $result->id }}"
                                                            style="background-color: rgb(7, 212, 7);font-size: 15px;" class="btn btn-outline-light">{{ $result->nama }}</a>
                                                    @elseif($result->id_kategori_transaksi==3)
                                                        <a href="{{ url('checkin/input_checkin') }}/{{ $result->nokamar }}" data="{{ $result->id }}"
                                                            style="background-color: rgb(199, 152, 0);font-size: 15px;" class="btn btn-outline-light">{{ $result->nama }}</a>
                                                    @elseif($result->id_kategori_transaksi==4)
                                                        <a href="{{ url('checkin/input_checkin') }}/{{ $result->nokamar }}" data="{{ $result->id }}"
                                                            style="background-color: rgb(120, 0, 218);font-size: 15px;" class="btn btn-outline-light">{{ $result->nama }}</a>
                                                    @endif
                                                @else
                                                    {{ '' }}
                                                @endif
                                            </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div
@endsection
@section('js')
<script></script>
{{-- <script>
    function generateTableHeaders() {
        var targetRow = document.getElementById('targetHeader');
        var targetRowBody = document.getElementById('targetBody');
        var inputDate = document.getElementById('inputDate').value; // Get the input date from the input field
        var existingHeaders = tableHead.getElementsByTagName('th');

        // Remove existing headers except for the first one
        for (var i = existingHeaders.length - 1; i > 0; i--) {
            targetRow.removeChild(existingHeaders[i]);
        }
        var currentDate = new Date(inputDate);
        // Expand the table headers by adding new <th> elements
        for (var i = 0; i < 10; i++) {
            var formattedDate = currentDate.toISOString().split('T')[0];
            var day = currentDate.getDate();
            var th = document.createElement('th');
            th.textContent = day;
            th.id = formattedDate;
            targetRow.appendChild(th);

            currentDate.setDate(currentDate.getDate() + 1);
        }
    }
</script>
<script>
    function populateTableBody() {
        var searchDate = document.getElementById('inputDate').value; // Get the search date from the input field
        var tableBody = document.getElementById('targetBody');
        tableBody.innerHTML = ''; // Clear existing table rows

        var startDate = new Date(searchDate);
        var endDate = new Date(searchDate);
        endDate.setDate(endDate.getDate() + 10);

        var currentDate = new Date(startDate);

        while (currentDate <= endDate) {
            var formattedDate = currentDate.toISOString().split('T')[0];
            $.ajax({
                url: "{{ route('dataper_tanggal') }}", 
                type: 'GET',
                data: { searchDate: formattedDate },
                async: false,
                success: function(response) {
                    var data = response.data.id;

                    for (var i = 0; i < data.length; i++) {
                        var row = '<tr>';
                        row += '<td id="'+data+'">' + formattedDate +
                             '</td>';
                        // Add more columns from the data as needed
                        row += '</tr>';

                        tableBody.innerHTML += row;
                    }
                }
            });

            currentDate.setDate(currentDate.getDate() + 1);
        }
    }
</script> --}}
@endsection