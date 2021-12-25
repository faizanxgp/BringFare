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
					<h2><i class="fa fa-envelope"></i> Bids </h2>
					@include('partials.sub-menu')
				</div>

				<div class="col-md-12">
					<h3 class="inline"><i class="fa fa-list-ul"></i> Activities </h3>
					{{-- <div class="filterby">Filter by <select></select></div> --}}


					<table class="table">
						<tr>
							<th>Product</th>
<th>Status</th>
							<th>Bid Message</th>
							<th>Amount</th>
							<th>Bid Status</th>
							<th>User</th>
							<th>Date/Time</th>
							<th>Action</th>

						</tr>
						@if (count($bids) > 0)
						@foreach($bids as $bid)


							<tr>
								<td><a href="{{ route('request', $bid->product->id) }}">{{ $bid->product->item_name }}</a></td>
								<td>{{ $bid->product->status or '' }}</td>
								<td>{{ $bid->comments }}</td>
								<td>{{ $bid->amount }} </td>
								<td>{{ $bid->status }}</td>
								<td><a href="{{ route('profile', $bid->user->id) }}">{{ $bid->user->name }}</a></td>
<td>{{ $bid->created_at }}</td>
								<td><a class="btn btn-primary ls-modal" href="{{ route('discuss', $bid->id) }}">Discuss</a> @if($bid->product->status=='Open') <a class="btn btn-danger" href="{{ route('select-request', $bid->id) }}">Select</a> @endif</td>

							</tr>
						@endforeach
							@else
						<tr>
							<td colspan="7">
								No Data Found
							</td>
						</tr>

							@endif
					</table>

				</div>

			</div>
		</div>


	</section>

	<div id="myModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">BringFare</h4>
				</div>
				<div class="modal-body">
					<p>Loading...</p>
				</div>
				<div class="modal-footer">

				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
	<script>
		jQuery('.ls-modal').on('click', function(e){
			e.preventDefault();
			jQuery('#myModal').modal('show').find('.modal-body').load(jQuery(this).attr('href'));
		});
	</script>
@endsection