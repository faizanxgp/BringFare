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
					{{--<h2><i class="fa fa-envelope"></i> Products </h2>--}}
				{{--</div>--}}

				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Product Requests</h3>

							<div class="box-tools">
								<div class="input-group input-group-sm" style="width: 250px;">
									<form method="get" action="{{ route('admin.products') }}">
									<input type="text" name="search" class="form-control pull-right" placeholder="Search ID or Title">

									<div class="input-group-btn">
										<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
									</div>
									</form>
								</div>
							</div>
						</div>
						<!-- /.box-header -->
						<div class="box-body table-responsive no-padding">
							<table class="table table-striped">
								<tr>
									<th>Product</th>
									<th>User</th>
									<th>Category</th>
									<th>From Country</th>
									<th>To Country</th>
									<th>Price</th>
									<th>Status</th>
									<th>Active</th>
									<th>Date</th>
									<th>Action</th>
								</tr>
								@foreach($products as $product)
									<tr>
										<td><a class="" href="{{ route('admin.product', $product->id) }}">{{ $product->item_name }}</a></td>
										<td><a href="{{ route('admin.users', 'search=' . $product->user->id) }}">{{ $product->user->name }}</a></td>
										<td>{{ $product->category->category }}</td>
										<td>{{ $product->country }}</td>
										<td>{{ $product->dcountry }} {{ $product->dcity }}</td>
										<td>{{ $product->price }}</td>
										<td>{{ $product->status }}</td>
										<td>@if ($product->active == 1) Yes @else No @endif</td>
										<td>{{ $product->created_at }}</td>
										<td><a href="{{ route('admin.product-status', $product->id) }}" class="btn btn-primary">@if($product->active) Suspend @else Activate @endif</a></td>
									</tr>
								@endforeach
								<tr>
									<td colspan="4">{{ $products->links() }}</td>
								</tr>
							</table>
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>


			</div>
		</div>
	</section>

@endsection