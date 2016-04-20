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
		<div class="widget-container">
			<section class="widget small">
				<header>
					<span class="icon">&#59168;</span>
					<hgroup>
						<h1>Ganti Password</h1>
						<h2>Silahkan Ganti Password Anda Disini</h2>
					</hgroup>
				</header>
				<div class="content no-padding timeline">
					<div class="content">
						<div class="field-wrap">
							Password Lama : <br/><br/>
							<input type="password" value="passlama"/>
						</div>
						<div class="field-wrap">
							Password Baru : <br/><br/>
							<input type="password" value="passbaru"/>
						</div>
						<div class="field-wrap">
							Password Baru : <br/><br/>
							<input type="password" value="konfirmasipassbaru"/>
						</div>
							<button type="submit" class="green">Simpan</button>
					</div>
				</div>
			</section>
			
			<section class="widget small">
				<header> 
					<span class="icon">&#128362;</span>
					<hgroup>
						<h1>Ganti Foto Profile</h1>
						<h2>Disarankan Ukuran 200 x 200</h2>
					</hgroup>
				</header>
				<div class="content no-padding timeline">
					<div class="content">
						
						<div class="profile-img">
							<center><p><img src="{{URL::to('dashboard/images/fotoprofile')}}/{{ Auth::user()->url_foto }}" alt="" height="150" width="150" /></p></center>
						</div>

						<form action="{{ URL::to('uploadfoto') }}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <input type="hidden" value="{{ Auth::user()->id }}" name="id_usergambar">

							<div class="field-wrap">
								<input type="file" name="filefoto" id="filefoto">
							</div>
							<button type="submit" value="Upload" name="submit" class="green">Update Foto</button>
						</form> 
					</div>
				</div>
			</section>
		</div>
	</section>

	@endif
		
@endsection

