<ul class="inline-menu inner-nav sub-menu-user">
    <li><a href="{{ route('requests') }}" {!! (Request::is('user/products') ? 'class="active"' : '') !!}>Requests</a></li>
    <li><a href="{{ route('trips') }}" {!! (Request::is('user/trips') ? 'class="active"' : '') !!}>Trips</a></li>
    <li><a href="{{ route('bids') }}" {!! (Request::is('user/bids') ? 'class="active"' : '') !!}> Bids Received</a></li>
    <li><a href="{{ route('applied') }}" {!! (Request::is('user/applied') ? 'class="active"' : '') !!}>My Bids</a></li>
</ul>