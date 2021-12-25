@extends('layouts.main')

@section('title')
    Admin Dashboard
@endsection

@section('pageHeading')
    User Dashboard
@endsection

@section('content')
    <section id="page" class="header-margin">
        <div class="container">

            <div class="row">
                <div class="col-md-10 col-md-push-1 sidebar">
                    {{--<div class="header">Refine Search</div>--}}
                    {{--<p>&nbsp;</p>--}}
                    <h3>Browse Trips</h3>
                    <p>Find travellors coming from your location</p>
                    <form method="post" action="{{ route('post-search-trips') }}">

                        <div class="row">
                            <div class="col-md-4">
                                <h4>Destination</h4>
                            </div>
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label> From Country: </label>
                                    {{ Form::select('f_country', $countries, null, ['class' => 'form-control', 'placeholder' => 'Please select...', '']) }}
                                </div>
                            </div>

                            <div class="col-md-4">


                                <div class="form-group">
                                    <label> To Country <span class="required">*</span> : </label>
                                    {{ Form::select('t_country', $countries, null, ['class' => 'form-control', 'placeholder' => 'Please select...', 'required']) }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <h4>Date</h4>
                            </div>
                            <div class="col-md-4">


                                <div class="form-group ">
                                    <label> From Date: </label>
                                    <input type="text" id="datepicker1" name="from_date" class="form-control" placeholder="YYYY-MM-DD"/>
                                </div>
                            </div>
                            <div class="col-md-4">


                                <div class="form-group ">
                                    <label> To Date: </label>
                                    <input type="text" id="datepicker2" name="upto_date" class="form-control" placeholder="YYYY-MM-DD"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"><h4>Price Range</h4></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4"><h4>Sort by</h4></div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <input type="submit" class="btn btn-primary"/>
                                    {{ csrf_field() }}
                                </div>
                            </div>
                        </div>

                    </form>


                </div><!-- .sidebar -->
                <div class="col-md-10 col-md-push-1">

                    <div class="search-results">
                        <div class="row dark-bg">
                            <div class="col-md-3 ">
                                <div class="dark-bg-2">From</div>
                            </div>
                            <div class="col-md-3 ">
                                <div class="dark-bg-2">To</div>
                            </div>
                            <div class="col-md-3 ">
                                <div class="dark-bg-2">Departure Date</div>
                            </div>
                            <div class="col-md-3 ">
                                <div class="dark-bg-2">Arrival Date</div>
                            </div>
                        </div>
                        @foreach($trips as $trip)
                            <div class="row results">
                                <div class="col-md-12">
                                    <div class="item-card-2 card-2">


                                        <div class="card-top row border-bottom">

                                            <div class="col-md-3">{{ $trip->country }}</div>
                                            <div class="col-md-3">{{ $trip->country_to }}</div>
                                            <div class="col-md-3">{{ $trip->from_date }}</div>
                                            <div class="col-md-3">{{ $trip->upto_date }}</div>
                                        </div>
                                        <div class="row border-bottom">
                                            <div class="col-md-8">
                                                <h4>Description</h4>
                                                @if($trip->description)
                                                    <p>{{ $trip->description }}</p>
                                                @else
                                                    <p>None avaialbel</p>
                                                @endif
                                            </div>
                                            <div class="col-md-4">
                                                <h4>Budget</h4>
                                                @if($trip->budget)
                                                    <p>{{ $trip->budget }}</p>
                                                @else
                                                    <p>Not specified</p>
                                                @endif
                                                </div>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <div class="col-md-6 user-pad">
                                            <div class="user-img1 inline">
                                                @if($trip->user->image == "")
                                                    <img class="img-circle user-img4" src="{{ URL::to('src/images/users/user1.jpg') }}" alt=""/>
                                                @else
                                                    <img class="img-circle user-img4" src="{{ URL::to('/uploads/users/' . $trip->user->image) }}" alt=""/>
                                                @endif
                                            </div>
                                            <div class="title-img inline"><a href="{{ route('profile', $trip->user->id) }}">{{ $trip->user->name }}</a><br/>
                                                <div class="rateit" data-rateit-value="{{ $trip->user->rating_seller() }}" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                                                <br/>({{ $trip->user->reviews_seller() }} Reviews)
                                            </div>
                                        </div>


                                        <div class="col-md-6 ">
                                            <a href="" class="btn btn-primary pull-right mt20">Invite for Product </a>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        @endforeach

                        {{--<div class="col-md-4">--}}
                        {{--<div class="item-card card">--}}
                        {{--<div class="card-top">--}}
                        {{--<div class="image"><a href="#"><img src="{{ URL::to('src/images/items/item1.jpg') }}" alt=""/></a></div>--}}
                        {{--<div class="item-title">item name</div>--}}
                        {{--<div class="item-status"><label class="label label-primary">Open</label></div>--}}
                        {{--</div>--}}
                        {{--<div class="card-footer">--}}
                        {{--<div class="user-img inline"><img src="{{ URL::to('src/images/users/user1.jpg') }}" alt=""/></div>--}}
                        {{--<div class="title-img inline">Buy in JAPAN<br/>Willing to pay SGD 1000</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </div><!-- .search-results -->

            </div>
        </div>

        </div>


    </section>


@endsection