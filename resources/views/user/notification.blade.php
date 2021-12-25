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
					<h2><i class="fa fa-envelope"></i> Notifications </h2>

				</div>
				<div class="col-md-12">
					<h3 class="inline"><i class="fa fa-list-ul"></i> Notifications </h3>
					{{-- <div class="filterby">Filter by <select></select></div> --}}
					<table class="table messages">
						<tr><th>Notification</th><th>Date</th></tr>
						@foreach($notifications as $notification)
							<tr><td>{!! $notification->description !!}</td><td>{{ $notification->created_at }}</td></tr>
						@endforeach
						<tr><td colspan="2">{{ $notifications->links() }}</td></tr>
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