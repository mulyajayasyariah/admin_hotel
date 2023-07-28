@extends('layouts.app')
@section('title','Form Checkin')

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
        <div class="container-fluid form-group row">
            {{-- <form action="{{ route('checkin.tambah.sementara') }}" method="POST">
            {{ csrf_field() }} --}}
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-4">
                        <label class="col-form-label" for="notransaksi">No Transaksi</label>
                        <br>
                        <input class="form-control" style="width: 235px; height: 35px;" type="text" name="notransaksi"
                            id="notransaksi" value="{{ $notransaksi }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="col-form-label" for="noktp" reqired>No Ktp/SIM/Passport</label>
                        <br>
                        <input class="form-control" style="width: 250px; height: 35px;" name="noktp" id="noktp"
                            required>
                    </div>
                    <div class="col-md-4">
                        <label class="col-form-label" for="total">Harga Sewa/Hari</label>
                        <br>
                        @if($datasudahbooking==null)
                            <input class="form-control" style="width: 194px; height: 35px;" type="number" name="total"
                                id="total" required>
                        @else
                            <input class="form-control" style="width: 194px; height: 35px;" type="number" name="total"
                                    id="total" value="{{ $datasudahbooking->subtotal }}" required>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="nokamar">Kamar</label>
                        <br>
                        <input class="form-control" style="width: 70px; height: 35px;" type="number" name="nokamar"
                            id="nokamar" value="{{$id}}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="nama">Nama</label>
                        <br>
                        <div class="input-group">
                            @if($datasudahbooking==null)
                                <input type="text" id="nama" name="nama" class="form-control border-1 small">
                            @else
                                <input type="text" id="nama" name="nama" class="form-control border-1 small" value="{{ $datasudahbooking->nama }}">
                            @endif
                            <div class="input-group-append">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#cari_tamu">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                        {{-- <input class="form-control" style="width: 194px; height: 35px;" type="text" name="nama" id="nama" required> --}}
                    </div>
                    <div class="col-md-4">
                        <label for="diskon">Diskon</label>
                        <br>
                        @if($datasudahbooking==null)
                            <input class="form-control" style="width: 194px; height: 35px;" type="number" name="diskon"
                                id="diskon">
                        @else
                            <input class="form-control" style="width: 194px; height: 35px;" type="number" name="diskon"
                                id="diskon" value="{{ $datasudahbooking->diskon }}">
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label class="col-form-label" for="jenis_kamar">Jenis Kamar</label>
                        <br>
                        <input class="form-control" style="width: 194px; height: 35px;" type="text" name="jenis_kamar"
                            id="jenis_kamar" value="{{ $dtaturkat->Kategori_Kamar->jenis_kamar }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="alamat">Alamat</label>
                        <br>
                        <textarea class="form-control" type="text" name="alamat" id="alamat" cols="25" rows="1"></textarea required>
                        </div>
                        <div class="col-md-4">
                            <label for="deposit">Deposit/DP</label>
                            <br>
                            @if($datasudahbooking==null)
                                <input class="form-control" style="width: 194px; height: 35px;" type="number" name="deposit" 
                                    id="deposit" readonly>
                            @else
                                <input class="form-control" style="width: 194px; height: 35px;" type="number" name="deposit" 
                                    id="deposit" value="{{ $totalsemuadeposit }}" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="id_kategori_transaksi">Kategori Transaksi</label>
                            <br>
                            @if($datasudahbooking==null)
                                <select onchange="ambilharga()" class="form-control" style="width: 194px; height: 35px;" name="id_kategori_transaksi"
                                    id="id_kategori_transaksi">
                                    <option disable value >--Pilih Kategori--</option>
                                    @foreach ($dtkattrans as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_transaksi }}</option>
                                    @endforeach
                                </select>
                            @else
                                <select class="form-control" style="width: 194px; height: 35px;" name="id_kategori_transaksi"
                                    id="id_kategori_transaksi" value="{{ $datasudahbooking->id_kategori_transaksi }}">
                                        <option value="{{ $datasudahbooking->id_kategori_transaksi }}" >{{ $datasudahbooking->Kategori_Transaksi->nama_transaksi }}</option>
                                </select>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label for="nohp">No HP</label>
                            <br>
                            @if($datasudahbooking==null)
                                <input class="form-control" style="width: 194px; height: 35px;" type="number" name="nohp" id="nohp" required>
                            @else
                                <input class="form-control" style="width: 194px; height: 35px;" type="number" name="nohp" id="nohp" value="{{ $datasudahbooking->nohp }}" required>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label for="tambahan">Tambahan</label>
                            <br>
                            <div class="input-group">
                                <input style="width: 194px; height: 35px;" 
                                type="number" name="tambahan" id="tambahan" class="border-1 small" readonly>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" data-toggle="modal" id="datatambahan"
                                        data-target="#ModalTambahan">
                                        <i class="fas fa-eye fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="tglbooking">Tanggal Booking</label>
                            <br>
                            @if($datasudahbooking==null)
                                <input class="form-control" style="width: 194px; height: 35px;" type="date" name="tglbooking" id="tglbooking" value="{{  date('Y-m-d', time())}}">
                            @else
                                <input class="form-control" style="width: 194px; height: 35px;" type="date" name="tglbooking" id="tglbooking" value="{{ $datasudahbooking->booking }}">
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label for="jmlhorang">Jumlah Orang</label>
                            <br>
                            <input class="form-control" style="width: 194px; height: 35px;" type="number" name="jmlhorang" id="jmlhorang" required>
                        </div>
                        <div class="col-md-4">
                            <label for="grandtotal">Grand Total</label>
                            <br>
                            <input type="hidden" class="form-control" style="width: 194px; height: 35px;" type="number" name="grandtotal" id="grandtotal">
                            @if($datasudahbooking==null)
                                <input class="form-control" style="width: 194px; height: 35px;" type="number" name="totalsemuanyatransaksi" id="totalsemuanyatransaksi" readonly>
                            @else
                                <input class="form-control" style="width: 194px; height: 35px;" type="number" name="totalsemuanyatransaksi" id="totalsemuanyatransaksi" value="{{ $grandtotal }}" readonly>
                            @endif
                        </div>
                    </div> 
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="tglcheckin">Tanggal Check In</label>
                            <br>
                            @if($datasudahbooking==null)
                                <input class="form-control" style="width: 194px; height: 35px;" type="date" 
                                    name="tglcheckin" id="tglcheckin" value="{{  date('Y-m-d', time())}}">
                            @else
                                <input class="form-control" style="width: 194px; height: 35px;" type="date" 
                                    name="tglcheckin" id="tglcheckin" value="{{$datasudahbooking->checkin}}">
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label for="jenistamu">Tamu</label> 
                            <br>
                            <select class="form-control" style="width: 194px; height: 35px;" name="jenistamu" id="jenistamu" required>
                                <option value="Laki-laki" selected="selected">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                                <option value="Menikah" >Menikah</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="id_metodebayar">Metode Pembayaran</label>
                            <br>
                            @if($datasudahbooking==null)
                                <select class="form-control" style="width: 194px; height: 35px;" name="id_metodebayar"
                                    id="id_metodebayar">
                                    <option disable value >--Pilih Kategori--</option>
                                    @foreach ($dtmetbayar as $item)
                                        <option value="{{ $item->id }}" >{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            @else
                                <select class="form-control" style="width: 194px; height: 35px;" name="id_metodebayar"
                                    id="id_metodebayar" value="{{ $datasudahbooking->id_metodebayar }}">
                                    <option value="{{ $datasudahbooking->id_metodebayar }}" >{{$datasudahbooking->metodebayar->nama}}</option>
                                </select>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="tglcheckout">Tanggal Check Out</label>
                            <br>
                            @if($datasudahbooking==null)
                                <input class="form-control mb-3" style="width: 194px; height: 35px;" type="date" name="tglcheckout" id="tglcheckout" readonly>
                            @else
                                <input class="form-control mb-3" style="width: 194px; height: 35px;" type="date" name="tglcheckout" id="tglcheckout" value="{{ $tglcheckout->checkout }}" readonly>
                            @endif
                            <label for="keterangan">Keterangan</label>
                            <br>
                            <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="2"></textarea>
                        </div>
                        <div class="col-md-4">
                            @if($datasudahbooking!=null)
                                <label style="color: red;" class="fas fa-pull-right">*Jika Reservasi Update !</label>
                                <input type="hidden" id="id_booking" name="id_booking" value="{{ $datasudahbooking->id_booking }}">
                            @endif
                            <h5>Tombol tambah hari</h5>
                            {{-- Tombol Kurang Hari --}}
                            <a href="#" onclick="kurang_hari()" style="width: 65px; height: 50px;background-color:red;margin: 10px;" class="btn btn-primary" 
                            id="kuranghari" name="kuranghari"><i style="font-size: 25px"><strong>-</strong></i></a>
                            
                            {{-- Input Hari --}}
                            <input type="hidden" type="number" id="jumlahhari" value="1">

                            {{-- Tombol Tambah Hari --}}
                            <a href="#" onclick="tambah_hari()" style="width: 65px; height: 50px;
                            background-color:green" class="btn btn-primary" id="tambahhari" name="tambahhari">
                            <i style="font-size: 25px"><strong>+</strong></i></a>
                            @if($datasudahbooking!=null)
                                <button onclick="update_data_reservasi()" class="btn btn-outline-danger fa-pull-right" id="tombol_update_detail"><i class="fa fa-fw fa-upload"></i>Update</button>
                            @endif
                            <br>
                            <button type="button" id="lihat_data_transaksi" class="btn btn-outline-info">Lihat Detail Checkin</button>
                            <input type="hidden" type="number" name="id_kategori_kamar" id="id_kategori_kamar"
                                value="{{ $dtaturkat->id_kategori_kamar }}">
                            <input type="hidden" type="date" id="tglnext" name="tglnext">
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xl font-weight-bold text-primary text-uppercase mb-1">
                                                Total Hari Menginap</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                @if($datasudahbooking==null)
                                                    <input type="number" style="width: 75px; height: 55px; font-size:35px;"
                                                        class="border-0" id="total-menginap" name="total-menginap" readonly></div>
                                                @else
                                                    <input type="number" style="width: 75px; height: 55px; font-size:35px;"
                                                        class="border-0" id="total-menginap" name="total-menginap" value="{{ $jumlahhari }}" readonly></div>
                                                @endif
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            @if($datasudahbooking==null)
                                <label for="harusdibayar">Yang Masih Harus Dibayar</label>
                                <input style="font-size: 45px; width: 225px; height: 55px; 
                                    border:0 ;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;" 
                                    type="text" id="dengan-rupiah" name="dengan-rupiah" readonly>
                            @else
                                <label for="harusdibayar">Yang Masih Harus Dibayar</label>
                                    <input style="font-size: 45px; width: 225px; height: 55px; 
                                        border:0 ;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;" 
                                        type="text" id="dengan-rupiah" name="dengan-rupiah" value="{{ number_format($totalsemuaharus) }}" readonly>
                            @endif
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>
                </div>
            {{-- </form> --}}
        </div>
        <div class="card-footer">
            <a href="#" onclick="aksi_checkin_simpan()" class="btn btn-success fa-pull-right">CHECK IN</a>
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
                                    <td>Jumlah Tamu</td>
                                </tr>
                            </thead>
                            <tbody id="modalbody_detail_checkin">
                                @if($datasudahbooking!=null)
                                    @foreach ($carisemua as $item)
                                        <tr>
                                            <td>{{ $item->checkin }}</td>
                                            <td>{{ $item->checkout }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td id="detailjumlahtamu"></td>
                                        </tr>                                        
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Tambahan-->
<div class="modal fade bd-example-modal-lg" id="ModalTambahan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Tambahan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="datamodal">
                <div class="modal-body pb-0 pt-0" data-keyboard="false" data-backdrop="static">
                    <div class="row">
                            <div class="col-md-6 border-right">
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="id_kategori">Kategori Tambahan</label>
                                            <br>
                                            <select class="form-control" style="width: 194px; height: 35px;"
                                                name="id_kategori" id="id_kategori" required>
                                                <option disable value>--Pilih Kategori--</option>
                                                @foreach ($datakattambahan as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="jumlah">Jumlah <span class="text-danger">*</span></label>
                                            <br>
                                            <input class="form-control" onkeyup="ambilharga_tambahan()" type="number" id="jumlah" name="jumlah" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="keterangan_tambahan">Keterangan</label>
                                            <br>
                                            <input class="form-control" type="text" id="keterangan_tambahan" name="keterangan_tambahan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="total_tambahan">Total</label>
                                            <br>
                                            <input class="form-control" type="number" id="total_tambahan" name="total_tambahan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <button type="button" onclick="tambah_tambahan()" class="btn btn-primary">
                                                Input
                                            </button>
                                            {{-- <a href="" onclick="tambah_tambahan()" class="btn btn-primary">Input</a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-6">
                            <h4>Data Yang Sudah di Tambahkan</h4>
                            <div class="modal-body table-responsive">
                                <table class="table table-bordered table-striped" id="tabletamu1">
                                    <thead>
                                        <tr>
                                            <th>Kategori Tambahan</th>
                                            <th>Keterangan</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="modalbody_detail_tambahan">
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3"><strong>Total</strong></td>
                                            <td colspan="2" id="sum_tambahan"><strong></strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <button type="button" class="btn btn-outline-success fa-pull-right mr-3" onclick="transfernominal()" 
                                data-dismiss="modal">Simpan</button>
                            {{-- <a href="" class="btn btn-outline-success fa-pull-right mr-3">Simpan</a> --}}
                        </div>
                    </div>
                </div>
            </form>
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
        $('#table').DataTable( {
        } );
    } );
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
    function update_data_reservasi(){
        var id_transaksi = $('#notransaksi').val();
        var statustamu = $('#jenistamu').val();
        var jumlahtamu = $('#jmlhorang').val();
        var detailjumtamu = document.getElementById('detailjumlahtamu');
        $.ajax({
            url: "{{ route('checkin.update_data_reservasi') }}",
            type: "GET",
            data: {
                _token: "{{ csrf_token() }}",
                "id_transaksi": id_transaksi,
                "statustamu": statustamu,
                "jumlahtamu": jumlahtamu,
            },
            success: function(response) {
                detailjumtamu.textContent =jumlahtamu;
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1500
                });
                
            },
            error: function(xhr) {
                Swal.fire({
                        title: 'Data Tidak Boleh Kosong',
                        text: xhr.message,
                        icon: 'warning',
                    });
            }
        });
    }
</script>
<script>
    function transfernominal(){
        var tfoot = document.getElementById('sum_tambahan');
        semuanya_tambahan = tfoot.textContent;
        $('#tambahan').val(semuanya_tambahan);
        // $('#ModalTambahan').modal('hide');
    }
</script>
<script>
    function tambah_tambahan(){
        var id_transaksi_kamar = $('#notransaksi').val();
        var id_kategori_tambahan = $('#id_kategori').val();
        var jumlah = $('#jumlah').val();
        var keterangan_tambahan = $('#keterangan_tambahan').val();
        var total_tambahan = $('#total_tambahan').val();
        // alert(total_tambahan);
        $.ajax({
            url: "{{ route('tambah_sementara_tambahan') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    "id_transaksi" : id_transaksi_kamar,
                    "id_kategori_tambahan" : id_kategori_tambahan,
                    "jumlah" : jumlah,
                    "keterangan_tambahan" : keterangan_tambahan,
                    "total_tambahan" : total_tambahan,
                },

                //Relasi DB dan Respon JSON
                success: function (response){
                    let kategori_tambahan_fix = response.id_kategori_tambahan;
                    let semuatotal = response.total_semua_tambahan;
                    // console.log(kategori_tambahan_fix);
                    var row = '<tr id="row-' + response.id + '">' +
                                '<td>' +  response.id_kategori_tambahan + '</td>' +
                                '<td>' + response.keterangan  + '</td>' +
                                '<td>' + response.jumlah  + '</td>' +
                                '<td>' + response.total  + '</td>' +
                                '<td><a href= "#" onclick="deleteRow(' + response.id + ')">' +
                                '<i class="fas fa-trash-alt"></i></a></td>' +    
                            '</tr>';
                    $('#modalbody_detail_tambahan').append(row);
                    var tfoot = document.getElementById('sum_tambahan');
                    tfoot.textContent = semuatotal;
                },
                error: function(data){
                    Swal.fire({
                        title: 'Tambah Tambahan',
                        text: 'EROR',
                        icon: 'warning',
                    });
                },
        });
    }
</script>
<script>
    function deleteRow(id){
        var idrow = id;
        // alert(idrow);
            $.ajax({
                url: "{{ route('kurang_sementara_tambahan') }}",
                // url: "{{ url('kurang_sementara_tambahan') }}/"+id,
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    "id" : idrow,
                },
                success: function (response){
                    let semuatotal = response.total_semua_tambahan;
                    if (response.success) {
                            // Remove the row from the table
                            $('#row-' + id).remove();
                            // alert('Data deleted successfully');
                        }
                    var tfoot = document.getElementById('sum_tambahan');
                    tfoot.textContent = semuatotal;
                },
                error: function(xhr){
                    Swal.fire({
                        title: 'Kurang Tambahan',
                        text: xhr.responseText,
                        icon: 'warning',
                    });
                },
            });
    }
</script>
<script>
    // Function FIX
    function tambah_hari() {
        event.preventDefault(); // Prevent the default anchor behavior
        
        var inputElement = document.getElementById('tglcheckout');
        var inputElement2 = document.getElementById('tglcheckout');
        var tanggallanjutan = document.getElementById('tglnext');
        var daysInput = document.getElementById('jumlahhari');
        
        //input tabel sementara
        var jenistransaksi = $('#jenis_kamar').val();
        var id_transaksi = $('#notransaksi').val();
        var booking = $('#tglbooking').val();
        var checkin = $('#tglcheckin').val();
        // var checkout = $('#tglcheckout').val();
        var no_kamar = $('#nokamar').val();
        var nama = $('#nama').val();
        var statustamu = $('#jenistamu').val();
        var id_kategori_transaksi = $('#id_kategori_transaksi').val();
        var id_kategori_kamar = $('#id_kategori_kamar').val();
        var jumlahtamu = $('#jmlhorang').val();
        var hargakamar = $('#total').val();
        var deposit = $('#deposit').val();
        var diskon = $('#diskon').val();
        var keterangan = $('#keterangan').val();
        var grandtotal = $('#grandtotal').val();
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
            
            // alert(id_kategori_kamar);
            $.ajax({
                url: "{{ route('checkin.tambah.sementara') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    "id_transaksi" : id_transaksi,
                    "booking" : booking,
                    "checkin" : checkin,
                    "checkout" : formattedNextDate,
                    "id_nokamar" : no_kamar,
                    "nama" : nama,
                    "statustamu" : statustamu,
                    "id_kategori_transaksi" :id_kategori_transaksi,
                    "id_kategori_kamar" : id_kategori_kamar,
                    "jumlahtamu" : jumlahtamu,
                    "hargakamar": hargakamar,
                    "deposit" : deposit,
                    "diskon" : diskon,
                    "keterangan" : keterangan,
                    "grandtotal" : grandtotal,
                },
                success: function (data){
                // console.log(data);
                var diffInMs = new Date(formattedNextDate).getTime() - new Date(checkin).getTime();
                var diffInDays = Math.floor(diffInMs / (1000 * 60 * 60 * 24));
                var diffAsNumber = Number(diffInDays);
                // alert(diffAsNumber);
                $('#total-menginap').val(diffAsNumber);
                    var row = '<tr id="row_' + data.id + '">' +
                                '<td>' +  data.checkin + '</td>' +
                                '<td>' + data.checkout  + '</td>' +
                                '<td>' + data.nama  + '</td>' +
                                '<td>' + data.jumlahtamu  + '</td>' +
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
            
            // Update the input value with the new date
            inputElement2.value = formattedDate;

            $.ajax({
                url: "{{ route('checkin.tambah.sementara') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    "id_transaksi" : id_transaksi,
                    "booking" : booking,
                    "checkin" : tanggallanjutan,
                    "checkout" : formattedDate,
                    "id_nokamar" : no_kamar,
                    "nama" : nama,
                    "statustamu" : statustamu,
                    "id_kategori_transaksi" :id_kategori_transaksi,
                    "id_kategori_kamar" : id_kategori_kamar,
                    "jumlahtamu" : jumlahtamu,
                    "hargakamar": hargakamar,
                    "deposit" : deposit,
                    "diskon" : diskon,
                    "keterangan" : keterangan,
                    "grandtotal" : grandtotal,
                },
                success: function (data){
                // alert(data.row.harga);
                var diffInMs = new Date(formattedDate).getTime() - new Date(checkin).getTime();
                var diffInDays = Math.floor(diffInMs / (1000 * 60 * 60 * 24));
                var diffAsNumber = Number(diffInDays);
                // alert(diffAsNumber);

                $('#total-menginap').val(diffAsNumber);
                    var row = '<tr id="row_' + data.id + '">' +
                                '<td>' +  data.checkin + '</td>' +
                                '<td>' + data.checkout  + '</td>' +
                                '<td>' + data.nama  + '</td>' +
                                '<td>' + data.jumlahtamu  + '</td>' +
                            '</tr>';
                    $('#modalbody_detail_checkin').append(row);
                },
                error: function(data){
                    Swal.fire({
                        title: 'Tambah Hari',
                        text: data.error,
                        icon: 'warning',
                    });
                },
            });
        }
    }
</script>
<script>
    function kurang_hari(){
        var lastRow = $('#transaksi_sementara tbody tr:last');
        var tglcheckout = document.getElementById('tglcheckout');
        var hasilkuranghari = document.getElementById('total-menginap');
        // var hasilpanjang = lastRow.length;
        
        // alert('Berahasil Masuk Function');
        $.ajax({
            url: "{{ route('kurang.sementara') }}",
            type: "GET",
            data: {
                _token: "{{ csrf_token() }}",
                // lastRow = hasilpanjang,
            },
            success: function(response) {
                    // Clear existing table rows
                    // alert('Sukses Hapus');
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
            } else {
                // No rows to delete
                alert('Tidak Ada Data!');
            }
            },
            error: function(xhr) {
                console.log(xhr.responseText); // Handle the error appropriately
            }
        });
    };
</script>
<script>
    function aksi_checkin_simpan(){
        var noktp = $('#noktp').val();
        var alamat = $('#alamat').val();
        var no_kamar = $('#nokamar').val();
        var id_transaksi = $('#notransaksi').val();
        var nama = $('#nama').val();
        var nohp = $('#nohp').val();
        var id_kategori_transaksi = $('#id_kategori_transaksi').val();
        var jumlahtamu = $('#jmlhorang').val();
        var statustamu = $('#jenistamu').val();
        var id_metodebayar = $('#id_metodebayar').val();
        var id_booking = $('#id_booking').val();
        // alert(id_metodebayar);
        // if()
        $.ajax({
            url: "{{ route('checkin.simpan.data') }}",
            type: "POST",
            dataType: 'json',
            data: {
                _token: "{{ csrf_token() }}",
                "nokamar": no_kamar,
                "notransaksi": id_transaksi,
                "noktp": noktp,
                "nama":nama,
                "alamat":alamat,
                "nohp":nohp,
                "id_kategori_transaksi":id_kategori_transaksi,
                "jmlhorang":jumlahtamu,
                "jenistamu":statustamu,
                "metodebayar": id_metodebayar,
                "id_booking": id_booking,
                // lastRow = hasilpanjang,
            },
            success: function(response) {
                    // Clear existing table rows
                    // alert('Sukses Hapus');
                    if (response.success) {
                        // alert(response.message);
                        window.location.href = response.redirect;
                        Swal.fire({
                            title: 'CHECK IN',
                            text: response.message,
                            icon: 'Succes',
                            // showConfirmButton: false,
                            timer: 1500,
                        });
                    }
            },
            error: function(xhr) {
                if (xhr.success) {
                        // alert(response.message);
                        window.location.href = xhr.redirect;
                        Swal.fire({
                            title: 'CHECK IN',
                            text: response.message,
                            icon: 'Warning',
                            // showConfirmButton: false,
                            timer: 3450,
                        });
                    }
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
        $('#noktp').val(nik);
        $('#nama').val(nama);
        $('#alamat').val(alamat);
        $('#nohp').val(no_hp);
        });
    });
</script>
<script>
    function hitung_grand_total(){
        let harga_dasar = $('#total').val();
        let total_hari = $('#jumlahhari').val();
        let diskon = $('#diskon').val();
        let dp = $('#deposit').val();
        let tambahan = $('#tambahan').val();
        
        $('#grandtotal').val(
            (parseInt(harga_dasar)*parseInt(total_hari))-parseInt(diskon)-parseInt(dp)+parseInt(tambahan)
        );
    };
</script>
<script>
    function ambilharga_tambahan(){
        let id_kategori_tambahan = $('#id_kategori').val();
        let jumlah = $('#jumlah').val();
        // alert(id_kategori_kamar);
        $.ajax({
            url: "{{ route('ambilhargatambahan') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                "id_kategori_tambahan": id_kategori_tambahan,
            },
            success: function (data){
                // console.log(data);
                let harga = data.row.harga;
                // alert(harga);
                $('#total_tambahan').val(
                    (parseInt(harga)*parseInt(jumlah))
                    );
            },
            error: function(xhr) {
                    console.log(xhr.responseText); // Handle the error appropriately
                }
        });
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
    var acuan = document.getElementById('harusdibayar');
    var target = document.getElementById('dengan-rupiah');
    var dengan_rupiah = document.getElementById('deposit');
    // dengan_rupiah.addEventListener('keyup', function(e)
    // {
    //     target.value = formatRupiah(acuan.value, 'Rp. ');
    // });
    
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