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
                            <h3 class="box-title">Messages</h3>


                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-striped">
                                <tr>
                                    <th>User</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Status</th>

                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($messages as $message)
                                    <tr>
                                        <td><a href="@if($message->user) {{ route('admin.user', $message->user->id) }} @else # @endif">{{ $message->user->name or 'Admin' }}</a></td>
                                        <td>{{ $message->subject }}</td>
                                        <td>{{ $message->message }}</td>
                                        <td>@if( $message->is_new == 0) Yes @else No @endif</td>

                                        <td>{{ $message->created_at }}</td>
                                        <td><a href="{{ route('admin.message', $message->id) }}" class="btn btn-primary">Reply</a></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4">{{ $messages->links() }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection
