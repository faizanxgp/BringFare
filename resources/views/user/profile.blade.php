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
			<h2><i class="fa fa-envelope"></i> Profile </h2>
			<p>&nbsp;</p>
			<div class="row">
				<div class="col-md-9 block">
					<div class="row">
						<div class="col-md-4">
							@if($member->image == "")
								<img class="user-img3" src="{{ URL::to('src/images/users/user1.jpg') }}" alt=""/>
							@else
								<img class="user-img3" src="{{ URL::to('/uploads/users/' . $member->image) }}" alt=""/>
							@endif
							<div>Member since <i>{{ $member->created_at }}</i></div>
						</div>
						<div class="col-md-8">
							<h2>{{ $member->name }}</h2>
							<h3>About me</h3>
							<p>{{ $member->about }}</p>
						</div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="block">
						<p>
							@if($member->id == $user_id)
								<a href="{{ route('edit-profile') }}" class="btn btn-primary form-control">Update</a>
							@else
								@if($member->hasFollowing($user_id))
									<a href="{{ route('unfollow', $member->id) }}" class="btn btn-primary form-control">Un Follow</a>
								@else
									<a href="{{ route('follow', $member->id) }}" class="btn btn-primary form-control">Follow</a>
								@endif
							@endif
						</p>


						<h3>Activity</h3>
						<div class="activity">
							<div class="icon"><i class="fa fa-gift"></i></div>
							Requests: <span class="badge">{{ $member->product->count() }}</span>
						</div>
						<div class="activity">
							<div class="icon"><i class="fa fa-plane"></i></div>
							Trips: <span class="badge">{{ $member->trip->count() }}</span>
						</div>
						<div class="activity">
							<div class="icon"><i class="fa fa-user"></i></div>
							Followed by: <span class="badge">{{ $member->following->count() }}</span>
						</div>
						<div class="activity">
							<div class="icon"><i class="fa fa-user"></i></div>
							Following: <span class="badge">{{ $member->followBy->count() }}</span>
						</div>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<h3 class="inline"><i class="fa fa-list-ul"></i> Products </h3>

					<h4>Products posted: <span class="badge">{{ $request_count }}</span></h4>
					<h4>Reviews: <span class="badge">{{ $member->reviews_buyer() }}</span></h4>
					<h4>Avg. Rating: <div class="rateit" data-rateit-value="{{ $member->rating_buyer() }}" data-rateit-ispreset="true" data-rateit-readonly="true"></div></h4>
					@foreach($review_buyer as $review)
						<div class="review-box block" style="border: 1px solid #bbbbbb; padding: 10px; margin-bottom: 10px; ">
							<p>Rating by <a href="{{ route('profile', $review->rating_by) }}">{{ $review->ratingby->name }}</a> for <a href="{{ route('request', $review->product_id) }}">{{ $review->product->item_name }}</a></p>
							<p>Rated <div class="rateit" data-rateit-value="{{ $review->rating }}" data-rateit-ispreset="true" data-rateit-readonly="true"></div></p>
							<p>
							<blockquote>{{ $review->review }}</blockquote>
							</p>
						</div>
					@endforeach

				</div>
				<div class="col-md-6">
					<h3 class="inline"><i class="fa fa-comments-o"></i> Bids </h3>

					<h4>Products purchased: <span class="badge">{{ $bid_count }}</span></h4>
					<h4>Reviews: <span class="badge">{{ $member->reviews_seller() }}</span></h4>
					<h4>Avg. Rating: <div class="rateit" data-rateit-value="{{ $member->rating_seller() }}" data-rateit-ispreset="true" data-rateit-readonly="true"></div></h4>
					@foreach($review_seller as $review)
						<div class="review-box block" style="border: 1px solid #bbbbbb; padding: 10px; margin-bottom: 10px; ">
							<p>Rating by <a href="{{ route('profile', $review->rating_by) }}">{{ $review->ratingby->name }}</a> for <a href="{{ route('request', $review->product_id) }}">{{ $review->product->item_name }}</a></p>
							<p>Rated <div class="rateit" data-rateit-value="{{ $review->rating }}" data-rateit-ispreset="true" data-rateit-readonly="true"></div></p>
							<p>
							<blockquote>{{ $review->review }}</blockquote>
							</p>
						</div>
					@endforeach

				</div>
			</div>
		</div>


	</section>

@endsection