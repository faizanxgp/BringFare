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
					@if(Session::has('flash_message'))
						<div class="alert alert-success">
							{!! Session::get('flash_message') !!}
						</div>
					@endif
					<h2><i class="fa fa-envelope"></i> Dashboard </h2>
					@include('partials.sub-menu')

					<div class="illustrtion">
						<img src="{{ URL::to('src/images/transactions.jpg') }}" alt="" />
					</div>

				</div>

			</div>
		</div>


	</section>

@endsection