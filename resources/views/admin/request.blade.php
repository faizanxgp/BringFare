@extends('layouts.admin')

@section('title')
	Admin Dashboard
@endsection

@section('pageHeading')
	Admin Dashboard
@endsection

@section('content')
	<section id="page" class="header-margin">
		<div class="">
			<div class="row request-title">
				<div class="col-md-12">
					@if(Session::has('flash_message'))
						<div class="alert alert-success">
							{!! Session::get('flash_message') !!}
						</div>
					@endif

				</div>
			</div>
			<div class="row request-section">
				<div class="col-md-12 ">
					<div class="row request-details">
						<div class="col-md-6">

							<h1>{{ $product->item_name }} {{ $product->id }} ({{ $product->status }})</h1>



							<div class="product-img card">
								@if($product->image == "")
									<img src="{{ URL::to('src/images/items/item-default.jpg') }}" alt=""/>
								@else
									<img src="{{ URL::to('/uploads/products/' . $product->image) }}" alt=""/>
								@endif

							</div>


							<div class="details">

								<p><strong>Description:</strong></p>
								<div class="mb20">
									{{ $product->item_description }}
								</div>

								<p><i class="fa fa-shopping-bag"></i> Quantity {{ $product->qty }}</p>
								<p><i class="fa fa-map-marker"></i> Shop in {{ $product->country }}</p>

								<p><i class="fa fa-map-marker"></i> Deliver in {{ $product->dcity }} {{ $product->dcountry }}</p>
								<p><i class="fa fa-tag"></i> Willing to pay {{ $product->price }} USD</p>
								@if($product->require_date != null)
									<p><i class="fa fa-calendar"></i> Require Before {{ $product->require_date }} </p>
								@endif

								{{--<div class="user-details">--}}
									{{--<b>Requested by </b><br/><br/>--}}
									{{--<div class="user-img inline"><img class="img-circle user-img1" src="{{ URL::to('src/images/users/user1.jpg') }}" alt=""/></div>--}}
									{{--<div class="title-img inline"><a href="">{{ $product->user->name }} </a><br/>Start <br/>(8 reviews)</div>--}}
								{{--</div>--}}

								<div class="user-details">
									<b>Requested by </b><br/><br/>
									<div class="user-img inline">
										@if($product->user->image == "")
											<img class="img-circle user-img1" src="{{ URL::to('src/images/users/user1.jpg') }}" alt=""/>
										@else
											<img class="img-circle user-img1" src="{{ URL::to('/uploads/users/' . $product->user->image) }}" alt=""/>
										@endif
									</div>
									<div class="title-img inline"><a href="{{ route('profile', $product->user->id) }}">{{ $product->user->name }} </a><br/><div class="rateit" data-rateit-value="{{ $product->user->rating_buyer() }}" data-rateit-ispreset="true" data-rateit-readonly="true"></div><br/>({{ $product->user->reviews_buyer() }} reviews)</div>
								</div>

							</div>

						</div>

						<div class="col-md-6">
							<div class="comments ">
								<h3>Comments</h3>
								<div class="separator"></div>
								@if( !$bids->isEmpty() )
									@foreach($bids as $bid)
										<div class="comment row">
											<div class="user-img inlinex col-md-2"><img class="img-circle user-img10" src="{{ URL::to('src/images/users/user1.jpg') }}" alt=""/></div>
											<div class="comment-body inlinex col-md-10">
												<div class="one"><a href="{{ route('profile', $bid->user->id) }}">{{ $bid->user->name }} (<div class="rateit" data-rateit-value="{{ $bid->user->rating_seller() }}" data-rateit-ispreset="true" data-rateit-readonly="true"></div> {{ $bid->user->reviews_seller() }} Reviews) </a> Posted On: Date <span class="pull-right"><strong>Offer Amount: $ {{ $bid->amount }}</strong></span></div>
												<div class="two">{{ $bid->comments }}</div>

												<div class="edit-bid">
													<br/>
													<button class="btn btn-success">{{ $bid->status }}</button> <button class="btn btn-success">View Discussion</button>
												</div>

												{{--@if($product->status == 'Open' and $user_id == $product->user_id)--}}
												{{--<div class="select-bid"><br /><a href="{{ route('select-request', $bid->id) }}" class="btn btn-danger">Select Bid</a></div>--}}
												{{--@endif--}}


											</div>
										</div>

									@endforeach
								@else

									<p>No comments yet</p>
								@endif
							</div>
						</div>
					</div>
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
		jQuery('.ls-modal').on('click', function (e) {
			e.preventDefault();
			jQuery('#myModal').modal('show').find('.modal-body').load(jQuery(this).attr('href'));
		});
	</script>
@endsection