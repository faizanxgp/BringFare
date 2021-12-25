@extends('layouts.modal')

@section('title')
    Admin Dashboard
@endsection

@section('pageHeading')
    User Dashboard
@endsection

@section('content')
    <section id="modal" class="header-margin-zero">

        <div class="">
            <div class="">
                <div class="message-height" style="max-height: 400px; overflow: scroll;">
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            {!! Session::get('flash_message') !!}
                        </div>
                    @endif
                    <h2><i class="fa fa-gift"></i> Discuss Details </h2>
                    <h3>Product: <a href="">{{ $product->item_name }} (Status: {{ $product->status }})</a> by <a href="">{{ $product->user->name }}</a></h3>
                    <h4>Bid: {{ $bid->comments }} for {{ $bid->amount }} - Bid Status: {{ $bid->status }} by <a href="">{{ $bid->user->name }}</a></h4>
                    <p><a href="#">Guidelines for communication. Please read.</a></p>
                    <div class="actions">
                        <div class="form-group">
                        @if ($user_id == $product->user->id)
                            <!-- buyer -->
                                <form method="post" action="{{ route('bid-status') }}">
                                    <input type="hidden" name="bid_id" value="{{ $bid->id }}"/>
                                    @if($product->status == 'Awarded')
                                        <label>Change Status to: </label>
                                        <input type="hidden" name="status" value="Pending Purchase"/>
                                        <input id="btn-funded" class="btn btn-danger" type="submit" value="Add Funds"/>
                                    @endif
                                    @if($product->status == 'Pending Acknowledgment')
                                        <label>Change Status to: </label>
                                        <input type="hidden" name="status" value="Completed"/>
                                        <input id="btn-acknowledge" class="btn btn-danger" type="submit" value="Received"/>
                                    @endif
                                    @if($product->status == 'Completed')
                                        <label>Change Status to: </label>
                                        <input type="hidden" name="status" value="Rate"/>
                                        <input id="btn-rate" class="btn btn-danger" type="submit" value="Rate your Experience"/>
                                    @endif
                                    {{ csrf_field() }}
                                </form>

                        @endif
                        @if ($user_id == $bid->user->id)
                            <!-- seller -->
                                <form method="post" action="{{ route('bid-status') }}">
                                    <input type="hidden" name="bid_id" value="{{ $bid->id }}"/>
                                    @if($product->status == 'Pending Purchase')
                                        <label>Change Status to: </label>
                                        <input type="hidden" name="status" value="Pending Delivery"/>
                                        <input id="btn-purchased" class="btn btn-danger" type="submit" value="Product Purchased"/>
                                    @endif
                                    @if($product->status == 'Pending Delivery')
                                        <label>Change Status to: </label>
                                        <input type="hidden" name="status" value="Pending Acknowledgment"/>
                                        <input id="btn-delivered" class="btn btn-danger" type="submit" value="Delivered"/>
                                    @endif
                                    @if($product->status == 'Completed')
                                        <label>Change Status to: </label>
                                        <input type="hidden" name="status" value="Rate"/>
                                        <input id="btn-rate-2" class="btn btn-danger" type="submit" value="Rate your Experience"/>
                                    @endif
                                    {{ csrf_field() }}
                                </form>
                            @endif

                        </div>
                    </div>


                    @foreach($comments as $comment)
                        <div class="discuss-message @if($comment->comment_by=='Buyer') align-right discuss-buyer @else discuss-seller @endif">
                            <a href="">{{ $comment->user->name or 'NotFound' }}</a>
                            <i>{{ $comment->created_at }}</i><br/><br/>{{ $comment->comments }} @if($comment->attachement)<br/><a class="" href="{{ URL::to('/uploads/comments/' . $comment->attachement) }}" target="_blank"><img
                                        src="{{ URL::to('/uploads/comments/' . $comment->attachement) }}" class="thumbnail"/></a>@endif </div>
                    @endforeach
                    <form method="post" action="{{ route('add-discuss') }}" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Add Comment</label> <textarea class="form-control" name="comment" required></textarea>
                        </div>
                        <div class="form-group"><label>Attachement (optional)</label><input type="file" class="form-control" name="attachement"/></div>
                        <input type="hidden" name="bid_id" value="{{ $bid->id }}"/>

                        <input class="btn btn-primary" type="submit" value="Add Comment"/>
                        <p>&nbsp;</p>
                        {{ csrf_field() }}

                    </form>

                </div>
            </div>
        </div>
    </section>

@endsection


@section('js')

    <script>
        $(document).ready(function () {

            // button add funds
            $('#btn-funded').on('click', function (e) {
                e.preventDefault();

                var form = $(this).parents('form');
                swal({
                    title: "Are you sure?",
                    text: "This will Add Funds in Escrow",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, Continue!",
                    closeOnConfirm: false
                }).then(
                        function (isConfirm) {
                            console.log('confirmed');
                            if (isConfirm) form.submit();
                        },
                        function () {
                            console.log('cancel');
                        }
                );

            });

            // button acknowledge
            $('#btn-acknowledge').on('click', function (e) {
                e.preventDefault();

                var form = $(this).parents('form');
                swal({
                    title: "Are you sure?",
                    text: "This will confirm you have received product.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, Continue!",
                    closeOnConfirm: false
                }).then(
                        function (isConfirm) {
                            console.log('confirmed');
                            if (isConfirm) form.submit();
                        },
                        function () {
                            console.log('cancel');
                        }
                );

            });

            // button acknowledge
            $('#btn-rate').on('click', function (e) {
                e.preventDefault();

                var form = $(this).parents('form');
                swal({
                    title: "Are you sure?",
                    text: "This will add your rating for provider.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, Continue!",
                    closeOnConfirm: false
                }).then(
                        function (isConfirm) {
                            console.log('confirmed');
                            if (isConfirm) form.submit();
                        },
                        function () {
                            console.log('cancel');
                        }
                );

            });

            // button acknowledge
            $('#btn-purchased').on('click', function (e) {
                e.preventDefault();

                var form = $(this).parents('form');
                swal({
                    title: "Are you sure?",
                    text: "This will confirm that product has been purchased.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, Continue!",
                    closeOnConfirm: false
                }).then(
                        function (isConfirm) {
                            console.log('confirmed');
                            if (isConfirm) form.submit();
                        },
                        function () {
                            console.log('cancel');
                        }
                );

            });

            // button acknowledge
            $('#btn-purchased').on('click', function (e) {
                e.preventDefault();

                var form = $(this).parents('form');
                swal({
                    title: "Are you sure?",
                    text: "This will confirm that product has been purchased.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, Continue!",
                    closeOnConfirm: false
                }).then(
                        function (isConfirm) {
                            console.log('confirmed');
                            if (isConfirm) form.submit();
                        },
                        function () {
                            console.log('cancel');
                        }
                );

            });

            // button acknowledge
            $('#btn-delivered').on('click', function (e) {
                e.preventDefault();

                var form = $(this).parents('form');
                swal({
                    title: "Are you sure?",
                    text: "This will confirm that product has been delivered.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, Continue!",
                    closeOnConfirm: false
                }).then(
                        function (isConfirm) {
                            console.log('confirmed');
                            if (isConfirm) form.submit();
                        },
                        function () {
                            console.log('cancel');
                        }
                );

            });

            // button acknowledge
            $('#btn-rate-2').on('click', function (e) {
                e.preventDefault();

                var form = $(this).parents('form');
                swal({
                    title: "Are you sure?",
                    text: "This will add your rating for buyer.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, Continue!",
                    closeOnConfirm: false
                }).then(
                        function (isConfirm) {
                            console.log('confirmed');
                            if (isConfirm) form.submit();
                        },
                        function () {
                            console.log('cancel');
                        }
                );

            });


        });
    </script>
@endsection