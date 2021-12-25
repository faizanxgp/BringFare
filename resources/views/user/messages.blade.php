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

                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Status</th>

                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($messages as $message)
                                    <tr>

                                        <td>{{ $message->subject }}</td>
                                        <td>{{ $message->message }}</td>
                                        <td>@if( $message->is_new == 0) Yes @else No @endif</td>

                                        <td>{{ $message->created_at }}</td>
                                        <td><a href="{{ route('message', $message->id) }}" class="btn btn-primary">Reply</a></td>
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
