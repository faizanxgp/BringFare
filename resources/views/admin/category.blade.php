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
					<h2><i class="fa fa-envelope"></i> Category </h2>
				</div>

				<div class="col-md-12">
					<form method="post" action="{{ route('admin.update-category') }}" enctype="multipart/form-data">

						<div class="form-group {{ $errors->has('category') ? ' has-error' : '' }}">
							<div class="">
								<label>Category Name <span class="required">*</span></label> <input name="category" class="form-control" type="text" placeholder="Enter category name in full" value="{{ $category->category or old('category') }}"/>
								@if ($errors->has('category'))
									<span class="help-block">
                            			<strong>{{ $errors->first('category') }}</strong>
                          			</span>
								@endif
							</div>
						</div>


						<div class="form-group">
							<div class="">
								<input type="hidden" name="id" value="{{ $category->id }}"/>
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
