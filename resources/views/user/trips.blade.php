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
					<h2><i class="fa fa-envelope"></i> Trips </h2>
					@include('partials.sub-menu')
				</div>
				<div class="col-md-12">
					<h3 class="inline"><i class="fa fa-list-ul"></i> Activities </h3>
					{{-- <div class="filterby">Filter by <select></select></div> --}}

					<table class="table">
						<tr>
							<th>From Country</th>
							<th>From Date</th>
							<th>To Country</th>
							<th>Upto Date</th>
							<th>Type</th>

							<th>Notes</th>

							<th>Action</th>
						</tr>
						@if( count($trips) > 0 )
						@foreach($trips as $trip)


							<tr>
								<td>{{ $trip->country }}</td>
								<td>{{ $trip->from_date }}</td>
								<td>{{ $trip->country_to }}</td>
								<td>{{ $trip->upto_date }}</td>
								<td>{{ $trip->trip_type }}</td>


								<td>{{ $trip->notes }}</td>


								<td><a class="btn btn-primary" href="{{ route('edit-trip', $trip->id) }}">Edit</a> <a class="btn btn-danger" href="">Delete</a></td>

							</tr>
						@endforeach
							@else
						<tr><td colspan="8">No Data Found</td> </tr>
						@endif

					</table>
					<p><a href="{{ route('create-trip') }}" class="btn btn-primary">Post Trip</a></p>
				</div>

			</div>
		</div>


	</section>

@endsection