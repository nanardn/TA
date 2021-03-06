@extends('layouts.dashboard')

@section('content')
	@if (Auth::guest())

		<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />

	@else
	<nav>
			<ul>
				<li class="section"><a href="{{ url('/dashboard/showReportPendanaan')}}"> Crowdfunding</a>
				<ul class="submenu">
				<li><a href="{{ url('/dashboard/daftarpenggalangan')}}">Daftar Penggalangan Dana</a></li>
				<li><a href="{{ url('/dashboard/listPenggalangan')}}">List Pendanaan UMKM</a></li>
				<li><a href="{{ url('/dashboard/showReportPendanaan')}}">Laporan Crowdfunding</a></li>
				</ul>
			</li>
				<li><a href="{{ url('/home')}}"> Pendanaan </a></li>
				<ul class="submenu">
				<li><a href="{{ url('/bank/ajukanfundbank')}}">Daftar Penggalangan Dana</a></li>
				<li><a href="{{ url('/dashboard/listPenggalangan')}}">List Pendanaan UMKM</a></li>
				<li><a href="{{ url('/dashboard/showReportPendanaan')}}">Laporan Crowdfunding</a></li>

				<li><a href="{{ url('/dashboard/laporan')}}/{{ Auth::user()->id }}">Laporan</a></li>
				<li><a href="{{ url('/dashboard/pengaturan')}}">Pengaturan</a></li>
			</ul>
			<br/><br/><center><img src="{{URL::to('/')}}../images/logo_white.png "/></center>
		</nav>
	
	<section class="content">
 		<select name="year">
 			@foreach ($years as $year)
 				<option value="{{ $year }}">{{ $year }}</option>
 			@endforeach
 		</select>
 
 	<select name="campaign">
 			@foreach ($campaigns as $k => $v)
 				<option value="{{ $k }}">{{ $v }}</option>
 			@endforeach
 		</select>
 
		<br/>
 
 		<div id="chart"></div>
 	</section>
 
	<section class="content">
		<section class="widget">
			<header>
				<span class="icon">&#128196;</span>
				<hgroup>
					<h1>Buat Laporan Baru</h1>
					
				</hgroup>
			</header>
			<div class="content">
			
				<table id="myTable" border="0" >
			<div class="content" width="100">
				<form action="{{ URL::to('createlaporancrowd') }}" method="post" enctype="multipart/form-data">
					{!! csrf_field() !!}
                    Nama Proyek 	:
					<select name="campaign">
			 			@foreach ($campaigns as $k => $v)
			 				<option value="{{ $k }}">{{ $v }}</option>
			 			@endforeach
			 		</select>
			 		<br/> <br/> <br/>
			 		Bulan 		:
			 		<select name="bulan">
					    <option value="1">Januari</option>
					    <option value="2">Februari</option>
					    <option value="3">Maret</option>
					    <option value="4">April</option>
					    <option value="5">Mei</option>
					    <option value="6">Juni</option>
					    <option value="7">Juli</option>
					    <option value="8">Agustus</option>
					    <option value="9">September</option>
					    <option value="10">Oktober</option>
					    <option value="11">November</option>
					    <option value="12">Desember</option>
					</select>
					<br><br>
					Tahun : 
					<select name="year">
			 			@foreach ($years as $year)
			 				<option value="{{ $year }}">{{ $year }}</option>
			 			@endforeach
			 		</select>
					<br/> <br>
					<button type="submit" class="green">Post</button>
				</form>

			</div>		
			</table>
					
			</div>
		</section>
	</section>
 	
	<section class="content">
		<select name="year">
			@foreach ($years as $year)
				<option value="{{ $year }}">{{ $year }}</option>
			@endforeach
		</select>

		<select name="campaign">
			@foreach ($campaigns as $k => $v)
				<option value="{{ $k }}">{{ $v }}</option>
			@endforeach
		</select>

		<br/>

		<div id="chart"></div>
	</section>

	<section class="content">
		<section class="widget">
			<header>
				<span class="icon">&#128196;</span>
				<hgroup>
					<h1>Pendanaan</h1>
					<h2>Laporan Penggunaan Dana Penggalangan</h2>
				</hgroup>
				
				<button class="button blue"><a href="{{ url('/dashboard/showReportPendanaan')}}">Laporan Baru</a></button>
				
			
			
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
						
							<td><a href="{{ URL::to('/dashboard/detail_laporan_crowdfunding/'.$rc->id_laporan_c)}}"><button>Lihat</button></a></td>
							
						</tr>
						@endforeach
						</tbody>
					</table>
					
			</div>
		</section>
	</section>

	@endif
	
@endsection

@push('scripts')

 
 	<script>
 
 		var chart = $('#chart');
 
 		chart.css({
 			height: 300,
 			width: '100%'
 		});
 
 		var chartOptions = {
 			lines: {
 				show: true
 			},
 			points: {
 				show: true
 			},
 			xaxis: {
 				mode: 'time',
 				timeformat: '%b'
 		}
 		};
 
 		var campaignSelector = $('[name=campaign]'); 		
 		campaignSelector.change(getReport);
 
 		var yearSelector = $('[name=year]');
 		yearSelector.change(getReport);
 		yearSelector.trigger('change');
 
 		function getReport() {
 			$.get('{{ url('api/crowd-report') }}', {
 				campaign: campaignSelector.val(),
 				year: yearSelector.val()
 			}).done(function (data) {
 				$.plot(chart, $.parseJSON(data), chartOptions);
 			});
 		}
 
 	</script>
 
 @endpush


	<script>

		var chart = $('#chart');

		chart.css({
			height: 300,
			width: '100%'
		});

		var chartOptions = {
			lines: {
				show: true
			},
			points: {
				show: true
			},
			xaxis: {
				mode: 'time',
				timeformat: '%b'
			}
		};

		var campaignSelector = $('[name=campaign]');
		campaignSelector.change(getReport);

		var yearSelector = $('[name=year]');
		yearSelector.change(getReport);
		yearSelector.trigger('change');

		function getReport() {
			$.get('{{ url('api/crowd-report') }}', {
				campaign: campaignSelector.val(),
				year: yearSelector.val()
			}).done(function (data) {
				$.plot(chart, $.parseJSON(data), chartOptions);
			});
		}

	</script>

@endpush

