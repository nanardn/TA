
@extends('layouts.dashboard')

@section('content')
	@if (Auth::guest())

		<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />

	@else
	
		<br><br>
		<section class="widget">
			<header>
				<span class="icon">&#128196;</span>
				<hgroup>
					<h1>Submit Laporan Usaha</h1>
					<h2>Data di Input per hari</h2>
				</hgroup>
			</header>
			<div class="content">
			<table id="myTable" border="0" >
			<div class="content" width="100">
				<form action="#" method="post" enctype="multipart/form-data">
					{!! csrf_field() !!}

					<input type="hidden" value="0" name="sementara_dana">
                    <input type="hidden" value="0" name="status">
              

					<div class="field-wrap">
						<input type="text" name="transaksi" placeholder="Transaksi" />
					</div>

					Tanggal Transaksi : <br>
					<input type="date" name="tgl_transaksi" id="tgl_transaksi">

					
					Kategori : 
					<select name="kategori">
					    <option value="Pemasukan">Pemasukan</option>
					    <option value="Pengeluaran">Pengeluaran</option>
					</select>
					<br><br>

					<div class="field-wrap">
						<input type="text" name="jumlah_transaksi" placeholder="Total Dana Yang Dibutuhkan"/>
						
					</div>
					
					<button type="submit" class="green">Post</button>
				</form>
			</div>
			</table>
			</div>
		</section>
		<br><br>
		<section class="widget">
			<header>
				<span class="icon">&#128196;</span>
				<hgroup>
					<h1>Data Transaksi Harian Pemanfaatan Dana Penggalangan</h1>
					<h2>Data di input per hari</h2>
				</hgroup>
			</header>
			<div class="content">
				<table id="myTable" border="0" width="100">
					<thead>
						<tr>
							<th>Nama Transaksi</th>
							<th>Total Pengeluaran</th>
							<th>Total Pemasukan </th>
							<th>Saldo Proyek</th>
							<th>Jumlah Uang</th>
							<th>Tanggal Transaksi</th>
							
						</tr>
					</thead>
					<tbody>
						
						</tbody>
					</table>
			</div>
		</section>
	
	@endif
	
@endsection

