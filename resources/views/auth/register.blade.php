@extends('layouts.main')

@section('content')

    <section id="page" class="header-margin">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1 class="text-center">Create An Account</h1>
                    <p class="text-center">Existing User? <a href="{{ route('login') }}">Login Here</a></p>
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            {!! Session::get('flash_message') !!}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="grey-register-bg">
                                <p>
                                    <a class="loginBtn loginBtn--facebook" href="{{ url('/auth/facebook') }}"> Login with Facebook </a></p>
                                <p>
                                    <a class="loginBtn loginBtn--google" href="{{ url('/auth/google') }}"> Login with Google </a>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="auth-wrapper">

                                <form class="form-horizontal" role="form" method="POST"
                                      action="{{ route('register') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">


                                        <div class="">
                                            <input id="name" type="text" class="form-control" name="name"
                                                   value="{{ old('name') }}" placeholder="Full Name *" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                        		<strong>{{ $errors->first('name') }}</strong>
                                    		</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">


                                        <div class="">
                                            <input id="email" type="email" class="form-control" name="email"
                                                   value="{{ old('email') }}" placeholder="Email Address *" required>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
												<strong>{{ $errors->first('email') }}</strong>
                                   			</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">


                                        <div class="">
                                            <input id="password" type="password" class="form-control" name="password"
                                                   placeholder="Password *" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
												<strong>{{ $errors->first('password') }}</strong>
											</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">


                                        <div class="">
                                            <input id="password-confirm" type="password" class="form-control"
                                                   name="password_confirmation" placeholder="Confirm Password *" required>
                                            @if ($errors->has('password_confirmation'))
                                                <span class="help-block">
												<strong>{{ $errors->first('password_confirmation') }}</strong>
											</span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">


                                        <div class="">
                                            <input id="phone" type="text" class="form-control" name="phone"
                                                   value="{{ old('phone') }}" placeholder="Phone e.g. 923xxxxxxxxx"
                                                   >

                                            @if ($errors->has('phone'))
                                                <span class="help-block">
												<strong>{{ $errors->first('phone') }}</strong>
                                   			</span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">


                                        <div class="">
                                            <input name="image" class="form-control" type="file" placeholder=""/>

                                            @if ($errors->has('image'))
                                                <span class="help-block">
										<strong>{{ $errors->first('image') }}</strong>
									</span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">

                                            <textarea id="about" class="form-control" name="about"
                                                      placeholder="Please introduce yourself">{{ old('about') }}</textarea>

                                        @if ($errors->has('about'))
                                            <span class="help-block">
													<strong>{{ $errors->first('about') }}</strong>
												</span>
                                        @endif
                                    </div>


                                    <div class="form-group {{ $errors->has('agree') ? ' has-error' : '' }}">

                                        <div class="">
                                            <div class="checkbox" style="padding-left: 20px;">
                                                <input type="checkbox" name="agree" value="1"> I agree with <a herf="{{ route('page', 'terms-and-conditions') }}">BringFare Terms and Conditions</a>
                                                    @if ($errors->has('agree'))
                                                        <span class="help-block">
														    <strong>{{ $errors->first('agree') }}</strong>
													    </span>
                                                    @endif
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">
                                                Register with Email
                                            </button>
                                        </div>
                                    </div>


                                </form>


                            </div>
                        </div>
                    </div>

                    {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading">Register</div>--}}
                    {{--<div class="panel-body">--}}
                    {{--<form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">--}}
                    {{--{{ csrf_field() }}--}}

                    {{--<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">--}}
                    {{--<label for="name" class="col-md-4 control-label">Name</label>--}}

                    {{--<div class="col-md-6">--}}
                    {{--<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>--}}

                    {{--@if ($errors->has('name'))--}}
                    {{--<span class="help-block">--}}
                    {{--<strong>{{ $errors->first('name') }}</strong>--}}
                    {{--</span>--}}
                    {{--@endif--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                    {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                    {{--<div class="col-md-6">--}}
                    {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>--}}

                    {{--@if ($errors->has('email'))--}}
                    {{--<span class="help-block">--}}
                    {{--<strong>{{ $errors->first('email') }}</strong>--}}
                    {{--</span>--}}
                    {{--@endif--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">--}}
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

                    {{--<div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">--}}
                    {{--<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>--}}

                    {{--<div class="col-md-6">--}}
                    {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}
                    {{--@if ($errors->has('password_confirmation'))--}}
                    {{--<span class="help-block">--}}
                    {{--<strong>{{ $errors->first('password_confirmation') }}</strong>--}}
                    {{--</span>--}}
                    {{--@endif--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="form-group {{ $errors->has('agree') ? ' has-error' : '' }}">--}}

                    {{--<div class="col-md-6 col-md-offset-4">--}}
                    {{--<div class="checkbox">--}}
                    {{--<label> <input type="checkbox" aria-label="..." name="agree"> I agree with BringFare Terms and Conditions--}}

                    {{--@if ($errors->has('agree'))--}}
                    {{--<span class="help-block">--}}
                    {{--<strong>{{ $errors->first('agree') }}</strong>--}}
                    {{--</span>--}}
                    {{--@endif--}}
                    {{--</label>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="form-group">--}}
                    {{--<div class="col-md-6 col-md-offset-4">--}}
                    {{--<button type="submit" class="btn btn-primary">--}}
                    {{--Register--}}
                    {{--</button>--}}
                    {{--</div>--}}
                    {{--</div>--}}


                    {{--</form>--}}

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
                    {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>

    </section>
@endsection
