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
				{{--<div class="col-md-12">--}}
				{{--<h2><i class="fa fa-envelope"></i> Users </h2>--}}
				{{--</div>--}}
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Pages</h3>


						</div>
						<!-- /.box-header -->
						<div class="box-body table-responsive no-padding">
							<table class="table table-striped">
								<tbody>
								<tr>
									<th>Slug</th>
									<th>Title</th>
									<th>Action</th>
								</tr>

								@foreach ($pages as $item)
									<tr>
										<td>
											{{ $item->slug }}</a>
										</td>
										<td>{{ $item->title }}</td>

										<td>
											<!-- //TODO -->
											<p><a class="btn btn-info btn-xs" href="{{ route('admin.page', $item->id) }}"> <i class="fa fa-recycle"></i> Edit </a> <a class="btn btn-danger btn-xs" href="{{ route('admin.page', $item->id) }}"> <i class=" fa fa-trash"></i> Delete </a></p>


										</td>

									</tr>
								@endforeach


								</tbody>
							</table>

						</div>
					</div>
				</div>
			</div>
		</div>


	</section>
@endsection
