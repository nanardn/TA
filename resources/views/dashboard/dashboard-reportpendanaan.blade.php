@extends('layouts.dashboard')

@section('content')
	@if (Auth::guest())

		<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />

	@else
	<nav>
			<ul>
				<li class="section"><a href="{{ url('/dashboard/home')}}"> Crowdfunding</a>
				<ul class="submenu">
				<li><a href="{{ url('/dashboard/daftarpenggalangan')}}">Daftar Penggalangan Dana</a></li>
				<li><a href="{{ url('/dashboard/listPenggalangan')}}">List Pendanaan UMKM</a></li>
				<li><a href="{{ url('/dashboard/showReportPendanaan')}}">Laporan Crowdfunding</a></li>

				<li><a href="#">Ganti Password</a></li>
				</ul>
			</li>
				<li><a href="{{ url('/dashboard/pendanaan')}}/{{ Auth::user()->id }}"> Pendanaan</a></li>
				<li><a href="{{ url('/dashboard/laporan')}}/{{ Auth::user()->id }}">Laporan</a></li>
				<li><a href="{{ url('/dashboard/pengaturan')}}">Pengaturan</a></li>
			</ul>
			<br/><br/><center><img src="{{URL::to('/')}}../images/logo_white.png "/></center>
		</nav>

	<section class="content">
		<section class="widget">
			<header>
				<span class="icon">&#128196;</span>
				<hgroup>
					<h1>Pendanaan</h1>
					<h2>Laporan Penggunaan Dana Penggalangan</h2>
				</hgroup>
				
				<button class="button blue"><a href="">Laporan Baru</a></button>
				
			
			
			</header>
			<div class="content">
			
				<table id="myTable" border="0" width="100">
					<thead>
						<tr>
							<th>Nama Proyek</th>
							<th>Bulan</th>
							<th>Tahun</th>
							<th>Total Pengeluaran</th>
							<th>Total Pemasukan </th>
							<th>Saldo Proyek</th>
							<th>Action</th>
						</tr>
					</thead>
						<tbody>
						@foreach($reportCrowd as $rc)		
						
						<tr>
							<td>{{$rc->nama_proyek}}</td>
							<td>{{$rc->bulan}}</td>
							<td>{{$rc->tahun}}</td>
							<td>{{$rc->total_pengeluaran}}</td>
							<td>{{$rc->total_pemasukan}}</td>
							<td>{{$rc->saldo_usaha}}
							</td>
							<td><a href="{{ URL::to('/detailReportCrowd') }}"><button>Lihat</button></a></td>
							
						</tr>
						@endforeach
						</tbody>
					</table>
					
			</div>
		</section>
	</section>

	@endif
	
@endsection

