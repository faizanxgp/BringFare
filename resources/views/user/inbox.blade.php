@extends('layouts.main')

@section('title')
	Admin Dashboard
@endsection

@section('pageHeading')
	User Dashboard
@endsection

@section('content')
	<section id="page-inner" class="header-margin inbox">
		<div class="container ">
			<div class="row">
				<div class="col-md-12">
					<h2><i class="fa fa-envelope"></i> Inbox </h2>

					<h3 class="inline"><i class="fa fa-comments-o"></i> Messages </h3>
				</div>
			</div>
			<div class="row white-bg p10">
				<div class="col-md-3 br1">
					<p><a href="">All</a> | <a href="">Purchase</a> | <a href="">Sale</a></p>
					{{-- <div class="filterby">Filter by <select></select></div> --}}
					<div class="table messages">
						{{--<div><th>Comment</th>--}}
						{{--<th>Project</th>--}}
						{{--<th>Date</th>--}}
						{{--</div>--}}
						@if(count($comments)>0)
							@foreach($comments as $comment)
								<div class="results">
									<p><a class="ls-modal" href="{{ route('discuss', $comment->bid_id) }}">{{ $comment->bid->product->item_name }}</a><br/>
										{{ $comment->bid->user->name }}<br />
										<i>{{ $comment->created_at }}</i></p>
								</div>
							@endforeach
						@else
							There are no messages.
						@endif

					</div>
				</div>
				<div class="col-md-9 bl1">
					<div class="inbox-body message-height-container">Your message here</div>
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
//			jQuery('#myModal').modal('show').find('.modal-body').load(jQuery(this).attr('href'));
			jQuery('.inbox-body').load(jQuery(this).attr('href'));
		});
	</script>
@endsection