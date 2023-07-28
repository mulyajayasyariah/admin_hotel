@extends('layouts.app')
@section('title','Input Reservasi')

@section('content')
@include('sweetalert::alert')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4">
                    <h5>Data Inap</h5>
                </div>
                <div class="col-md-4">
                    <h5>Data Tamu</h5>
                </div>
                <div class="col-md-4">
                    <h5>Data Tagihan</h5>
                </div>
            </div>
        </div>
        <div class="form-group row">
            {{-- <form action="{{ route('checkin.tambah.sementara') }}" method="POST">
            {{ csrf_field() }} --}}
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-4">
                        <label class="col-form-label" for="notransaksi">No Transaksi</label>
                        <br>
                        <input class="form-control" style="width: 235px; height: 35px;" type="text" name="notransaksi"
                            id="notransaksi" value="{{ $notransaksi }}" >
                    </div>
                    <div class="col-md-4">
                        <label for="nama">Nama</label>
                        <br>
                        <div class="input-group">
                            <input type="text" id="nama" name="nama" class="form-control border-1 small">
                            <div class="input-group-append">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#cari_tamu">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                        {{-- <input class="form-control" style="width: 194px; height: 35px;" type="text" name="nama" id="nama" required> --}}
                    </div>
                    <div class="col-md-4">
                        <label class="col-form-label" for="total">Harga Sewa/Hari</label>
                        <br>
                        <input class="form-control" style="width: 194px; height: 35px;" type="number" name="total"
                            id="total" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="nokamar">Kamar</label>
                        <br>
                        <select style="width: 194px; height: 35px;" onchange="ambil_katkamar()" class="form-control" type="number" name="nokamar"
                        id="nokamar" >
                        <option disable value >--Pilih Kamar--</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="nohp">No HP</label>
                        <br>
                        <input class="form-control" style="width: 194px; height: 35px;" type="number" name="nohp" id="nohp" required>
                    </div>
                    <div class="col-md-4">
                        <label for="diskon">Diskon per Kamar</label>
                        <br>
                        <input class="form-control" style="width: 194px; height: 35px;" type="number" name="diskon"
                            id="diskon" onkeyup="total()">
                    </div>
                </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="id_kategori_transaksi">Kategori Transaksi</label>
                            <br>
                            <select onchange="ambilharga()" class="form-control mb-3" style="width: 194px; height: 35px;" name="id_kategori_transaksi"
                                id="id_kategori_transaksi">
                                <option disable value >--Pilih Kategori--</option>
                                @foreach ($dtkattrans as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_transaksi }}</option>
                                @endforeach
                            </select>
                            <label for="tglbooking">Tanggal Booking</label>
                            <br>
                            <input class="form-control" style="width: 194px; height: 35px;" type="date" 
                            name="tglbooking" id="tglbooking" value="{{  date('Y-m-d', time())}}">
                        </div>
                        <div class="col-md-4">
                            <h5>Tombol tambah hari</h5>
                            {{-- Tombol Kurang Hari --}}
                            <a href="#" onclick="kurang_hari(event)" style="width: 65px; height: 50px;background-color:red;margin: 10px;" class="btn btn-primary" 
                            id="kuranghari" name="kuranghari"><i style="font-size: 25px"><strong>-</strong></i></a>
                            
                            {{-- Input Hari --}}
                            <input type="hidden" type="number" id="jumlahhari" value="1">

                            {{-- Tombol Tambah Hari --}}
                            <a href="#" onclick="tambah_hari(event)" style="width: 65px; height: 50px;
                            background-color:green" class="btn btn-primary" id="tambahhari" name="tambahhari">
                            <i style="font-size: 25px"><strong>+</strong></i></a>
                            <br>
                            <button type="button" id="lihat_data_transaksi" class="btn btn-outline-info">Lihat Detail Booking</button>

                            <input type="hidden" type="number" 
                                name="id_kategori_kamar" id="id_kategori_kamar">
                            <input type="hidden" type="date" id="tglnext"  
                                name="tglnext">
                        </div>
                        <div class="col-md-4">
                            <label for="grandtotal">Total</label>
                            <br>
                            <input class="form-control mb-3" style="width: 194px; height: 35px;" type="number" name="grandtotal" id="grandtotal">

                            <hr size="10px;" height="85%">

                            <label for="id_metodebayar">Metode Pembayaran</label>
                            <br>
                            <select class="form-control mb-3" onchange="langsunglunas()" style="width: 194px; height: 35px;" name="id_metodebayar"
                                id="id_metodebayar">
                                <option disable value >--Pilih Kategori--</option>
                                @foreach ($dtmetbayar as $item)
                                    <option value="{{ $item->id }}" >{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="tglcheckin">Tanggal Check In</label>
                            <br>
                            <input class="form-control mb-3" style="width: 194px; height: 35px;" 
                                type="date" name="tglcheckin" id="tglcheckin" value="{{  date('Y-m-d', time())}}">
                            <label for="tglcheckout">Tanggal Check Out</label>
                            <br>
                            <input class="form-control" style="width: 194px; height: 35px;" type="date" 
                                name="tglcheckout" id="tglcheckout" readonly>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xl font-weight-bold text-primary text-uppercase mb-1">
                                                Total Hari Booking</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <input type="number" style="width: 75px; height: 55px; font-size:35px;"
                                                class="border-0" id="total-menginap" name="total-menginap" readonly></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <label for="deposit">Deposit/DP</label>
                            <br>
                            <input class="form-control mb-3" style="width: 194px; height: 35px;" type="number" name="deposit" id="deposit" onclick="hitung_grand_total()" onkeyup="semuanya()">

                            <label for="harusdibayar">Yang Masih Harus Dibayar</label>
                            <br>
                            <input style="font-size: 45px; width: 375px; height: 55px; border:0 ;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;" 
                                type="text" id="dengan-rupiah" name="dengan-rupiah" readonly>
                            
                            <input type="hidden" class="form-control mb-3" type="number" name="harusdibayar" id="harusdibayar">

                            <input type="hidden" type="number" id="bantutotal" name="bantutotal">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="keterangan">Keterangan</label>
                            <br>
                            <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="2" placeholder="Datang Jam 9"></textarea>
                        </div>
                    </div>
                </div>
            {{-- </form> --}}
        </div>
        <div class="card-footer">
            <a href="#" onclick="aksi_reservasi_simpan()" class="btn btn-success fa-pull-right">SIMPAN</a>
        </div>
        <div class="card" id="detail-checkin" name="detail-checkin">
            <div class="card-header"><h3>Detail Checkin</h3></div>
            <div class="card-body">
                <div class="row">
                    <div class="table table-responsive col-sm-8">
                        <table id="transaksi_sementara" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <td>Tanggal Checkin</td>
                                    <td>Tanggal Checkout</td>
                                    <td>Nama</td>
                                    {{-- <td>Jumlah Tamu</td> --}}
                                </tr>
                            </thead>
                            <tbody id="modalbody_detail_checkin"></tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Tamu-->
<div class="modal fade" id="cari_tamu" name="cari_tamu" tabindex="-1" role="dialog" aria-labelledby="cari_tamuTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="cari_tamuTitle">Cari Tamu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body table-responsive">
            <table id="table" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Hp</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($datatamu as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->no_hp }}</td>
                            <td>
                                <button class="btn btn-xs btn-info" id="select123" class="close" data-dismiss="modal"
                                    data-id="{{ $item->id }}"
                                    data-nik="{{ $item->nik }}"
                                    data-nama="{{ $item->nama }}"
                                    data-alamat="{{ $item->alamat }}"
                                    data-no_hp="{{ $item->no_hp }}">
                                    <i class="fa fa-check">Select</i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
      </div>
  </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $.ajax({
            url: '{{ route('reservasi.ambil_data') }}',
            type: 'GET',
            success: function(response) {
                var data = response;
                $('#nokamar').select2({
                    data: data
                });
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#table').DataTable( {
        } );
    } );
</script>
<script>
    function langsunglunas(id){
        var dasar = $('#total').val();
        var kalikali = $('#total-menginap').val();
        
        let lunas = parseInt(dasar)*parseInt(kalikali);
        $('#deposit').val(lunas);
    }
</script>
<script>
    function ambil_katkamar()
    {
        let id = $('#nokamar').val();
        // alert(id);
        $.ajax({
            url: '{{ route('reservasi.ambil_data_katkamar') }}',
            type: 'GET',
            data:{
                _token: "{{ csrf_token() }}",
                "id" : id,
            },
            success: function(response) {
                var data = response.id_kategori_kamar;
                // alert(data);
                $('#id_kategori_kamar').val(data);
            }
        });
    }
</script>
<script>
    $(document).ready(function(){
        $('#detail-checkin').hide()
    })
</script>
<script>
    $(document).on('click','#lihat_data_transaksi',function(){
        $('#detail-checkin').show()
    })
</script>
<script>
    // Function FIX
    function tambah_hari(event) {
        event.preventDefault(); // Prevent the default anchor behavior
        
        var inputElement = document.getElementById('tglcheckout');
        var inputElement2 = document.getElementById('tglcheckout');
        var tanggallanjutan = document.getElementById('tglnext');
        var daysInput = document.getElementById('jumlahhari');
        
        //input tabel sementara
        var id_transaksi = $('#notransaksi').val();
        var booking = $('#tglbooking').val();
        var checkin = $('#tglcheckin').val();
        let checkout = $('#tglcheckout').val();
        var no_kamar = $('#nokamar').val();
        var id_kategori_transaksi = $('#id_kategori_transaksi').val();
        var nama = $('#nama').val();
        var nohp = $('#nohp').val();
        var hargakamar = $('#total').val();
        var diskon = $('#diskon').val();
        var grandtotal = $('#grandtotal').val();
        var deposit = $('#deposit').val();
        var id_metodebayar = $('#id_metodebayar').val();
        var harusdibayar = $('#harusdibayar').val();
        var keterangan = $('#keterangan').val();
        if (checkout==""){
            // Get the current date
            var currentDate = new Date(checkin);
            
            // Add one day to the current date
            var nextDate = new Date(currentDate.getTime() + (24 * 60 * 60 * 1000));
            
            // Format the next date as YYYY-MM-DD
            var formattedNextDate = nextDate.toISOString().split('T')[0];
            
            $.ajax({
                url: "{{ route('reservasi.tambah.sementara') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    "id_transaksi" : id_transaksi,
                    "id_kategori_transaksi" :id_kategori_transaksi,
                    "booking" : booking,
                    "checkin" : checkin,
                    "checkout" : formattedNextDate,
                    "id_nokamar" : no_kamar,
                    "nama" : nama,
                    "nohp" : nohp,
                    "hargakamar": hargakamar,
                    "grandtotal" : grandtotal,
                    "diskon" : diskon,
                    "keterangan" : keterangan,
                },
                success: function (data){
                // console.log(data);
                document.getElementById('tglcheckout').value = formattedNextDate;
                var diffInMs = new Date(formattedNextDate).getTime() - new Date(checkin).getTime();
                var diffInDays = Math.floor(diffInMs / (1000 * 60 * 60 * 24));
                var diffAsNumber = Number(diffInDays);
                // alert(diffAsNumber);
                $('#total-menginap').val(diffAsNumber);
                    var row = '<tr>' +
                                '<td>' +  data.checkin + '</td>' +
                                '<td>' + data.checkout  + '</td>' +
                                '<td>' + data.nama  + '</td>' +
                            '</tr>';
                    $('#modalbody_detail_checkin').append(row);
                },
                error: function(data){
                    Swal.fire({
                        title: 'Data Tidak Boleh Kosong',
                        text: data.message,
                        icon: 'warning',
                    });
                },
            });


        }else{
            // Get the current date from the input value
            tanggallanjutan.value = inputElement.value;
            var tanggallanjutan = tanggallanjutan.value;
            var currentDate = new Date(inputElement.value);

            // Get the number of days to add
            var daysToAdd = parseInt(daysInput.value); // You can change this value as needed
            
            // Add the days to the current date
            currentDate.setDate(currentDate.getDate() + daysToAdd);
            
            // Format the date as YYYY-MM-DD
            var formattedDate = currentDate.toISOString().split('T')[0];
            $.ajax({
                url: "{{ route('reservasi.tambah.sementara') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    "id_transaksi" : id_transaksi,
                    "booking" : booking,
                    "checkin" : tanggallanjutan,
                    "checkout" : formattedDate,
                    "id_nokamar" : no_kamar,
                    "id_kategori_transaksi" :id_kategori_transaksi,
                    "nama" : nama,
                    "nohp" : nohp,
                    "hargakamar": hargakamar,
                    "grandtotal" : grandtotal,
                    "diskon" : diskon,
                    "id_metodebayar" : id_metodebayar,
                    "keterangan" : keterangan,
                },
                success: function (data){
                // alert(data.row.harga);
                inputElement2.value = formattedDate;
                var diffInMs = new Date(formattedDate).getTime() - new Date(checkin).getTime();
                var diffInDays = Math.floor(diffInMs / (1000 * 60 * 60 * 24));
                var diffAsNumber = Number(diffInDays);
                // alert(diffAsNumber);

                $('#total-menginap').val(diffAsNumber);
                    var row = '<tr>' +
                                '<td>' +  data.checkin + '</td>' +
                                '<td>' + data.checkout  + '</td>' +
                                '<td>' + data.nama  + '</td>' +
                            '</tr>';
                    $('#modalbody_detail_checkin').append(row);
                },
                error: function(data){
                    Swal.fire({
                        title: 'Data Tidak Boleh Kosong',
                        text: data.message,
                        icon: 'warning',
                    });
                },
            });
        }
    }
</script>
<script>
    function kurang_hari(event){
        var lastRow = $('#transaksi_sementara tbody tr:last');
        var tglcheckout = document.getElementById('tglcheckout');
        var hasilkuranghari = document.getElementById('total-menginap');
        var tgllanjutan = $('#tglnext').val();
        // var hasilpanjang = lastRow.length;
        
        // alert('Berahasil Masuk Function');
        $.ajax({
            url: "{{ route('reservasi.kurang.sementara') }}",
            type: "GET",
            data: {
                _token: "{{ csrf_token() }}",
                // lastRow = hasilpanjang,
            },
            success: function(response) {
            if (lastRow.length > 0) {
                // Remove the last row
                lastRow.remove();
                var currentDate = new Date(tglcheckout.value);
                currentDate.setDate(currentDate.getDate() - 1);
                var formattedDate = currentDate.toISOString().split('T')[0];
                tglcheckout.value = formattedDate;
                var currentValue = parseInt(hasilkuranghari.value);
                var hasil = currentValue-1;
                hasilkuranghari.value = hasil;
            }
            },
            error: function(xhr) {
                Swal.fire({
                        title: 'Tidak ada Data',
                        // text: data.message,
                        icon: 'warning',
                    });
                // alert('Tidak Ada Data!');
                // console.log(xhr.responseText); // Handle the error appropriately
            }
        });
    };
</script>
<script>
    function aksi_reservasi_simpan(){
        var metodebayar = $('#id_metodebayar').val();
        var deposit = $('#deposit').val();
        var harusdibayar = $('#harusdibayar').val();
        var totalmenginap = $('#total-menginap').val();

        let jumlahdeposit = parseInt(deposit)/parseInt(totalmenginap);
        let isikanbayar = parseInt(harusdibayar)/parseInt(totalmenginap);
        // alert(isikanbayar);
        $.ajax({
            url: "{{ route('reservasi.simpan.data') }}",
            type: "POST",
            dataType: 'json',
            data: {
                _token: "{{ csrf_token() }}",
                "metodebayar": metodebayar,
                "deposit": jumlahdeposit,
                "isikanbayar":isikanbayar,
            },
            success: function(response) {
                    // Clear existing table rows
                    // alert('Sukses Hapus');
                    if (response.success) {
                        // alert(response.message);
                        window.location.href = response.redirect;
                        Swal.fire({
                            title: 'BOOKING',
                            text: response.message,
                            icon: 'Succes',
                            // showConfirmButton: false,
                            timer: 1500
                        });
                    }
            },
            error: function(xhr) {
                Swal.fire({
                        title: 'CHECK IN',
                        text: xhr.responseText,
                        icon: 'warning',
                    });
                // console.log(xhr.responseText); // Handle the error appropriately
            }
        });
    }
</script>
<script>
    //input tamu
    $(document).ready(function() {
        $(document).on('click','#select123',function(){
        var nik = $(this).data('nik');
        var nama = $(this).data('nama');
        var alamat = $(this).data('alamat');
        var no_hp = $(this).data('no_hp');
        $('#nama').val(nama);
        $('#nohp').val(no_hp);
        });
    });
</script>
<script>
    function total(){
        let harga_dasar = $('#total').val();
        let total_hari = $('#jumlahhari').val();
        let diskon = $('#diskon').val();
        let dp = $('#deposit').val();
        let tambahan = $('#tambahan').val();
        
        $('#grandtotal').val(
            (parseInt(harga_dasar)*parseInt(total_hari))-parseInt(diskon)
        );
    };
</script>
<script>
    function ambilharga(){
        let id_kategori_transaksi = $('#id_kategori_transaksi').val();
        let id_kategori_kamar = $('#id_kategori_kamar').val();
        
        // alert(id_kategori_kamar);
        $.ajax({
            url: "{{ route('ambilharga') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                "id_kategori_kamar": id_kategori_kamar,
                "id_kategori_transaksi": id_kategori_transaksi
            },
            success: function (data){
                // alert(data.row.harga);
                // console.log(data);
                let harga = data.row.harga;
                $('#total').val(harga);
            },
            error: function(xhr) {
                    console.log(xhr.responseText); // Handle the error appropriately
                }
        });
    };
</script>

<script>
    function hitung_grand_total(){
        // let diskon = $('#diskon').val();
        // let harusdibayar = $('#harusdibayar').val();
        // alert(id_kategori_kamar);
        $.ajax({
            url: "{{ route('reservasi.hitung_semua') }}",
            type: "GET",
            data: {
                _token: "{{ csrf_token() }}",
            },
            success: function (data){
                $('#bantutotal').val(data);
            },
            error: function(xhr) {
                    console.log(xhr.responseText); // Handle the error appropriately
                }
        });
    };
</script>

<script>
    function semuanya(){
        let totalsemua = $('#bantutotal').val();
        let dp = $('#deposit').val();
        $('#harusdibayar').val(
        parseInt(totalsemua)-parseInt(dp)
    );
    };
</script>
<script>
    var acuan = document.getElementById('harusdibayar');
    var target = document.getElementById('dengan-rupiah');
    var dengan_rupiah = document.getElementById('deposit');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
        target.value = formatRupiah(acuan.value, 'Rp. ');
    });
    
    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>
@endsection


{{-- <script>
    // Function FIX
    function tambah_hari(event) {
        event.preventDefault(); // Prevent the default anchor behavior

        var inputElement = document.getElementById('tglcheckout');
        var inputElement2 = document.getElementById('tglcheckout');
        var daysInput = document.getElementById('jumlahhari');
        
        let checkout = $('#tglcheckout').val();
        // let daysInput = $('#jumlahhari').val();
        
        // alert(checkout);
        if (checkout==""){
            // Get the current date
            var currentDate = new Date();
            
            // Add one day to the current date
            var nextDate = new Date(currentDate.getTime() + (24 * 60 * 60 * 1000));
            
            // Format the next date as YYYY-MM-DD
            var formattedNextDate = nextDate.toISOString().split('T')[0];
            
            // Set the value of the input field
            document.getElementById('tglcheckout').value = formattedNextDate;
        }else{
            // Get the current date from the input value
            var currentDate = new Date(inputElement.value);

            // Get the number of days to add
            var daysToAdd = parseInt(daysInput.value); // You can change this value as needed
            
            // Add the days to the current date
            currentDate.setDate(currentDate.getDate() + daysToAdd);
            
            // Format the date as YYYY-MM-DD
            var formattedDate = currentDate.toISOString().split('T')[0];
            
            // Update the input value with the new date
            inputElement2.value = formattedDate;
        }
    }
</script> --}}
{{-- <script>
    // Get the current date
    var currentDate = new Date();
  
    // Add one day to the current date
    var nextDate = new Date(currentDate.getTime() + (24 * 60 * 60 * 1000));
  
    // Format the next date as YYYY-MM-DD
    var formattedNextDate = nextDate.toISOString().split('T')[0];
  
    // Set the value of the input field
    document.getElementById('tglcheckout').value = formattedNextDate;
</script> --}}
{{-- <script>
    function tambah_hari(event) {
    event.preventDefault(); // Prevent the default anchor behavior

    var inputElement = document.getElementById('tglcheckout');
    var inputElement2 = document.getElementById('tglcheckout');
    var daysInput = document.getElementById('jumlahhari');

    // Get the current date from the input value
    var currentDate = new Date(inputElement.value);

    // Get the number of days to add
    var daysToAdd = parseInt(daysInput.value); // You can change this value as needed

    // Add the days to the current date
    currentDate.setDate(currentDate.getDate() + daysToAdd);

    // Format the date as YYYY-MM-DD
    var formattedDate = currentDate.toISOString().split('T')[0];

    // Update the input value with the new date
    inputElement2.value = formattedDate;
    }
</script> --}}