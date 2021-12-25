@extends('layouts.main')

@section('content')
	<section id="page" class="header-margin">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">

					<h1 class="text-center">Login To Your Account</h1>
					<p class="text-center">New User? <a href="{{ route('register') }}">Signup Here</a></p>
					@if(Session::has('flash_message'))
						<div class="alert alert-success">
							{!! Session::get('flash_message') !!}
						</div>
					@endif
					<div class="row">
						<div class="col-md-6">
							<div class="grey-login-bg">
								<p>
									<a class="loginBtn loginBtn--facebook" href="{{ url('/auth/facebook') }}"> Login with Facebook </a></p>
								<p>
									<a class="loginBtn loginBtn--google" href="{{ url('/auth/google') }}"> Login with Google </a>
								</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="auth-wrapper">

								@if(Session::has('flash_message'))
									<div class="alert alert-success">
										{!! Session::get('flash_message') !!}
									</div>
								@endif
								<form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
									{{ csrf_field() }}

									<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">


										<div class="">
											<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address" required autofocus>

											@if ($errors->has('email'))
												<span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
											@endif
										</div>
									</div>

									<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">


										<div class="">
											<input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

											@if ($errors->has('password'))
												<span class="help-block">
                                        		<strong>{{ $errors->first('password') }}</strong>
                                    		</span>
											@endif
										</div>
									</div>

									<div class="form-group">
										<div class="">
											<div class="checkbox">
												<label> <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me </label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="text-center">
											<button type="submit" class="btn btn-primary">
												Login With Email
											</button>


										</div>
										<div class="text-center">
											<a class="btn btn-link" href="{{ route('password.request') }}"> Forgot Your Password? </a>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>

					{{--<div class="panel panel-default">--}}
					{{--<div class="panel-heading">Login</div>--}}
					{{--<div class="panel-body">--}}
					{{--@if(Session::has('flash_message'))--}}
					{{--<div class="alert alert-success">--}}
					{{--{{ Session::get('flash_message') }}--}}
					{{--</div>--}}
					{{--@endif--}}
					{{--<form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">--}}
					{{--{{ csrf_field() }}--}}

					{{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
					{{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

					{{--<div class="col-md-6">--}}
					{{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>--}}

					{{--@if ($errors->has('email'))--}}
					{{--<span class="help-block">--}}
					{{--<strong>{{ $errors->first('email') }}</strong>--}}
					{{--</span>--}}
					{{--@endif--}}
					{{--</div>--}}
					{{--</div>--}}

					{{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
					{{--<label for="password" class="col-md-4 control-label">Password</label>--}}

					{{--<div class="col-md-6">--}}
					{{--<input id="password" type="password" class="form-control" name="password" required>--}}

					{{--@if ($errors->has('password'))--}}
					{{--<span class="help-block">--}}
					{{--<strong>{{ $errors->first('password') }}</strong>--}}
					{{--</span>--}}
					{{--@endif--}}
					{{--</div>--}}
					{{--</div>--}}

					{{--<div class="form-group">--}}
					{{--<div class="col-md-6 col-md-offset-4">--}}
					{{--<div class="checkbox">--}}
					{{--<label> <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me </label>--}}
					{{--</div>--}}
					{{--</div>--}}
					{{--</div>--}}

					{{--<div class="form-group">--}}
					{{--<div class="col-md-8 col-md-offset-4">--}}
					{{--<button type="submit" class="btn btn-primary">--}}
					{{--Login--}}
					{{--</button>--}}

					{{--<a class="btn btn-link" href="{{ route('password.request') }}"> Forgot Your Password? </a>--}}
					{{--</div>--}}
					{{--</div>--}}

					{{--<div class="social-logins text-center">--}}
					{{--<button class="loginBtn loginBtn--facebook">--}}
					{{--Login with Facebook--}}
					{{--</button>--}}

					{{--<button class="loginBtn loginBtn--google">--}}
					{{--Login with Google--}}
					{{--</button>--}}


					{{--<a class="loginBtn loginBtn--facebook" href="{{ url('/auth/facebook') }}"> Login with Facebook </a>--}}

					{{--<a class="loginBtn loginBtn--google" href="{{ url('/auth/google') }}"> Login with Google </a>--}}


					{{--</div>--}}
					{{--</form>--}}
					{{--</div>--}}
					{{--</div>--}}
				</div>
			</div>
		</div>
	</section>
@endsection
