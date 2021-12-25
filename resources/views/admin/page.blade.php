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
			<div class="row">
				<div class="col-md-12">
					<h2><i class="fa fa-envelope"></i> Page </h2>
				</div>

				<div class="col-md-12">

					<form action="{{ route('admin.updatepage') }}" method="post" role="form">


						<div class="inner-box">
							<div class="welcome-msg">
								<h3 class="page-sub-header2 clearfix no-padding">Page </h3>
								<span class="page-sub-header-sub small"></span>
							</div>

							<div class="form-horizontal">
								<div class="form-group">
									<label class="col-sm-3 control-label">Page Title</label>

									<div class="col-sm-9">
										<input type="text" placeholder="" class="form-control" name="title" value="{{ $page->title }}">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Slug</label>

									<div class="col-sm-9">
										<input type="text" placeholder="" class="form-control" name="slug" value="{{ $page->slug }}">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Meta Descriptions</label>

									<div class="col-sm-9">
										<input type="text" placeholder="" class="form-control" name="meta_description" value="{{ $page->meta_description }}">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Page Body</label>

									<div class="col-sm-9">
										<textarea id="summernote" class="form-control" name="description" rows="10">{{ $page->description }}</textarea>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Active</label>

									<div class="col-sm-9">

										{{ Form::checkbox('active', '1', $page->active) }}
									</div>
								</div>


								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-9"></div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-9">
										<input type="hidden" name="id" value="{{ $page->id or 0 }}">
										<button class="btn btn-default" type="submit">Update</button>
										{{ csrf_field() }}
									</div>
								</div>
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>


	</section>
@endsection



@section('js')

	<!-- include summernote css/js-->
	<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
	<script>
		$(document).ready(function() {
			$('#summernote').summernote();
		});
	</script>


@endsection