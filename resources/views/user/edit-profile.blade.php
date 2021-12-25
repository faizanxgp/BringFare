@extends('layouts.main')

@section('title')
	Admin Dashboard
@endsection

@section('pageHeading')
	User Dashboard
@endsection

@section('content')
	<section id="page-inner" class="header-margin">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2><i class="fa fa-envelope"></i> Update Profile </h2>
				</div>
				<div class="col-md-12">
					<h3 class="inline"><i class="fa fa-list-ul"></i> Activities </h3>
					{{-- <div class="filterby">Filter by <select></select></div> --}}
					<form class="form-horizontal" role="form" method="POST" action="{{ route('update-profile') }}" enctype="multipart/form-data">
						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label for="name" class="col-md-4 control-label">Name <span class="required">*</span></label>

							<div class="col-md-6">
								<input id="name" type="text" class="form-control" name="name" value="{{ $member->name or old('name') }}" required autofocus>

								@if ($errors->has('name'))
									<span class="help-block">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="email" class="col-md-4 control-label">E-Mail Address <span class="required">*</span></label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control" name="email" value="{{ $member->email or old('email') }}" required>

								@if ($errors->has('email'))
									<span class="help-block">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
							<label for="phone" class="col-md-4 control-label">Contact Number </label>

							<div class="col-md-6">
								<input id="phone" type="text" class="form-control" name="phone" value="{{ $member->phone or old('phone') }}" placeholder="e.g. +92300xxxxxxx">

								@if ($errors->has('phone'))
									<span class="help-block">
										<strong>{{ $errors->first('phone') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
							<label for="image" class="col-md-4 control-label">Image (300x300)</label>

							<div class="col-md-6">
								<input name="image" class="form-control" type="file" placeholder=""/>

								@if ($errors->has('image'))
									<span class="help-block">
										<strong>{{ $errors->first('image') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
							<label for="about" class="col-md-4 control-label">About me </label>

							<div class="col-md-6">
								<textarea id="about" class="form-control" name="about">{{ $member->about or old('about') }}</textarea>

								@if ($errors->has('about'))
									<span class="help-block">
										<strong>{{ $errors->first('about') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<h3>You can leave it blank if password change is not required.</h3>
						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<label for="password" class="col-md-4 control-label">Password</label>

							<div class="col-md-6">
								<input id="password" type="password" class="form-control" name="password">

								@if ($errors->has('password'))
									<span class="help-block">
												<strong>{{ $errors->first('password') }}</strong>
											</span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

							<div class="col-md-6">
								<input id="password-confirm" type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Update
								</button>
							</div>
						</div>
					</form>

				</div>

			</div>
		</div>


	</section>


@endsection

