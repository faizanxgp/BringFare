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
            <div class="row breadcrumbs">
                <div class="col-md-12">
					<span class="introtext"><a href="/trips">Browse Countries</a> <i
                                class="fa fa-chevron-circle-right"></i> <a
                                href="/search?sourceCountry=Japan&category=">{{ $product->country }}</a> <i
                                class="fa fa-chevron-circle-right"></i> {{ $product->item_name }} <br/><br/></span>
                </div>


            </div>
            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {!! Session::get('flash_message') !!}
                </div>
            @endif
            <div class="row">
                <div class="col-md-5">
                    <div class="product-img card">
                        @if($product->image == "")
                            <img src="{{ URL::to('src/images/items/item-default.jpg') }}" alt=""/>
                        @else
                            <img src="{{ URL::to('/uploads/products/' . $product->image) }}" alt=""/>
                        @endif
                    </div>
                    <div class="user-details">
                        <b>Posted by </b><br/><br/>
                        <div class="user-details-inner grey-bg p10">
                            <div class="user-img inline">
                                @if($product->user->image == "")
                                    <img class="img-circle user-img1"
                                         src="{{ URL::to('src/images/users/user1.jpg') }}" alt=""/>
                                @else
                                    <img class="img-circle user-img1"
                                         src="{{ URL::to('/uploads/users/' . $product->user->image) }}" alt=""/>
                                @endif
                            </div>
                            <div class="title-img inline"><a
                                        href="{{ route('profile', $product->user->id) }}">{{ $product->user->name }} </a><br/>
                                <div class="rateit" data-rateit-value="{{ $product->user->rating_buyer() }}"
                                     data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                                <br/>({{ $product->user->reviews_buyer() }} reviews)
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-7">

                    <div class="details">
                        <h2>{{ $product->item_name }} </h2>
                        <div class="row mt10 mb10">
                            <div class="col-md-6">
                                <span class="title-span">Request ID:</span> <span class="theme-color">{{ $product->id }}</span>
                            </div>
                            <div class="col-md-6">
                                <span class="title-span">Request Status:</span> <label class="label label-default theme-color">{{ $product->status }}</label>
                            </div>
                            <div class="col-md-12">
                                <hr/>
                            </div>
                        </div>

                        <div class="row mt10 mb10">
                            <div class="col-md-6">
                                <i class="fa fa-shopping-bag"></i> <span class="title-span">Quantity</span> <span class="theme-color">{{ $product->qty }}</span>
                            </div>
                            <div class="col-md-6">
                                <i class="fa fa-tag"></i> <span class="title-span">Willing to pay</span> <span class="theme-color">{{ $product->price }} USD</span>
                            </div>
                        </div>
                        <div class="row mt10 mb10">
                            <div class="col-md-6">
                                <i class="fa fa-map-marker"></i> <span class="title-span">Shop in</span> <span class="theme-color">{{ $product->country }}</span>
                            </div>
                            <div class="col-md-6">
                                <i class="fa fa-map-marker"></i> <span class="title-span">Deliver in</span> <span class="theme-color">{{ $product->dcity }} {{ $product->dcountry }}</span>
                            </div>
                        </div>
                        @if($product->require_date != null)
                            <div class="row mt10 mb10">
                                <div class="col-md-6">

                                    <i class="fa fa-calendar"></i> <span class="title-span">Require Before</span> <span class="theme-color">{{ $product->require_date }}</span>
                                </div>

                            </div>
                        @endif
                        <div class="col-md-12">
                            <hr/>
                        </div>
                        <div class="mb20">
                            <h4><strong>Item Description:</strong></h4>
                            {{ $product->item_description }}
                        </div>

                        <p>
                            @if($product->status == 'Open' and $user_id != $product->user_id and $user_id != 0 and $product->hasBids($user_id) == 0)

                                <button class="showButton btn btn-primary">Place a Bid</button>


                            @endif

                            <a href="{{ route('create-request-duplicate', $product->id) }}"
                               class="btn btn-primary">I want this too</a> <a href="" class="btn btn-primary">Recommend to my Followers</a>
                        </p>

                        <p><a href="{{ route('report-request', $product->id) }}" class="label label-danger ls-modal">Report This Item</a></p>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="comments">
                    <h3>Bids</h3>
                    <div class="separator"></div>
                    @if( !$bids->isEmpty() )
                        @foreach($bids as $bid)
                            <div class="comment row"
                                 @if($user_id == $bid->user_id) style="background-color: #99cb84"@endif>
                                <div class="user-img inlinex col-md-2">
                                    @if($bid->user->image == "")
                                        <img class="img-circle user-img10"
                                             src="{{ URL::to('src/images/users/user1.jpg') }}" alt=""/>
                                    @else
                                        <img class="img-circle user-img10"
                                             src="{{ URL::to('/uploads/users/' . $bid->user->image) }}" alt=""/>
                                    @endif
                                </div>
                                <div class="comment-body inlinex col-md-6">
                                    <div class="one mb10">
                                        <a href="{{ route('profile', $bid->user->id) }}">{{ $bid->user->name }}</a>

                                        <span class="pull-right">Posted On: {{ $bid->created_at }}</span>
                                    </div>
                                    <div class="two mt10 mb10">{{ $bid->comments }}</div>
                                    <p><a href="{{ route('report-bid', [$product->id, $bid->id]) }}" class="label label-danger ls-modal">Report Bid</a></p>

                                    @if($user_id == $bid->user_id or $user_id == $product->user_id)
                                        @if($bid->attachement)
                                            <div class="three">
                                                <a class=""
                                                   href="{{ URL::to('/uploads/comments/' . $bid->attachement) }}"
                                                   target="_blank"><img
                                                            src="{{ URL::to('/uploads/comments/' . $bid->attachement) }}"
                                                            class="thumbnail"/></a>
                                            </div>
                                        @endif
                                    @endif
                                    <div class="edit-bid">
                                        <br/>


                                        @if($user_id == $bid->user_id)
                                            {{--user can not initiate discussion if there is no previous bid comments means only buyer would initiate it--}}
                                            {{--@if ($bid->bidcomments->count() > 0)--}}
                                            {{--<a href="{{ route('discuss', $bid->id) }}"--}}
                                            {{--class="btn btn-primary ls-modal">Discuss</a>--}}
                                            {{--@endif--}}
                                            @if($product->status == 'Open')
                                                <a href="{{ route('discuss', $bid->id) }}"
                                                   class="btn btn-primary edit-comment-btn">Edit</a>
                                                <div class="edit-comment" style="display: none;">
                                                    <form method="post" action="{{ route('edit-comment') }}"
                                                          enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label>Your Offer (USD) <span
                                                                        class="required">*</span></label><input
                                                                    class="form-control" name="bid_amount"
                                                                    value="{{ $bid->amount }}" type="number"
                                                                    placeholder="Offer Amount" required/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Message <span
                                                                        class="required">*</span></label><textarea
                                                                    class="form-control" name="bid_description"
                                                                    placeholder="Enter your message here"
                                                                    required>{{ $bid->comments }}</textarea>
                                                        </div>

                                                        <input type="hidden" name="id" value="{{ $bid->id }}"/>
                                                        <div class="form-group"><input class="btn btn-primary"
                                                                                       type="submit"
                                                                                       value="Submit"/></div>
                                                        {{ csrf_field() }}
                                                    </form>
                                                </div>
                                            @endif
                                        @endif


                                    </div>


                                    {{--@if($product->status == 'Open' and $user_id == $product->user_id)--}}
                                    {{--<div class="select-bid"><br /><a href="{{ route('select-request', $bid->id) }}" class="btn btn-danger">Select Bid</a></div>--}}
                                    {{--@endif--}}


                                </div>

                                <div class="col-md-2">
                                    <div class="rateit"
                                         data-rateit-value="{{ $bid->user->rating_seller() }}"
                                         data-rateit-ispreset="true"
                                         data-rateit-readonly="true"></div>
                                    <div>( {{ $bid->user->reviews_seller() }} Reviews)</div>

                                </div>
                                <div class="col-md-2">
                                    <div class="one align-center mb10">
                                        <strong>$ {{ $bid->amount }}</strong>
                                    </div>
                                    <div>
                                        @if($user_id == $bid->user_id)
                                            {{--user can not initiate discussion if there is no previous bid comments means only buyer would initiate it--}}
                                            @if ($bid->bidcomments->count() > 0)
                                                <div class="align-center mb10"><a href="{{ route('discuss', $bid->id) }}"
                                                                                  class="btn btn-primary ls-modal">Discuss</a></div>
                                            @endif
                                        @endif


                                        @if($user_id == $product->user_id)
                                            <div class="align-center mb10"><a href="{{ route('discuss', $bid->id) }}"
                                                                              class="btn btn-primary ls-modal">Discuss</a></div>
                                            @if($product->status == 'Open')

                                                @if ($product->user->ledger_balance() > $bid->amount)
                                                    <div class="align-center mb10">
                                                        <a href="{{ route('select-request', $bid->id) }}" id="btn-select" class="btn btn-danger">Select Bid</a>
                                                    </div>
                                                @else
                                                    <div class="align-center mb10">
                                                        <a href="{{ route('wallet') }}" id="btn-select" class="btn btn-danger">Add Funds to Select Bidder</a>
                                                    </div>
                                                @endif
                                            @endif
                                            {{--{{ $product->user->ledger_balance() }} {{ $bid->amount }}--}}
                                        @endif

                                        @if($bid->status == 'Selected')
                                            <div class="align-center mb10"><label class="label label-success">Selected</label></div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    @else

                        <p>No comments yet</p>
                    @endif

                </div><!-- comments -->

            </div>


            {{--<div class="row request-title">--}}

            {{--<div class="col-md-12">--}}
            {{--@if(Session::has('flash_message'))--}}
            {{--<div class="alert alert-success">--}}
            {{--{!! Session::get('flash_message') !!}--}}
            {{--</div>--}}
            {{--@endif--}}
            {{--<h2>Request #{{ $product->id }} ({{ $product->status }})</h2>--}}
            {{--@if($user_id == $product->user_id)--}}
            {{--@if($product->status == 'Open')--}}
            {{--<a href="{{ route('invite-request', $product->id) }}" class="btn btn-primary ls-modal">Invite</a>--}}
            {{--<a href="{{ route('edit-request', $product->id) }}" class="btn btn-primary">Edit</a>--}}
            {{--@endif--}}

            {{--@endif--}}

            {{--</div>--}}


            {{--</div>--}}
            {{--<div class="row request-section">--}}
            {{--<div class="col-md-10 col-md-push-1">--}}
            {{--<div class="row request-status">--}}
            {{--<div class="col-md-2">--}}
            {{--<div class="text-center">Open</div>--}}
            {{--<div class="progress">--}}
            {{--<div class="progress-bar"></div>--}}
            {{--</div>--}}
            {{--<a class="dot" href="#"></a>--}}
            {{--</div>--}}
            {{--<div class="col-md-2">--}}
            {{--<div class="text-center">Awarded</div>--}}
            {{--<div class="progress">--}}
            {{--<div class="progress-bar"></div>--}}
            {{--</div>--}}
            {{--<a class="dot" href="#"></a></div>--}}
            {{--<div class="col-md-2">--}}
            {{--<div class="text-center">Pending Purchase</div>--}}
            {{--<div class="progress">--}}
            {{--<div class="progress-bar"></div>--}}
            {{--</div>--}}
            {{--<a class="dot" href="#"></a>--}}
            {{--</div>--}}
            {{--<div class="col-md-2">--}}
            {{--<div class="text-center">Pending Delivery</div>--}}
            {{--<div class="progress">--}}
            {{--<div class="progress-bar"></div>--}}
            {{--</div>--}}
            {{--<a class="dot" href="#"></a>--}}
            {{--</div>--}}
            {{--<div class="col-md-2">--}}
            {{--<div class="text-center">Acknowledgement</div>--}}
            {{--<div class="progress">--}}
            {{--<div class="progress-bar"></div>--}}
            {{--</div>--}}
            {{--<a class="dot" href="#"></a>--}}
            {{--</div>--}}
            {{--<div class="col-md-2">--}}
            {{--<div class="text-center">Completed</div>--}}
            {{--<div class="progress">--}}
            {{--<div class="progress-bar"></div>--}}
            {{--</div>--}}
            {{--<a class="dot" href="#"></a>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row request-details">--}}
            {{--<div class="col-md-6">--}}
            {{--<div class="user-details">--}}
            {{--<b>Requested by </b><br/><br/>--}}
            {{--<div class="user-img inline">--}}
            {{--@if($product->user->image == "")--}}
            {{--<img class="img-circle user-img1"--}}
            {{--src="{{ URL::to('src/images/users/user1.jpg') }}" alt=""/>--}}
            {{--@else--}}
            {{--<img class="img-circle user-img1"--}}
            {{--src="{{ URL::to('/uploads/users/' . $product->user->image) }}" alt=""/>--}}
            {{--@endif--}}
            {{--</div>--}}
            {{--<div class="title-img inline"><a--}}
            {{--href="{{ route('profile', $product->user->id) }}">{{ $product->user->name }} </a><br/>--}}
            {{--<div class="rateit" data-rateit-value="{{ $product->user->rating_buyer() }}"--}}
            {{--data-rateit-ispreset="true" data-rateit-readonly="true"></div>--}}
            {{--<br/>({{ $product->user->reviews_buyer() }} reviews)--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="product-img card">--}}
            {{--@if($product->image == "")--}}
            {{--<img src="{{ URL::to('src/images/items/item-default.jpg') }}" alt=""/>--}}
            {{--@else--}}
            {{--<img src="{{ URL::to('/uploads/products/' . $product->image) }}" alt=""/>--}}
            {{--@endif--}}
            {{--</div>--}}

            {{--</div>--}}
            {{--<div class="col-md-6">--}}

            {{--<div class="details">--}}
            {{--<h2>{{ $product->item_name }} </h2>--}}

            {{--<div class="mb20">--}}
            {{--<h4><strong>Item Description:</strong></h4>--}}
            {{--{{ $product->item_description }}--}}
            {{--</div>--}}

            {{--<p><i class="fa fa-shopping-bag"></i> Quantity {{ $product->qty }}</p>--}}
            {{--<p><i class="fa fa-map-marker"></i> Shop in {{ $product->country }}</p>--}}

            {{--<p><i class="fa fa-map-marker"></i> Deliver--}}
            {{--in {{ $product->dcity }} {{ $product->dcountry }}</p>--}}
            {{--<p><i class="fa fa-tag"></i> Willing to pay {{ $product->price }} USD</p>--}}
            {{--@if($product->require_date != null)--}}
            {{--<p><i class="fa fa-calendar"></i> Require Before {{ $product->require_date }} </p>--}}
            {{--@endif--}}
            {{--<p>--}}
            {{--<a href="{{ route('create-request-duplicate', $product->id) }}"--}}
            {{--class="btn btn-primary">I want this too</a> <a href="" class="btn btn-primary">Recommend to my Followers</a>--}}
            {{--</p>--}}
            {{--@if($product->status == 'Open' and $user_id != $product->user_id and $user_id != 0 and $product->hasBids($user_id) == 0)--}}
            {{--<p>--}}
            {{--<button class="showButton btn btn-primary">Place a Bid</button>--}}
            {{--</p>--}}

            {{--@endif--}}

            {{--<p><a href="{{ route('report-request', $product->id) }}" class="label label-danger ls-modal">Report This Item</a></p>--}}
            {{--</div>--}}

            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row recent-requests">--}}
            {{--<div class="col-md-12"><h2>Recent Requests</h2>--}}
            {{--<div class="separator"></div>--}}
            {{--</div>--}}
            {{--@foreach($recent as $prod)--}}
            {{--<div class="col-md-3">--}}
            {{--<div class="item-card card">--}}
            {{--<div class="card-top">--}}

            {{--<div class="image">--}}
            {{--<a href="{{ route('request', $prod->id) }}">--}}
            {{--@if($prod->image == "")--}}
            {{--<img src="{{ URL::to('src/images/items/item-default.jpg') }}" alt=""/>--}}
            {{--@else--}}
            {{--<img src="{{ URL::to('/uploads/products/' . $prod->image) }}" alt=""/>--}}
            {{--@endif</a></div>--}}
            {{--<div class="item-title">{{ $prod->item_name }}</div>--}}
            {{--<div class="item-status"><label class="label label-primary">{{ $prod->status }}</label></div>--}}

            {{--</div>--}}
            {{--<div class="card-footer">--}}
            {{--<div class="user-img inline">@if($prod->user->image == "")--}}
            {{--<img class="img-circle user-img1"--}}
            {{--src="{{ URL::to('src/images/users/user1.jpg') }}" alt=""/>--}}
            {{--@else--}}
            {{--<img class="img-circle user-img1"--}}
            {{--src="{{ URL::to('/uploads/users/' . $prod->user->image) }}" alt=""/>--}}
            {{--@endif</div>--}}
            {{--<div class="title-img inline">Buy in <i>{{ $prod->country }}</i><br/>Willing to pay <strong>USD {{ $prod->price }}</strong></div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--@endforeach--}}
            {{--<div class="col-md-3">--}}
            {{--<div class="item-card card">--}}
            {{--<div class="card-top">--}}
            {{--<div class="image"><a href="#"><img--}}
            {{--src="{{ URL::to('src/images/items/item1.jpg') }}" alt=""/></a></div>--}}
            {{--<div class="item-title">item name</div>--}}
            {{--<div class="item-status"><label class="label label-primary">Open</label></div>--}}
            {{--</div>--}}
            {{--<div class="card-footer">--}}
            {{--<div class="user-img inline"><img src="{{ URL::to('src/images/users/user1.jpg') }}"--}}
            {{--alt=""/></div>--}}
            {{--<div class="title-img inline">Buy in JAPAN<br/>Willing to pay SGD 1000</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-3">--}}
            {{--<div class="item-card card">--}}
            {{--<div class="card-top">--}}
            {{--<div class="image"><a href="#"><img--}}
            {{--src="{{ URL::to('src/images/items/item1.jpg') }}" alt=""/></a></div>--}}
            {{--<div class="item-title">item name</div>--}}
            {{--<div class="item-status"><label class="label label-primary">Open</label></div>--}}
            {{--</div>--}}
            {{--<div class="card-footer">--}}
            {{--<div class="user-img inline"><img src="{{ URL::to('src/images/users/user1.jpg') }}"--}}
            {{--alt=""/></div>--}}
            {{--<div class="title-img inline">Buy in JAPAN<br/>Willing to pay SGD 1000</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-3">--}}
            {{--<div class="item-card card">--}}
            {{--<div class="card-top">--}}
            {{--<div class="image"><a href="#"><img--}}
            {{--src="{{ URL::to('src/images/items/item1.jpg') }}" alt=""/></a></div>--}}
            {{--<div class="item-title">item name</div>--}}
            {{--<div class="item-status"><label class="label label-primary">Open</label></div>--}}
            {{--</div>--}}
            {{--<div class="card-footer">--}}
            {{--<div class="user-img inline"><img src="{{ URL::to('src/images/users/user1.jpg') }}"--}}
            {{--alt=""/></div>--}}
            {{--<div class="title-img inline">Buy in JAPAN<br/>Willing to pay SGD 1000</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}

            {{--</div>--}}

            {{--<div class="row">--}}
            {{--<div class="comments col-md-10 col-md-push-1">--}}
            {{--<h3>Bids</h3>--}}
            {{--<div class="separator"></div>--}}
            {{--@if( !$bids->isEmpty() )--}}
            {{--@foreach($bids as $bid)--}}
            {{--<div class="comment row"--}}
            {{--@if($user_id == $bid->user_id) style="background-color: #99cb84"@endif>--}}
            {{--<div class="user-img inlinex col-md-2">--}}
            {{--@if($bid->user->image == "")--}}
            {{--<img class="img-circle user-img10"--}}
            {{--src="{{ URL::to('src/images/users/user1.jpg') }}" alt=""/>--}}
            {{--@else--}}
            {{--<img class="img-circle user-img10"--}}
            {{--src="{{ URL::to('/uploads/users/' . $bid->user->image) }}" alt=""/>--}}
            {{--@endif--}}
            {{--</div>--}}
            {{--<div class="comment-body inlinex col-md-10">--}}
            {{--<div class="one mb10">--}}
            {{--<a href="{{ route('profile', $bid->user->id) }}">{{ $bid->user->name }}--}}
            {{--(--}}
            {{--<div class="rateit"--}}
            {{--data-rateit-value="{{ $bid->user->rating_seller() }}"--}}
            {{--data-rateit-ispreset="true"--}}
            {{--data-rateit-readonly="true"></div> {{ $bid->user->reviews_seller() }}--}}
            {{--Reviews) </a> Posted On: Date <span class="pull-right"><strong>Offer Amount: $ {{ $bid->amount }}</strong></span>--}}
            {{--</div>--}}
            {{--<div class="two">{{ $bid->comments }}</div>--}}
            {{--<p><a href="{{ route('report-bid', [$product->id, $bid->id]) }}" class="label label-danger ls-modal">Report Bid</a></p>--}}

            {{--@if($user_id == $bid->user_id or $user_id == $product->user_id)--}}
            {{--@if($bid->attachement)--}}
            {{--<div class="three">--}}
            {{--<a class=""--}}
            {{--href="{{ URL::to('/uploads/comments/' . $bid->attachement) }}"--}}
            {{--target="_blank"><img--}}
            {{--src="{{ URL::to('/uploads/comments/' . $bid->attachement) }}"--}}
            {{--class="thumbnail"/></a>--}}
            {{--</div>--}}
            {{--@endif--}}
            {{--@endif--}}
            {{--<div class="edit-bid">--}}
            {{--<br/>--}}

            {{--@if($bid->status == 'Selected')--}}
            {{--<label class="label label-success">Selected</label>--}}
            {{--@endif--}}

            {{--@if($user_id == $bid->user_id)--}}
            {{--user can not initiate discussion if there is no previous bid comments means only buyer would initiate it--}}
            {{--@if ($bid->bidcomments->count() > 0)--}}
            {{--<a href="{{ route('discuss', $bid->id) }}"--}}
            {{--class="btn btn-primary ls-modal">Discuss</a>--}}
            {{--@endif--}}
            {{--@if($product->status == 'Open')--}}
            {{--<a href="{{ route('discuss', $bid->id) }}"--}}
            {{--class="btn btn-primary edit-comment-btn">Edit</a>--}}
            {{--<div class="edit-comment" style="display: none;">--}}
            {{--<form method="post" action="{{ route('edit-comment') }}"--}}
            {{--enctype="multipart/form-data">--}}
            {{--<div class="form-group">--}}
            {{--<label>Your Offer (USD) <span--}}
            {{--class="required">*</span></label><input--}}
            {{--class="form-control" name="bid_amount"--}}
            {{--value="{{ $bid->amount }}" type="number"--}}
            {{--placeholder="Offer Amount" required/>--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
            {{--<label>Message <span--}}
            {{--class="required">*</span></label><textarea--}}
            {{--class="form-control" name="bid_description"--}}
            {{--placeholder="Enter your message here"--}}
            {{--required>{{ $bid->comments }}</textarea>--}}
            {{--</div>--}}

            {{--<input type="hidden" name="id" value="{{ $bid->id }}"/>--}}
            {{--<div class="form-group"><input class="btn btn-primary"--}}
            {{--type="submit"--}}
            {{--value="Submit"/></div>--}}
            {{--{{ csrf_field() }}--}}
            {{--</form>--}}
            {{--</div>--}}
            {{--@endif--}}
            {{--@endif--}}


            {{--@if($user_id == $product->user_id)--}}
            {{--<a href="{{ route('discuss', $bid->id) }}"--}}
            {{--class="btn btn-primary ls-modal">Discuss</a>--}}
            {{--@if($product->status == 'Open') <a--}}
            {{--href="{{ route('select-request', $bid->id) }}"--}}
            {{--id="btn-select" class="btn btn-danger">Select Bid</a>--}}
            {{--@endif--}}
            {{--{{ $product->user->ledger_balance() }} {{ $bid->amount }}--}}
            {{--@if ( $product->user->ledger_balance() < $bid->amount )--}}
            {{--Not sufficient funds--}}
            {{--@endif--}}
            {{--@endif--}}


            {{--</div>--}}


            {{--@if($product->status == 'Open' and $user_id == $product->user_id)--}}
            {{--<div class="select-bid"><br /><a href="{{ route('select-request', $bid->id) }}" class="btn btn-danger">Select Bid</a></div>--}}
            {{--@endif--}}


            {{--</div>--}}
            {{--</div>--}}

            {{--@endforeach--}}
            {{--@else--}}

            {{--<p>No comments yet</p>--}}
            {{--@endif--}}

            {{--</div><!-- comments -->--}}
            {{--</div>--}}
            @if($product->status == 'Open' and $user_id != $product->user_id and $user_id != 0 and $product->hasBids($user_id) == 0)
                <div class="row">
                    <div class="col-md-8 col-md-push-2">
                        <div id="offerDiv" class="text-center">
                            <button class="showButton btn btn-primary">Place a Bid</button>
                        </div>
                        <div class="offerDiv" style="display: none;">
                            <h2>Add your offer </h2>
                            <form method="post" action="{{ route('post-comment') }}"
                                  enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Your Offer (USD) <span class="required">*</span></label><input
                                            class="form-control" name="bid_amount" value="0.00" type="number"
                                            placeholder="Offer Amount" required/>
                                </div>
                                <div class="form-group">
                                    <label>Message <span class="required">*</span></label><textarea
                                            class="form-control" name="bid_description"
                                            placeholder="Enter your message here" required></textarea>
                                </div>
                                <div class="form-group"><label>Attachement (optional)</label><input type="file"
                                                                                                    class="form-control"
                                                                                                    name="attachement"/>
                                </div>
                                <input type="hidden" name="id" value="{{ $product->id }}"/>
                                <div class="form-group"><input class="btn btn-primary" type="submit"
                                                               value="Submit"/></div>
                                {{ csrf_field() }}
                            </form>
                        </div>
                        <p>&nbsp;</p>
                    </div>
                </div>
            @endif

        </div>
        {{--</div>--}}
        {{--</div>--}}
    </section>

    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">BringFare</h4>
                </div>
                <div class="modal-body">
                    <p>Loading...</p>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>

        $(document).ready(function () {
            $('#btn-select').click(function (e) {
                e.preventDefault();

                var linkURL = $(this).attr("href");
                console.log(linkURL);

                warnBeforeRedirect(linkURL);
            });

            $('.showButton').click(function (e) {
                e.preventDefault();
                $('html, body').animate({scrollTop: $("#offerDiv").offset().top}, 1500);
                $('.offerDiv').show(1000);
            });

            $('.edit-comment-btn').click(function (e) {
                e.preventDefault();
                $('.edit-comment').show(1000);
            });

            function warnBeforeRedirect(linkURL) {
                swal({
                    title: "Are you sure?",
                    text: "This bid will be selected for product.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, select it!'

                }).then(function () {
                    console.log('done');
                    window.location.href = linkURL;
                });
            }
        });

        $(document).ready(function () {

            jQuery('.ls-modal').on('click', function (e) {
                e.preventDefault();
                jQuery('#myModal').modal('show').find('.modal-body').load(jQuery(this).attr('href'));
            });

//            $('#followers-select').selectize({
//                maxItems: null,
//                valueField: 'id',
//                labelField: 'title',
//                searchField: 'title',
//                options: [
//                    {id: 1, title: 'Spectrometer', url: 'http://en.wikipedia.org/wiki/Spectrometers'},
//                    {id: 2, title: 'Star Chart', url: 'http://en.wikipedia.org/wiki/Star_chart'},
//                    {id: 3, title: 'Electrical Tape', url: 'http://en.wikipedia.org/wiki/Electrical_tape'}
//                ],
//                create: false
//            });

        });


    </script>
@endsection