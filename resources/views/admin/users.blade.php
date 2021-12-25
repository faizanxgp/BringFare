@extends('layouts.admin')

@section('title')
    Admin Dashboard
@endsection

@section('pageHeading')
    Admin Maangement
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
                            <h3 class="box-title">Users</h3>

                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 250px;">
                                    <form method="get" action="{{ route('admin.users') }}">
                                        <input type="text" name="search" class="form-control pull-right" placeholder="Search ID or Email">

                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-striped">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Verfied</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($users as $usr)
                                    <tr>
                                        <td><a class="" href="{{ route('admin.user', $usr->id) }}">{{ $usr->name }}</a></td>
                                        <td>{{ $usr->email }}</td>
                                        <td>{{ $usr->phone }}</td>
                                        <td>@if($usr->status == 1) Active @else Inactive @endif</td>
                                        <td>@if($usr->verified == 1) Verified @else Pending @endif</td>
                                        <td>{{ $usr->created_at }}</td>
                                        <td><a href="{{ route('profile', $usr->id) }}" class="btn btn-primary">Profile</a> <a href="{{ route('admin.ledger', $usr->id) }}" class="btn btn-primary">Ledger</a> <a href="{{ route('admin.user-status', $usr->id) }}" class="btn btn-primary">@if($usr->status == 1) Suspend @else Activate @endif</a></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4">{{ $users->links() }}</td>
                                </tr>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>


            </div>
        </div>


    </section>

@endsection
