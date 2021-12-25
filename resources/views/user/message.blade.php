@extends('layouts.main')

@section('title')
    Admin Dashboard
@endsection

@section('pageHeading')
    User Dashboard
@endsection

@section('content')
    <section id="page-inner" class="header-margin inbox">
        <div class="container">
            <div class="row white-bg">
                <div class="col-md-12">
                    <h2><i class="fa fa-envelope"></i> Message Thread </h2>
                </div>

                <div class="col-md-12 messages">
                    @foreach($thread as $message)
                        <div class="message">
                            <div class="title"><h4>{{ $message->subject }}</h4> by {{ $message->user->name or 'Admin' }} at <i>{{ $message->created_at }}</i></div>
                            <div class="message-body"><br/>{{ $message->message }} <br/></div>
                            <div class="amount"> Amount: <strong>{{ $message->amount }}</strong></div>
                        </div>



                    @endforeach
                    <form method="post" action="{{ route('reply-message') }}">
                        <h4>Reply</h4>
                        <div class="form-group">
                            <textarea name="message" class="form-control"></textarea>
                        </div>

                        <div class="form-group">

                            <input type="hidden" name="message_id" value="{{ $message_id }}"/>
                            <input class="btn btn-primary" type="submit" value="Submit"/>
                            {{ csrf_field() }}
                        </div>

                    </form>
                    {{--<form method="post" action="{{ route('admin.update-category') }}" enctype="multipart/form-data">--}}

                    {{--<div class="form-group {{ $errors->has('category') ? ' has-error' : '' }}">--}}
                    {{--<div class="">--}}
                    {{--<label>Category Name <span class="required">*</span></label> <input name="category" class="form-control" type="text" placeholder="Enter category name in full" value="{{ $category->category or old('category') }}"/>--}}
                    {{--@if ($errors->has('category'))--}}
                    {{--<span class="help-block">--}}
                    {{--<strong>{{ $errors->first('category') }}</strong>--}}
                    {{--</span>--}}
                    {{--@endif--}}
                    {{--</div>--}}
                    {{--</div>--}}


                    {{--<div class="form-group">--}}
                    {{--<div class="">--}}
                    {{--<input type="hidden" name="id" value="{{ $category->id }}"/>--}}
                    {{--<input class="btn btn-primary" type="submit" value="Submit"/>--}}
                    {{--{{ csrf_field() }}--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--</form>--}}
                </div>
            </div>
        </div>


    </section>
@endsection
