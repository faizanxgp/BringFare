@extends('layouts.main')

@section('title')
    Admin Dashboard
@endsection

@section('pageHeading')
    User Dashboard
@endsection

@section('content')
    <section id="page-inner" class="header-margin">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><i class="fa fa-envelope"></i> Contact us </h2>
                </div>
                <div class="col-md-8">
                    <h3 class="inline"><i class="fa fa-list-ul"></i> We are listening </h3>
                    {{-- <div class="filterby">Filter by <select></select></div> --}}
                    <h3>Instructions</h3>
                    <p>Please contact us with your queries or problems, our representative would respond you quickly.</p>

                    <form method="post" action="{{ route('post-message') }}">
                        <div class="form-group">
                            <label>Subject</label>
                            <select name="subject" class="form-control">
                                <option>Payments</option>
                                <option>Account</option>
                                <option>Request</option>
                                <option>Bid</option>
                                <option>Others</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea name="message" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary">
                            {{ csrf_field() }}
                        </div>
                    </form>

                </div>

        </div>
</div>

    </section>

@endsection