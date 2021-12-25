@extends('layouts.main')

@section('title')
    Admin Dashboard
@endsection

@section('pageHeading')
    User Dashboard
@endsection

@section('content')


    <section id="main-slider">
        <h1>Strike deals with travelers and get stuff from all over the world</h1>
        <h3>1000+ Travellors | 5000+ Members | 10000+ Requests</h3>
        <div class="box">
            <h4>GET STARTED</h4>
            <div class="one inline">
                <h5>BROWSE</h5>
                <a href="" class="btn btn-secondary">Trip</a> <a href="" class="btn btn-primary">Request</a>
            </div>
            <div class="one inline">
                <h5>POST</h5>
                <a href="" class="btn btn-secondary">Trip</a> <a href="" class="btn btn-primary">Request</a>

            </div>
        </div>

    </section>

    <section id="page">

        <section class="main-page">
            <div class="container bordbott">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="title">Why Use BringFare?</h2>
                        <p>Bringfare is a reliable way of getting travelers to bring stuff to you from anywhere in the world.</p>
                        <p>Travelers can earn by quoting a price for an item somebody wants from the location they are in.</p>
                        <p>Bringfare moderates for both the parties and ensures that buyers and travelers get what they deserve.</p>
                        <p>So post a request if you’re a buyer or a trip if you’re a traveler on Bringfare and get started.</p>

                    </div>
                    <div class="col-md-5 col-md-push-1">
                        <div class="customer-reviews">
                            <h2><img src="{{ URL::to('src/images/icons/icon-reviews.png ') }}"/> Customer Reviews </h2>
                            <div class="reviews owl-carousel owl-theme">
                                <div class="cardx">
                                    <div class="review-item">
                                        <div class="user-img inline"><img src="{{ URL::to('src/images/users/user1.jpg') }}" alt=""/></div>
                                        <div class="user-details inline"><a href="#">myusername</a>
                                            <div class="user-stars"><img src="{{ URL::to('src/images/stars.png') }}" alt=""/></div>
                                        </div>

                                        <div class="review-details">To traveller lux-ex for helping to buy To traveller lux-ex for helping to buy To traveller lux-ex for helping to buy</div>
                                    </div>
                                </div>
                                <div class="cardx">
                                    <div class="review-item">
                                        <div class="user-img inline"><img src="{{ URL::to('src/images/users/user1.jpg') }}" alt=""/></div>
                                        <div class="user-details inline"><a href="#">myusername</a>
                                            <div class="user-stars"><img src="{{ URL::to('src/images/stars.png') }}" alt=""/></div>
                                        </div>

                                        <div class="review-details">To traveller lux-ex for helping to buy To traveller lux-ex for helping to buy To traveller lux-ex for helping to buy</div>
                                    </div>
                                </div>
                                <div class="cardx">
                                    <div class="review-item">
                                        <div class="user-img inline"><img src="{{ URL::to('src/images/users/user1.jpg') }}" alt=""/></div>
                                        <div class="user-details inline"><a href="#">myusername</a>
                                            <div class="user-stars"><img src="{{ URL::to('src/images/stars.png') }}" alt=""/></div>
                                        </div>

                                        <div class="review-details">To traveller lux-ex for helping to buy To traveller lux-ex for helping to buy To traveller lux-ex for helping to buy</div>
                                    </div>
                                </div>
                                <div class="cardx">
                                    <div class="review-item">
                                        <div class="user-img inline"><img src="{{ URL::to('src/images/users/user1.jpg') }}" alt=""/></div>
                                        <div class="user-details inline"><a href="#">myusername</a>
                                            <div class="user-stars"><img src="{{ URL::to('src/images/stars.png') }}" alt=""/></div>
                                        </div>

                                        <div class="review-details">To traveller lux-ex for helping to buy To traveller lux-ex for helping to buy To traveller lux-ex for helping to buy</div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>


            {{--<div class="container bordbott">--}}
            {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}

            {{--</div>--}}

            {{--<div class="col-md-12x">--}}
            {{--<div class="trending-requests">--}}
            {{--<h2 class="title">Most Trending Requests</h2>--}}
            {{--<div class="slider owl-carousel owl-theme">--}}
            {{--<div class="col-md-3">--}}
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
            {{--<div class="col-md-3">--}}
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
            {{--<div class="col-md-3">--}}
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
            {{--<div class="col-md-3">--}}
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
            {{--<div class="col-md-3">--}}
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


            {{--</div>--}}


            {{--</div>--}}
            {{--</div>--}}


            {{--</div>--}}
            {{--</div>--}}
        </section>
    {{--<section class="main-page bglightgrey" style="">--}}

    {{--<div class="container categories">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-12">--}}
    {{--<h2 class="title">Browse Request by Category</h2>--}}
    {{--</div>--}}
    {{--<div class="col-md-2">--}}
    {{--<div class="box"><a href="#"><img src="{{ URL::to('src/images/icons/icon-1.png') }}" alt=""/> Food and Drinks </a></div>--}}
    {{--</div>--}}
    {{--<div class="col-md-2">--}}
    {{--<div class="box"><a href="#"><img src="{{ URL::to('src/images/icons/icon-1.png') }}" alt=""/> Food and Drinks </a></div>--}}
    {{--</div>--}}
    {{--<div class="col-md-2">--}}
    {{--<div class="box"><a href="#"><img src="{{ URL::to('src/images/icons/icon-1.png') }}" alt=""/> Food and Drinks </a></div>--}}
    {{--</div>--}}
    {{--<div class="col-md-2">--}}
    {{--<div class="box"><a href="#"><img src="{{ URL::to('src/images/icons/icon-1.png') }}" alt=""/> Food and Drinks </a></div>--}}
    {{--</div>--}}
    {{--<div class="col-md-2">--}}
    {{--<div class="box"><a href="#"><img src="{{ URL::to('src/images/icons/icon-1.png') }}" alt=""/> Food and Drinks </a></div>--}}
    {{--</div>--}}
    {{--<div class="col-md-2">--}}
    {{--<div class="box last"><a href="#"><img/> View All Categories </a></div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}
    {{--<section class="main-page">--}}
    {{--<div class="container countries">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-12">--}}
    {{--<h2 class="title">Browse Request by Country</h2>--}}
    {{--<div class="box"><a href="#"> UNITED STATES </a></div>--}}
    {{--<div class="box"><a href="#"> UNITED STATES </a></div>--}}
    {{--<div class="box"><a href="#"> UNITED STATES </a></div>--}}
    {{--<div class="box"><a href="#"> UNITED STATES </a></div>--}}
    {{--<div class="box"><a href="#"> UNITED STATES </a></div>--}}
    {{--<div class="box"><a href="#"> UNITED STATES </a></div>--}}
    {{--<div class="box"><a href="#"> UNITED STATES </a></div>--}}
    {{--<div class="box"><a href="#"> UNITED STATES </a></div>--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}


    {{----}}

    {{--</section>--}}
@endsection