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
					<h2><i class="fa fa-envelope"></i> Rating </h2>
				</div>

				<div class="col-md-8 col-md-push-2">
					<h3 class="inline"><i class="fa fa-comments-o"></i> Add Rating </h3>
					{{-- <div class="filterby">Filter by <select></select></div> --}}


					<h3>Product: {{ $product->item_name }} by <a href="">{{ $product->user->name }}</a> <br/> Status: {{ $product->status }}</h3>
					<h4>Bid: {{ $bid->comments }} for {{ $bid->amount }} by <a href="">{{ $bid->user->name }}</a> - Status: {{ $bid->status }}</h4>
<hr />
					<form method="post" action="{{ route('post-rating') }}">
						<input type="hidden" name="product_id" value="{{ $product->id }}" />
						<input type="hidden" name="bid_id" value="{{ $bid->id }}" />
						<div class="form-group">
							<h4>Rating For @if($product->user_id==$user_id) Seller @else Buyer @endif</h4>
							<div class="">
								<label>Rating</label>

								<select id="rating" name="rating">
									<option value="1">Bad</option>
									<option value="2">OK</option>
									<option value="3">Good</option>
									<option value="4">V Good</option>
									<option value="5">Excellent</option>
								</select>
								<div class="rateit" data-rateit-backingfld="#rating" data-rateit-min="0"></div>

							</div>





						</div>
						<div class="form-group ">
							<div class="">
								<label>How was your experience?</label> <textarea name="review" class="form-control"></textarea>

							</div>
						</div>
						<div class="form-group">
							<div class="">
								<input class="btn btn-primary" type="submit" value="Submit"/>
								{{ csrf_field() }}
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>


	</section>

@endsection