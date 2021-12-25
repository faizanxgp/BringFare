@extends('layouts.main')

@section('content')
    <section id="page" class="header-margin">

        <div class="container">
            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
            @endif
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12 content-box ">
                    {!! $page->description !!}
                </div>
                <div style="clear: both"></div>
            </div>
        </div>

    </section>
@endsection