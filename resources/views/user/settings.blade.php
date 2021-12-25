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
					<h2><i class="fa fa-envelope"></i> Settings </h2>
				</div>
				<div class="col-md-6">
					<h3 class="inline"><i class="fa fa-list-ul"></i> Activities </h3>
					{{-- <div class="filterby">Filter by <select></select></div> --}}
					<div class="panel-group" id="accordion">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapse1"> Payout Method </a>
								</h4>
							</div>
							<div id="collapse1" class="panel-collapse collapse in">
								<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
									sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
									minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
									commodo consequat.</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapse2"> Email Notification Settings </a>
								</h4>
							</div>
							<div id="collapse2" class="panel-collapse collapse">
								<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
									sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
									minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
									commodo consequat.</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapse3"> Payment Settings </a>
								</h4>
							</div>
							<div id="collapse3" class="panel-collapse collapse">
								<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
									sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
									minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
									commodo consequat.</div>
							</div>
						</div>
					</div>

				</div>
				<div class="col-md-6">
					<h3 class="inline"><i class="fa fa-comments-o"></i> Messages </h3>
					{{-- <div class="filterby">Filter by <select></select></div> --}}
					<ul class="messagees">
						<li>You dont have any message yet.</li>
					</ul>
				</div>
			</div>
		</div>


	</section>

@endsection