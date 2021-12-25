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
            <div class="row">
                {{--<div class="col-md-12">--}}
                {{--<h2><i class="fa fa-envelope"></i> Users </h2>--}}
                {{--</div>--}}
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Ledger of <a href="{{ route('profile', $user->id) }}">{{ $user->name }}</a></h3>
                            <h4 class="pull-right">Account Balance: USD {{ $user->ledger_balance() }}</h4>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-striped">
                                <tr>
                                    <th>Narration</th>
                                    <th>Amount</th>
                                    <th>Auth Code</th>
                                    <th>Trans Id</th>

                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($ledgers as $ledger)
                                    <tr>
                                        <td>{{ $ledger->narration }}</td>
                                        <td>{{ $ledger->amount }}</td>
                                        <td>{{ $ledger->auth_code }}</td>
                                        <td>{{ $ledger->trans_id }}</td>

                                        <td>{{ $ledger->created_at }}</td>
                                        <td><a href="{{ route('admin.ledger-delete', $ledger->id) }}" class="btn btn-primary">Delete</a></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4">{{ $ledgers->links() }}</td>
                                </tr>
                            </table>

                            <div class="row">
                                <form method="post" action="{{ route('admin.update-ledger') }}" enctype="multipart/form-data">
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('auth_code') ? ' has-error' : '' }}">
                                            <div class="">
                                                <label>Auth Code <span class="required">*</span></label> <input name="auth_code" class="form-control" type="text" placeholder="Enter authentication code" value=""/>
                                                @if ($errors->has('auth_code'))
                                                    <span class="help-block">
                            			        <strong>{{ $errors->first('auth_code') }}</strong>
                          			        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('trans_id') ? ' has-error' : '' }}">
                                            <div class="">
                                                <label>Trans Id <span class="required">*</span></label> <input name="trans_id" class="form-control" type="text" placeholder="Enter transaction id" value=""/>
                                                @if ($errors->has('trans_id'))
                                                    <span class="help-block">
                            			        <strong>{{ $errors->first('trans_id') }}</strong>
                          			        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('amount') ? ' has-error' : '' }}">
                                            <div class="">
                                                <label>Amount (USD) <span class="required">*</span></label> <input name="amount" class="form-control" type="text" placeholder="Enter amount in USD" value=""/>
                                                @if ($errors->has('amount'))
                                                    <span class="help-block">
                            			        <strong>{{ $errors->first('amount') }}</strong>
                          			        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group {{ $errors->has('narration') ? ' has-error' : '' }}">
                                            <div class="">
                                                <label>Narration <span class="required">*</span></label> <input type="text" name="narration" class="form-control" placeholder="Enter narration"/>
                                                @if ($errors->has('narration'))
                                                    <span class="help-block">
                            			        <strong>{{ $errors->first('narration') }}</strong>
                          			        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <div class="">
                                                <input type="hidden" name="user_id" value="{{ $user->id }}"/>
                                                <input type="hidden" name="id" value=""/>
                                                <input class="btn btn-primary" type="submit" value="Submit"/>
                                                {{ csrf_field() }}
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{--<div class="">--}}
        {{--<div class="row">--}}
        {{--<div class="col-md-12">--}}
        {{--<h2><i class="fa fa-envelope"></i> Ledger </h2>--}}
        {{--</div>--}}

        {{--<div class="col-md-12 messages">--}}

        {{--<form method="post" action="{{ route('admin.reply-message') }}">--}}
        {{--<h4>Reply</h4>--}}
        {{--<div class="form-group">--}}
        {{--<textarea name="message" class="form-control"></textarea>--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}

        {{--<input type="hidden" name="message_id" value="{{ $message_id }}"/>--}}
        {{--<input class="btn btn-primary" type="submit" value="Submit"/>--}}
        {{--{{ csrf_field() }}--}}
        {{--</div>--}}

        {{--</form>--}}
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
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}


    </section>
@endsection
