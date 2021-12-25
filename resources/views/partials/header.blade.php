<header class="mb20">
	<div class="nav-container">


		<nav id="nav" class="navbar navbar-default navbar-fixed-top sb-slide">
			<div class="container">

				<div class="navbar-header">

					<button type="button" class="navbar-toggle"           data-toggle="collapse" data-target="#topnav">
						<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
					</button>
					<div id="logo" class="hidden-xsx">
						<a href="{{ route('home') }}"><img id="logo-img" src="{{ URL::to('src/images/logo.png') }}" alt=""/></a>
					</div>
				</div>


				<div id="topnav" class="collapse navbar-collapse">

					<ul class="nav navbar-nav navbar-right">
						<li>@if(isset($user)) {{ $user->roles->first()->id or 0 }} @endif</li>
						<li><a href="{{ route('search') }}">Browse Requests</a></li>
						<li><a id="postRequest" href="{{ route('create-request') }}">Post Request</a></li>
						<li><a id="browseTrip" href="{{ route('search-trips') }}">Browse Trip</a></li>
						<li><a id="postTrip" href="{{ route('create-trip') }}">Post Trip</a></li>

						@if(Auth::check())
							<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
							<li><a href="{{ route('inbox') }}">Inbox <sup><span class="label label-warning">{{ Auth::user()->hasMessage() }}</span></sup></a></li>
							{{--<li><a href="{{ route('notification') }}">Notifications <sup><span class="label label-warning">{{ Auth::user()->hasNotification() }}</span></sup></a></li>--}}
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown">Notifications <sup><span class="label label-warning">{{ Auth::user()->hasNotification() }}</a>
								<ul class="dropdown-menu" role="menu">
									<?php $notifications = Auth::user()->getNotification(); ?>
									@foreach($notifications as $n)
										<li>{!! $n->description !!}</li>
									@endforeach
									<li><a href="{{ route('notification') }}" class="pull-right">View All</a></li>
								</ul>
							</li>
							<li><a href="{{ route('profile') }}">Profile</a></li>
							<li><a href="{{ route('contact') }}">Contact</a></li>
							<li>
								<div class="btn-group" style="margin-left:10px">
									<button id="myid" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
										@if(Auth::user()->image == "")
											<img class="img-circle" src="{{ URL::to('src/images/users/user1.jpg') }}" alt=""/>
										@else
											<img class="img-circle" src="{{ URL::to('/uploads/users/' . Auth::user()->image) }}" alt=""/>
										@endif
										&nbsp; <span class="menutext">{{ Auth::user()->name }}</span>&nbsp; <span class="caret"></span>
									</button>
									<ul class="dropdown-menu dropdown-menu-right" role="menu">
										<li><a href="#">Bal: {{ Auth::user()->ledger_balance() }}</a></li>

									{{--<li><a href="{{ route('settings') }}">Credit</a></li>--}}

									<!--<li><a href="/xfers/wallet">Airfrov Wallet</a></li>-->
										<li><a href="{{ route('messages') }}">Admin Messages</a></li>
										<li><a href="{{ route('wallet') }}">Wallet</a></li>

										<!--<li><a href="/xfers/wallet">Airfrov Wallet</a></li>-->
										{{--<li><a href="{{ route('settings') }}">Settings</a></li>--}}
										<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
											<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
										</li>
									</ul>
								</div>
							</li>

						@else
							<li><a href="#">How it works</a></li>
							<li><a href="{{ route('login') }}">Login</a></li>
							<li><a href="{{ route('register') }}">Register</a></li>
							<li><a id="#">Contact</a></li>
						@endif


					</ul>
				</div>
			</div> <!-- end container div -->
		</nav>
	</div>
</header>