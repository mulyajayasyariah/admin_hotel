<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" >
        <meta http-equiv="X-UA-Compatible" content="ie=edge" >
        <meta name="csrf-token" content="{{ csrf_token()}}" >
        <style>
            table.static{
                position: relative;
                /* left: 3%; */
                border: 1px solid #543535;
            }
        </style>
        <title>CETAK LAPORAN PENGELUARAN</title>
    </head>
    <body>
        <div class="form-group">
            <p align="center"><b>Laporan Pengeluaran</b></p>
            <table class="static" align="center" rules="all" border="1px" style="widht: 95%;">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Kategori</th>
                    <th>Keterangan</th>
                    <th>Total</th>
                </tr>
                @foreach ($dtcetakpengeluaran as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ date('d-m-Y',strtotime($item->tgl)) }}</td>
                        <td>{{ $item->Kategori_Pengeluaran->nama }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>{{ $item->total }}</td>
                    </tr>
                @endforeach

            </table>
        </div>
        <script type="text/javascript">
            window.print()
        </script>
    </body>
</html>
