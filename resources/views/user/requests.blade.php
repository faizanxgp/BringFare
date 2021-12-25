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
					<h2><i class="fa fa-envelope"></i> Requests </h2>
					@include('partials.sub-menu')
				</div>
				<div class="col-md-12">
					<h3 class="inline"><i class="fa fa-list-ul"></i> Activities </h3>
					{{-- <div class="filterby">Filter by <select></select></div> --}}

					<table class="table">
						<tr>
							<th>Product</th>
							<th>Category</th>
							<th>Price</th>
							<th>Country</th>
							<th>Status</th>
							<th>Date/Time</th>
							<th>Action</th>
						</tr>

						@if(count($products)>0)
							@foreach($products as $product)


								<tr>
									<td><a href="{{ route('request', $product->id) }}">{{ $product->item_name }}</a></td>
									<td>{{ $product->category->category }}</td>
									<td>{{ $product->price }}</td>
									<td>{{ $product->country }}</td>
									<td>{{ $product->status }}</td>
									<td>{{ $product->created_at }}</td>

									<td><a class="btn btn-primary" href="{{ route('bids') }}">Bids</a> <a class="btn btn-primary" href="{{ route('edit-request', $product->id) }}">Edit</a> <a class="btn btn-danger btn-delete"
												href="{{ route('edit-request', $product->id) }}">Delete</a></td>

								</tr>
							@endforeach
						@else
							<tr>
								<td colspan="7">No Data Found</td>
							</tr>
						@endif
					</table>
					<p><a href="{{ route('create-request') }}" class="btn btn-primary">Post Request</a></p>
				</div>

			</div>
		</div>


	</section>

@endsection

@section('js')
	<script>


		$(document).ready(function () {
			$('.btn-delete').click(function (e) {
				e.preventDefault();

				var linkURL = $(this).attr("href");
				console.log(linkURL);

				warnBeforeRedirect(linkURL);
			});

			function warnBeforeRedirect(linkURL) {
				swal({
					title: "Are you sure?",
					text: "Do you really want to delete this item?",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, delete it!'

				}).then(function () {
					console.log('done');
					window.location.href = linkURL;
				});
//
//
//
//
//				, function() {
//					window.location.href = linkURL;
//				});
			}
		});


		//		$( document ).ready(function() {
		//
		//
		//		$('.btn-delete').click(
		//	swal({
		//		title: 'Are you sure?',
		//		text: "You won't be able to revert this!",
		//		type: 'warning',
		//		showCancelButton: true,
		//		confirmButtonColor: '#3085d6',
		//		cancelButtonColor: '#d33',
		//		confirmButtonText: 'Yes, delete it!'
		//	}).then(function () {
		//		swal(
		//		'Deleted!',
		//		'Your file has been deleted.',
		//		'success'
		//		)
		//	})
		//		)
		//
		//
		//		});
	</script>
@endsection