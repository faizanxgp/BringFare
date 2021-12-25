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
                <div class="col-md-10 col-md-push-1">
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            {!! Session::get('flash_message') !!}
                        </div>
                    @endif
                    <h2><i class="fa fa-gift"></i> Post Request </h2>
                    <form method="post" action="{{ route('add-request') }}" enctype="multipart/form-data">
                        <section class="input-section-group">
                            <h3>1. Items Details</h3>

                            <div class="row">
                                <div class="col-md-6">


                                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <div class="">
                                            {{--<label>Item Name <span class="required">*</span></label> --}}
                                            <input name="name" class="form-control" type="text"
                                                   placeholder="Enter item name in full *"
                                                   value="{{ $product->item_name or old('name') }}" required/>
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                            			<strong>{{ $errors->first('name') }}</strong>
                          			</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->has('qty') ? ' has-error' : '' }}">
                                        <div class="">
                                            {{--<label>Quantity <span class="required">*</span></label> --}}
                                            <input name="qty" class="form-control" type="number"
                                                   placeholder="Item Qty * e.g 1,2,3"
                                                   value="{{ $product->qty or old('qty') }}" required/>
                                            @if ($errors->has('qty'))
                                                <span class="help-block">
                            			<strong>{{ $errors->first('qty') }}</strong>
                          			</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('category') ? ' has-error' : '' }}">
                                        <div class="">
                                            {{--<label>Category <span--}}
                                            {{--class="required">*</span></label> --}}
                                            {{ Form::select('category', $categories, $product->category_id, ['placeholder' => 'Please select category...','class' => 'form-control', 'required', 'id' => 'category']) }}
                                            @if ($errors->has('category'))
                                                <span class="help-block">
                            			<strong>{{ $errors->first('category') }}</strong>
                          			</span>
                                            @endif
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                        <div class="">
                                            {{--<label>Item Description <span class="required">*</span></label> --}}
                                            <textarea style="height: 133px;" name="description" class="form-control"
                                                      placeholder="Describe your item * e.g. size, quantity, colour, packaging, how to buy"
                                                      required>{{ $product->item_description or old('description') }}</textarea>
                                            @if ($errors->has('description'))
                                                <span class="help-block">
                            			<strong>{{ $errors->first('description') }}</strong>
                          			</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('photo') ? ' has-error' : '' }}">
                                        <div class="">
                                            {{--<label>Upload Picture <span class="required">*</span></label> --}}
                                            <input name="photo" class="form-control" type="file"
                                                   placeholder="Product Image *"/> <input type="hidden" name="photo_old"
                                                                                          value="{{ $product->image }}"/>

                                            @if ($errors->has('photo'))
                                                <span class="help-block">
                            			<strong>{{ $errors->first('photo') }}</strong>
                          			</span>
                                            @endif
                                            @if($product->image != "")
                                                <div class="img-border"><img
                                                            src="{{ URL::to('/uploads/products/' . $product->image) }}"
                                                            alt=""/></div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('url') ? ' has-error' : '' }}">
                                        <div class="">
                                            {{--<label>URL </label> --}}
                                            <input name="url" class="form-control" type="text"
                                                   placeholder="Product URL (optional)"
                                                   value="{{ $product->url or old('url') }}"/>
                                            @if ($errors->has('url'))
                                                <span class="help-block">
                            			<strong>{{ $errors->first('url') }}</strong>
                          			</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('require_date') ? ' has-error' : '' }}">
                                        <div class="">
                                            {{--<label>Deliver by <span class="required">*</span> </label> --}}
                                            <input name="require_date" class="form-control" type="text"
                                                   placeholder="Product require before this date *"
                                                   value="{{ $product->require_date or old('require_date') }}"
                                                   id="datepicker1" required/>
                                            @if ($errors->has('require_date'))
                                                <span class="help-block">
                            			<strong>{{ $errors->first('require_date') }}</strong>
                          			</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="">
                                            <div class="col-md-3">
                                                <label>Visiblity</label>
                                            </div>
                                            <div class="col-md-9">
                                                <label> <input type="radio" name="request_type"
                                                               value="1" {{ ($product->request_type == '1' ? 'checked' : '') }}>
                                                    Public (everyone can see it) </label><br/>
                                                <label><input type="radio"
                                                              name="request_type"
                                                              value="0" {{ ($product->request_type == '0' ? 'checked' : '') }}>
                                                    Private (only invited members can see it) </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="input-section-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>2. Purchase in </h3>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
                                        <div class="">
                                            {{--<label>Country to buy from <span--}}
                                            {{--class="required">*</span></label> --}}
                                            {{ Form::select('country', $countries, $product->country, ['class' => 'form-control', 'placeholder' => 'Please select country ...', 'required', 'id' => 'country']) }}
                                            @if ($errors->has('country'))
                                                <span class="help-block">
                            			<strong>{{ $errors->first('country') }}</strong>
                          			</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="input-section-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>3. Delivery required in </h3>
                                </div>
                                <div class="col-md-6">


                                    <div class="form-group {{ $errors->has('dcountry') ? ' has-error' : '' }}">
                                        <div class="">
                                            {{--<label>Country <span--}}
                                            {{--class="required">*</span></label> --}}
                                            {{ Form::select('dcountry', $countries, $product->dcountry, ['class' => 'form-control', 'placeholder' => 'Please select country...', 'required', 'id' => 'dcountry']) }}
                                            @if ($errors->has('dcountry'))
                                                <span class="help-block">
                            			<strong>{{ $errors->first('dcountry') }}</strong>
                          			</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group {{ $errors->has('dcity') ? ' has-error' : '' }}">
                                        <div class="">
                                            {{--<label>City <span class="required">*</span></label> --}}
                                            <input name="dcity" class="form-control" type="text" placeholder="City "
                                                   value="{{ $product->dcity or old('dcity') }}" required/>
                                            @if ($errors->has('dcity'))
                                                <span class="help-block">
                            			<strong>{{ $errors->first('dcity') }}</strong>
                          			</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="input-section-group">
                            <div class="row">
                                <div class="col-md-12">

                                    <h3>4. Package Description</h3>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="">
                                            <label>Perishable</label> <label><input type="radio" name="perishable"
                                                                                    value="1" {{ ($product->perishable == '1' ? 'checked' : '') }}>
                                                Yes </label> <label><input type="radio" name="perishable"
                                                                           value="0" {{ ($product->perishable == '0' ? 'checked' : '') }}>
                                                No </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="">
                                            <label>Fragile</label> <label><input type="radio" name="fragile"
                                                                                 value="1" {{ ($product->fragile == '1' ? 'checked' : '') }}>
                                                Yes </label> <label><input type="radio" name="fragile"
                                                                           value="0" {{ ($product->fragile == '0' ? 'checked' : '') }}>
                                                No </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group {{ $errors->has('package_size') ? ' has-error' : '' }}">
                                        <div class="">
                                            {{--<label>Package Size</label> --}}
                                            {{ Form::select('package_size', $package_sizes, $product->package_size, ['class' => 'form-control', 'placeholder' => 'Package size ...', 'required']) }}
                                            @if ($errors->has('package_size'))
                                                <span class="help-block">
                            			<strong>{{ $errors->first('package_size') }}</strong>
                          			</span>
                                            @endif
                                        </div>
                                    </div>
                                    {{--<div class="form-group {{ $errors->has('delivery_method') ? ' has-error' : '' }}">--}}
                                    {{--<div class="">--}}
                                    {{--<label>Delivery Method</label> {{ Form::select('delivery_method', $delivery_methods, $product->delivery_method, ['class' => 'form-control']) }}--}}
                                    {{--@if ($errors->has('delivery_method'))--}}
                                    {{--<span class="help-block">--}}
                                    {{--<strong>{{ $errors->first('delivery_method') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                        </section>
                        <section class="input-section-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>5. Price</h3>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
                                        <div class="">
                                            {{--<label>Estimated Price (USD) <span class="required">*</span></label>--}}
                                            <input name="price" type="number" class="form-control"
                                                   value="{{ $product->price or old('price') }}"
                                                   placeholder="Estimated Price (USD) *" required/>
                                            @if ($errors->has('price'))
                                                <span class="help-block">
                            			<strong>{{ $errors->first('price') }}</strong>
                          			</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 pull-right">


                                    <div class="form-group">
                                        <div class="">
                                            <input type="hidden" name="id" value="{{ $product->id }}"/> <input
                                                    class="btn btn-primary" type="submit" value="Submit Your Request"/>
                                            {{ csrf_field() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection