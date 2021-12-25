@extends('layouts.modal')

@section('title')
	Admin Dashboard
@endsection

@section('pageHeading')
	User Dashboard
@endsection

@section('content')
	<section id="modal" class="header-margin-zero">

		<div class="">
			<div class="">
				<div class="" style="max-height: 400px; overflow: scroll;">
					@if(Session::has('flash_message'))
						<div class="alert alert-success">
							{!! Session::get('flash_message') !!}
						</div>
					@endif
					<h2><i class="fa fa-gift"></i> Invite Users </h2>
					<h3>Product: {{ $product->item_name }} by <a href="">{{ $product->user->name }}</a> <br/> Status: {{ $product->status }}</h3>



					<form method="post" action="{{ route('post-invite-request') }}">
						<div class="form-group">
							<input type="checkbox" name="check1" value="1" /> <label>People visiting {{ $product->country }} ( {{ $trips->count() }} persons )</label>  <br />
							{{--<input type="checkbox" name="check2" value="1" /> <label>People I follow ( {{ $following1->count() }} persons )</label>  <br />--}}
							<input type="checkbox" name="check3" value="1" /> <label>All People who follow me ( {{ $following2->count() }} persons )</label>  <br />
							<input type="checkbox" name="check5" value="1" /> <label>Select from followers ( {{ $following2->count() }} persons )</label>
							{{ Form::select('followers[]', $followers, null, ['placeholder' => 'Please select multiple followers ...','class' => 'form-control', 'id' => 'followers-select', 'multiple']) }}
							<br />
							<input type="checkbox" name="check4" value="1" /> <label>Emails </label>  <br />
							<textarea class="form-control" name="emails" cols="80" rows="5"></textarea>
						</div>
						<input type="hidden" name="product_id" value="{{ $product->id }}"/>
						<input class="btn btn-primary" type="submit" value="Invite People "/>
						<p>&nbsp;</p>
						{{ csrf_field() }}

					</form>

				</div>
			</div>
	</section>

@endsection


@section('js')

	<script>
		$(document).ready(function() {

			// button add funds
			$('#btn-funded').on('click',function(e){
				e.preventDefault();

				var form = $(this).parents('form');
				swal({
					title: "Are you sure?",
					text: "This will Add Funds in Escrow",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "Yes, Continue!",
					closeOnConfirm: false
				}).then(
					function(isConfirm) {
						console.log('confirmed');
						if (isConfirm) form.submit();
					},
					function () {
						console.log('cancel');
					}
				);

			});

			// button acknowledge
			$('#btn-acknowledge').on('click',function(e){
				e.preventDefault();

				var form = $(this).parents('form');
				swal({
					title: "Are you sure?",
					text: "This will confirm you have received product.",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "Yes, Continue!",
					closeOnConfirm: false
				}).then(
						function(isConfirm) {
							console.log('confirmed');
							if (isConfirm) form.submit();
						},
						function () {
							console.log('cancel');
						}
				);

			});

			// button acknowledge
			$('#btn-rate').on('click',function(e){
				e.preventDefault();

				var form = $(this).parents('form');
				swal({
					title: "Are you sure?",
					text: "This will add your rating for provider.",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "Yes, Continue!",
					closeOnConfirm: false
				}).then(
						function(isConfirm) {
							console.log('confirmed');
							if (isConfirm) form.submit();
						},
						function () {
							console.log('cancel');
						}
				);

			});

			// button acknowledge
			$('#btn-purchased').on('click',function(e){
				e.preventDefault();

				var form = $(this).parents('form');
				swal({
					title: "Are you sure?",
					text: "This will confirm that product has been purchased.",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "Yes, Continue!",
					closeOnConfirm: false
				}).then(
						function(isConfirm) {
							console.log('confirmed');
							if (isConfirm) form.submit();
						},
						function () {
							console.log('cancel');
						}
				);

			});

			// button acknowledge
			$('#btn-purchased').on('click',function(e){
				e.preventDefault();

				var form = $(this).parents('form');
				swal({
					title: "Are you sure?",
					text: "This will confirm that product has been purchased.",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "Yes, Continue!",
					closeOnConfirm: false
				}).then(
						function(isConfirm) {
							console.log('confirmed');
							if (isConfirm) form.submit();
						},
						function () {
							console.log('cancel');
						}
				);

			});

			// button acknowledge
			$('#btn-delivered').on('click',function(e){
				e.preventDefault();

				var form = $(this).parents('form');
				swal({
					title: "Are you sure?",
					text: "This will confirm that product has been delivered.",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "Yes, Continue!",
					closeOnConfirm: false
				}).then(
						function(isConfirm) {
							console.log('confirmed');
							if (isConfirm) form.submit();
						},
						function () {
							console.log('cancel');
						}
				);

			});

			// button acknowledge
			$('#btn-rate-2').on('click',function(e){
				e.preventDefault();

				var form = $(this).parents('form');
				swal({
					title: "Are you sure?",
					text: "This will add your rating for buyer.",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "Yes, Continue!",
					closeOnConfirm: false
				}).then(
						function(isConfirm) {
							console.log('confirmed');
							if (isConfirm) form.submit();
						},
						function () {
							console.log('cancel');
						}
				);

			});






				$('#followers-select').selectize({
					maxItems: null,

					create: false
				});




		});
	</script>
@endsection