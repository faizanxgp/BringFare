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
                            <h3 class="box-title">Categories</h3>


                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-striped">
                                <tr>
                                    <th>Category</th>

                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->category }}</td>

                                        <td>{{ $category->created_at }}</td>
                                        <td><a href="{{ route('admin.category', $category->id) }}" class="btn btn-primary">Edit</a></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4">{{ $categories->links() }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection
