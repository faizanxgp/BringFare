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
                <div class="col-md-3 col-md-push-0 sidebar">

                    <h3>Browse Requests</h3>
                    <p>Find the travelling request world-wide</p>
                    <div class="search-form">
                        <form method="post" action="{{ route('post-search') }}">
                            <div class="searchBox row border-bottom">
                                <h3>Keyword </h3>

                                <div class="col-md-12">
                                    <input type="text" class="form-control"/>
                                </div>
                            </div>
                            <div class="searchBox row border-bottom">

                                <h3>Package <a href="#" class="showHide"><i class="fa fa-plus-circle"></i></a></h3>

                                <div class="options-box" style="display: none;">
                                    <div class="col-md-12">
                                        <label>Purchase From</label>
                                        <div>
                                            {{ Form::select('country', $countries, $search['country'] or null, ['class' => 'form-control', 'placeholder' => 'Please select...', 'id' => 'country']) }}
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <label>Deliver to</label>
                                        <div class="" style="">
                                            {{ Form::select('d_country', $countries, $search['dcountry'] or null, ['class' => 'form-control', 'placeholder' => 'Please select...', 'id' => 'dcountry']) }}
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label>City</label> <input type="text" class="form-control" name="dcity"
                                                                   value="{{ $search['dcity'] or null }}"
                                                                   placeholder="City"/>
                                    </div>

                                </div>
                            </div>

                            <div class="searchBox row border-bottom">


                                <h3>Deliver before <a href="#" class="showHide"><i
                                                class="fa fa-plus-circle"></i></a></h3>
                                <div class="options-box" style="display: none;">
                                    <div class="col-md-12">
                                        <div>
                                            <ul class="nostyle">
                                                <li>
                                                    <label>Date</label><br/><input type="text" name="before_date"
                                                                                   value="" id="datepicker1">
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="searchBox row border-bottom">

                                <h3>Package size <a href="#" class="showHide"><i class="fa fa-plus-circle"></i></a>
                                </h3>
                                <div class="options-box" style="display: none;">
                                    <div class="col-md-12">
                                        <div>
                                            <ul class="nostyle">
                                                <li>
                                                    {{ Form::select('package_size', $package_sizes, null, ['class' => 'form-control', 'placeholder' => 'Please select...']) }}

                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="searchBox row border-bottom">

                                <h3>Price Range <a href="#" class="showHide"><i
                                                class="fa fa-plus-circle"></i></a></h3>
                                <div class="options-box" style="display: none;">
                                    <div class="col-md-12">
                                        <div>
                                            <p>
                                                <label for="amount">Price range:</label> <input type="text"
                                                                                                id="amount"
                                                                                                readonly
                                                                                                style="border:0; color:#f6931f; font-weight:bold;">
                                                <input type="hidden" id="price1" name="price1"
                                                       value="{{ $search['price1'] or 0 }}"/> <input
                                                        type="hidden" id="price2" name="price2"
                                                        value="{{ $search['price2'] or 1000 }}"/>
                                            </p>

                                            <div id="slider-range"></div>


                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="searchBox row border-bottom">

                                <h3>Categories <a href="#" class="showHide"><i
                                                class="fa fa-plus-circle"></i></a></h3>

                                <div class="options-box" style="display: none;">
                                    <div>
                                        <ul class="nostyle categories">
                                            @foreach($categories as $category)
                                                <li>
                                                    <input type="checkbox" name="category[]"
                                                           value="{{ $category->id }}"> {{ $category->category }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>


                            <div class="searchBox row border-bottom">

                                <h3>Request by people you follow <a href="#" class="showHide"><i
                                                class="fa fa-plus-circle"></i></a></h3>
                                <div class="options-box" style="display: none;">
                                    <div>
                                        <ul class="nostyle">
                                            <li>
                                                <input type="checkbox" name="followers" value="1"> My Followers
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group2 row">
                                {{--<div class="group1">--}}
                                {{--<div class="searchType inline">--}}
                                {{--<div class="input-group">--}}
                                {{--<select name="s_type" class="form-control">--}}
                                {{--<option>Request</option>--}}
                                {{--<option>Recommendation</option>--}}
                                {{--<option>User</option>--}}
                                {{--<option>Country</option>--}}
                                {{--</select>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="searchText inline">--}}
                                {{--<div class="input-group">--}}
                                {{--<input name="s_text" class="form-control" type="text"/>--}}
                                {{--</div>--}}
                                {{--</div>--}}

                                {{--</div>--}}
                                {{--<div class="group2">--}}
                                {{--<label> Filter By : </label>--}}
                                {{--<div class="input-group inline">--}}
                                {{--<select name="s_filter" class="form-control">--}}
                                {{--<option>Request</option>--}}
                                {{--<option>Recommendation</option>--}}
                                {{--</select>--}}
                                {{--</div>--}}

                                {{--<div class="input-group inline">--}}
                                {{--{{ Form::select('s_country', $countries, null, ['class' => 'form-control', 'placeholder' => 'Please select...', 'required']) }}--}}
                                {{--</div>--}}


                                {{--</div>--}}
                                {{--<div class="group3">--}}

                                {{--<span class="input-group inline"><input type="checkbox" name="chk_open" aria-label="..."> Open </span><!-- /input-group -->--}}
                                {{--<span class="input-group inline"><input type="checkbox" name="chk_process" aria-label="..."> Process </span><!-- /input-group -->--}}
                                {{--<span class="input-group inline"><input type="checkbox" name="chk_accepted" aria-label="..."> Accepted </span><!-- /input-group -->--}}
                                {{--<span class="input-group inline"><input type="checkbox" name="chk_completed" aria-label="..."> Completed </span><!-- /input-group -->--}}


                                {{--</div>--}}

                                <div class="searchButton inline col-md-12">
                                    <div class="input-group">
                                        <input class="form-control btn btn-primary" type="submit" value="Search">
                                        {{ csrf_field() }}
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div><!-- .search-form -->


                    {{--<div class="header">Categories</div>--}}
                    {{--<ul class="categories">--}}
                    {{--@foreach($categories as $category)--}}
                    {{--<li><a href="{{ route('search-category', $category->id) }}">{{ $category->category }}</a></li>--}}
                    {{--@endforeach--}}

                    {{--</ul>--}}
                </div><!-- .sidebar -->
                <div class="col-md-9 col-md-push-0">


                    <div class="search-results">
                        {{--<div class="row dark-bg">--}}
                        {{--<div class="col-md-3 ">--}}
                        {{--<div class="dark-bg-2">From</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-3 ">--}}
                        {{--<div class="dark-bg-2">To</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-3 ">--}}
                        {{--<div class="dark-bg-2">Departure Date</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-3 ">--}}
                        {{--<div class="dark-bg-2">Arrival Date</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}

                        <div class="row results">
                            <?php $ctr = 0; ?>
                            @foreach($products as $product)
                                <?php $ctr++; $tmp = $ctr - 1; if ( ($tmp % 3) == 0) { ?>
                                <div class="col-md-12">
                                    <hr/>
                                </div>
                                <?php
                                } ?>
                                <div class="item-card card col-md-4">

                                    <div class="card-top">
                                        <div class="col-md-12x">
                                            <div class="image"><a href="{{ route('request', $product->id) }}">
                                                    @if($product->image)
                                                        <img src="{{ URL::to('/uploads/products/' . $product->image) }}" alt=""/>
                                                    @else
                                                        <img src="{{ URL::to('src/images/items/item1.jpg') }}" alt=""/>
                                                    @endif</a>
                                            </div>
                                        </div>
                                        <div class="col-md-12x">
                                            <div class="item-title"><a href="{{ route('request', $product->id) }}">{{ $product->item_name }}</a>


                                                {{--<br/><br/>{{ $product->item_description }}--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-top rowx ">

                                        <div class="col-md-12x item-description">
                                            Purchase from <strong>{{ $product->country }}</strong> Deliver to <strong>{{ $product->dcountry }} {{ $product->dcity }}</strong>
                                            @if($product->require_date != null) before
                                            <i>{{ $product->require_date }}</i>@endif at
                                            <strong>USD {{ $product->price }}</strong>
                                        </div>
                                    </div>

                                    <div class="card-footer rowx">
                                        <div class="col-md-3x align-center">

                                            <div class="item-status"><label
                                                        class="label label-primary">{{ $product->status }}</label></div>
                                        </div>
                                        <div class="col-md-6x align-center">
                                            <a href="{{ route('request', $product->id) }}"
                                               class="btn btn-primary">View Details</a>
                                        </div>
                                        <div class="col-md-3x user-pad">
                                            <div class="user-img inline">
                                                @if($product->user->image == "")
                                                    <img class="img-circle user-img1"
                                                         src="{{ URL::to('src/images/users/user1.jpg') }}" alt=""/>
                                                @else
                                                    <img class="img-circle user-img1"
                                                         src="{{ URL::to('/uploads/users/' . $product->user->image) }}"
                                                         alt=""/>
                                                @endif
                                            </div>
                                            <div class="title-img inline"><a
                                                        href="{{ route('profile', $product->user->id) }}">{{ $product->user->name }}</a><br/>
                                                <div class="rateit"
                                                     data-rateit-value="{{ $product->user->rating_buyer() }}"
                                                     data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                                                <br/>({{ $product->user->reviews_buyer() }} reviews)
                                            </div>
                                        </div>

                                        {{--<div class="title-img inline">Buy in <strong>{{ $product->country }}<br/></strong> at </strong> <br/>Deliver in <strong>{{ $product->dcity }}--}}
                                        {{--, {{ $product->dcountry }}</strong> @if($product->require_date != null) before <i>{{ $product->require_date }}</i>@endif </div>--}}
                                    </div>
                                </div>

                            @endforeach
                        </div>
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

@section('js')
    <script>
        $(document).ready(function () {
            $('.showHide').click(function (e) {
                e.preventDefault();
                link = $(this).find("i.fa");
//				console.log($(this));
//				console.log(link);
                if (link.hasClass('fa-plus-circle')) {
                    link.addClass('fa-minus-circle');
                    link.removeClass('fa-plus-circle');
                } else {
                    link.addClass('fa-plus-circle');
                    link.removeClass('fa-minus-circle');
                }

                $(this).parent().parent().find("div.options-box").toggle(1000);

            });

            price1 = {{ $search['price1'] or 0 }};
            price2 = {{ $search['price2'] or 1000 }};


            $("#amount").val("$" + price1 + " - $" + price2);
        });
    </script>
@endsection