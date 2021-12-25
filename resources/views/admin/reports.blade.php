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
                            <h3 class="box-title">Abuse Reports</h3>
                            @if(Session::has('flash_message'))
                                <div class="alert alert-success">
                                    {!! Session::get('flash_message') !!}
                                </div>
                            @endif

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-striped">
                                <tr>
                                    <th>By User</th>

                                    <th>About</th>
                                    <th>Type</th>
                                    <th>Comments</th>

                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($reports as $report)
                                    <tr>
                                        <td><a href="{{ route('admin.user', $report->user->id or 0) }}">{{ $report->user->name }}</a></td>
                                        <td>
                                            @if( $report->bid_id == 0 and $report->comment_id == 0)
                                                Product -- posted by <a href="{{ route('admin.user', $report->product->user->id) }}">{{ $report->product->user->name }}</a> -- <a href="{{ route('admin.product', $report->product_id) }}">Open</a>
                                            @elseif( $report->comment_id == 0)
                                                Bid -- posted by @if($report->bid) <a href="{{ route('admin.user', $report->bid->user->id or 0) }}">{{ $report->bid->user->name or '' }}</a> --
                                                <a href="{{ route('admin.product', $report->product_id) }}">Open</a>@endif
                                            @else
                                                Comment -- <a href="">Check</a>
                                            @endif
                                        </td>
                                        <td>{{ $report->report_type }}</td>
                                        <td>{{ $report->comments }}</td>

                                        <td>{{ $report->created_at }}</td>
                                        <td>
                                            @if( $report->bid_id == 0 and $report->comment_id == 0)
                                                <a href="{{ route('admin.product-suspend', $report->product_id) }}" class="btn btn-primary">Suspend Product</a> <a href="{{ route('admin.user-suspend', $report->product->user->id) }}" class="btn btn-primary">Suspend User</a>
                                            @elseif( $report->comment_id == 0)
                                                @if($report->bid)
                                                    <a href="{{ route('admin.bid-delete', $report->bid_id) }}" class="btn btn-primary">Delete Bid</a> <a href="{{ route('admin.user-suspend', $report->bid->user->id or 0) }}" class="btn btn-primary">Suspend User</a>
                                                @endif
                                            @else
                                                <a href="{{ route('admin.suspend-user', $report->id) }}" class="btn btn-primary">Suspend User</a>
                                            @endif


                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4">{{ $reports->links() }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection
