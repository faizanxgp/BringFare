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
            <div class="row request-title">
                <div class="col-md-12">
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            {!! Session::get('flash_message') !!}
                        </div>
                    @endif

                </div>
            </div>
            <div class="row request-section">
                <div class="col-md-12 ">
                    <div class="row request-details">
                        <div class="col-md-6">
                            <div class="">
                                <h1><a href="{{ route('profile', $user->id) }}">{{ $user->name }}</a></h1>
                                <p></p><a href="{{ route('admin.ledger', $user->id) }}" class="btn btn-primary">Ledger</a>
                            </div>
                            <div class="details">
                                <div class="user-details">
                                    {{--<b>Requested by </b><br/><br/>--}}
                                    <div class="user-img inline">
                                        @if($user->image == "")
                                            <img class="img-circle user-img1" style="margin-top: 10px;" src="{{ URL::to('src/images/users/user1.jpg') }}" alt=""/>
                                        @else
                                            <img class="img-circle user-img1" style="margin-top: 10px;" src="{{ URL::to('/uploads/users/' . $user->image) }}" alt=""/>
                                        @endif
                                    </div>
                                    <div class="title-img inline">Member since {{ $user->created_at }} <br/></div>
                                    <div><h3>About</h3>{{ $user->about }}</div>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <h2>Reviews </h2>
                                </div>
                                <div class="col-md-6">

                                    <h4>Buyer: <span class="badge">{{ $user->reviews_buyer() }}</span></h4>
                                    <h4>Avg. Rating:
                                        <div class="rateit" data-rateit-value="{{ $user->rating_buyer() }}" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                                    </h4>

                                </div>
                                <div class="col-md-6">
                                    <h4>Seller: <span class="badge">{{ $user->reviews_seller() }}</span></h4>
                                    <h4>Avg. Rating:
                                        <div class="rateit" data-rateit-value="{{ $user->rating_seller() }}" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                                    </h4>

                                </div>
                            </div>


                        </div>

                        <div class="col-md-6">
                            <div class="comments ">
                                <h3>Products</h3>
                                <div class="separator"></div>
                                @if( !$products->isEmpty() )
                                    <table class="table messages">
                                        <tr>
                                            <th>Product</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach($products as $product)
                                            <tr>
                                                <td><a class="" href="{{ route('admin.product', $product->id) }}">{{ $product->item_name }}</a></td>
                                                <td>{{ $product->status }}</td>
                                                <td>{{ $product->created_at }}</td>
                                                <td><a href="{{ route('admin.product', $product->id) }}" class="btn btn-primary">Edit</a></td>
                                            </tr>
                                        @endforeach

                                    </table>
                                @else

                                    <p>No Requests yet</p>
                                @endif
                            </div>

                            <div class="comments ">
                                <h3>Bids</h3>
                                <div class="separator"></div>
                                @if( !$bids->isEmpty() )
                                    <table class="table messages">
                                        <tr>
                                            <th>Comment</th>
                                            <th>Status</th>

                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach($bids as $bid)
                                            <tr>
                                                <td><a class="" href="{{ route('admin.product', $bid->product_id) }}">{{ $bid->comments }}</a></td>
                                                <td><a href="#">{{ $bid->status }}</a></td>

                                                <td>{{ $bid->created_at }}</td>
                                                <td><a href="{{ route('admin.product', $bid->product_id) }}" class="btn btn-primary">Edit</a></td>
                                            </tr>
                                        @endforeach

                                    </table>
                                @else

                                    <p>No Bids yet</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        jQuery('.ls-modal').on('click', function (e) {
            e.preventDefault();
            jQuery('#myModal').modal('show').find('.modal-body').load(jQuery(this).attr('href'));
        });
    </script>
@endsection