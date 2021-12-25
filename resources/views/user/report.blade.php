@extends('layouts.modal')

@section('title')
    Admin Dashboard
@endsection

@section('pageHeading')
    User Dashboard
@endsection

@section('content')
    <section id="page-inner" class="header-margin">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2><i class="fa fa-envelope"></i> Report </h2>
                </div>

                <div class="col-md-12">
                    <h3 class="inline"><i class="fa fa-list-ul"></i> Please help us with your feedback </h3>
                    {{-- <div class="filterby">Filter by <select></select></div> --}}

                    <form method="post" action="{{ route('post-report') }}">
                        <div class="form-group">
                            <label>Type</label>
                            {{ Form::select('report_type', $report_types, null, ['placeholder' => 'Please select type...','class' => 'form-control', 'required', 'id' => 'rtype']) }}

                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea name="message" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary">
                            <input type="hidden" name="id" value="{{ $id }}">
                            <input type="hidden" name="id2" value="{{ $id2 }}">
                            <input type="hidden" name="id3" value="{{ $id3 }}">
                            {{ csrf_field() }}
                        </div>
                    </form>


                </div>
            </div>
        </div>


    </section>

@endsection