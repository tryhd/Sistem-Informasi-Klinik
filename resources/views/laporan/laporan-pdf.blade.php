<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <title>Laporan Kegiatan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
	<style type="text/css">
		table {
			border-collapse: collapse;
        width: 100%;
        padding: 10px 10px;
		}
        .table th {
        padding: 8px 8px;
        border:1px solid #000000;
        text-align: center;
         }
        .table td {
            padding: 3px 3px;
            border:1px solid #000000;
            text-align: center;
        }

        .text-center {
            text-align: center;
        }
        img {
        position: left;
        width: 50px;
        }
		table tr .text2 {
			text-align: right;
			font-size: 13px;
		}
        table tr .text3 {
			text-align: left;
			font-size: 13px;
		}
		table tr .text {
			text-align: center;
			font-size: 13px;
		}
		table tr td {
			font-size: 13px;
		}

	</style>
</head>
<body>
	<center>
		<table>
			<tr>
				<td>
				<center>
                    @php
                        $start = date("d F Y", strtotime($mulai));
                        $end = date("d F Y", strtotime($akhir));
                        @endphp
					<font size="4"><b> TRANSAKSI</b></font><br>
					<font size="5"><b>KLINIK TEST INOVA MEDIKA</b></font><br>
                    <font size="3">Periode {{ $start }} sampai dengan {{ $end }}</font><br>
					<font size="2"><i>Metro Indah Mall Jl. Soekarno Hatta Blok F 20, Sekejati, Kec. Buahbatu, Kota Bandung, Jawa Barat 40286, Indonesia</i></font>
				</center>
            </td>
			</tr>

            <tr>
				<td colspan="2"><hr></td>
			</tr>

		</table>
		<br>
		<table class="table table-bordered table-striped">
        <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Tindakan</th>
                    <th>Obat</th>
                    <th>Tagihan</th>
                    <th>Tanggal Transaksi</th>
                </tr>
                </thead>
                <tbody>
                @php
                $no= 1;
                @endphp
                @foreach ($search as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                        <td>{{ $row->medis->pasien->nama }}</td>
                        <td>{{ $row->medis->tindakan->jenis_tindakan }}</td>
                        <td>{{ $row->resep->obat->nama }}</td>
                        @php
                        $price="Rp ".number_format($row->tagihan,2,',','.');
                        @endphp
                        <td>{{ $price }}</td>
                        @php
                        $newDate = date("d F Y", strtotime($row->created_at));
                        @endphp
                        <td>{{ $newDate }}</td>
                </tr>
                @endforeach
                </tbody>
		</table>
		</center>
</body>
</html>
