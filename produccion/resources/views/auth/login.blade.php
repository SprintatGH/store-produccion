@extends('layouts.empty', ['paceTop' => true, 'bodyExtraClass' => 'bg-white'])

@section('title', 'Sprintat')

@section('content')
	<!-- begin login -->
	<div class="login login-with-news-feed">
		<!-- begin news-feed -->
		<div class="news-feed">
			<div class="news-image" style="background-image: url(/assets/img/login-bg/fondo.jpg)"></div>
			<div class="news-caption">
				<h4 class="caption-title"><b>Team</b> Store</h4>
				<p>
				    Plataforma de administracion ventas
				</p> 
			</div>
		</div>
		<!-- end news-feed -->
		<!-- begin right-content -->
		<div class="right-content">
			<!-- begin login-header -->
			<div class="login-header">
				<div class="brand">
					<span class="logo"></span> <b>Team</b> Store
					<small>Acceso a la plataforma</small>
				</div>
				<div class="icon">
					<i class="fa fa-sign-in-alt"></i>
				</div>
			</div>
			<!-- end login-header -->
			<!-- begin login-content -->
			<div class="login-content">
				<form method="POST" action="{{ route('login') }}" class="margin-bottom-0">
                        @csrf
					<div class="form-group m-b-15">
						<input id="email" name="email" type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Correo electrónico" required />
					
						@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					<div class="form-group m-b-15">
						<input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required />

						@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					<div class="checkbox checkbox-css m-b-30">
						<input type="checkbox" id="remember_me_checkbox" value="" />
						<label for="remember_me_checkbox">
						Recuérdame
						</label>
					</div>
					<div class="login-buttons">
						<button type="submit" class="btn btn-success btn-block btn-lg">Acceder</button>
					</div>
					<!--<div class="m-t-20 m-b-40 p-b-40 text-inverse">
						Not a member yet? Click <a href="register_v3.html">here</a> to register.
					</div>-->
					<hr />
					<p class="text-center text-grey-darker mb-0">
						&copy; SPRINTAT Todos los derechos reservados - 2020
					</p>
				</form>
			</div>
			<!-- end login-content -->
		</div>
		<!-- end right-container -->
	</div>
	<!-- end login -->
@endsection
