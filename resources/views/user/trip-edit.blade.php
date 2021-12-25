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
			<form method="post" action="{{ route('add-trip') }}">
				<div class="row">
					<div class="col-md-10 col-md-push-1">
						<h2><i class="fa fa-plane"></i> Post Trip </h2>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
									<div class="">
										<label>From Country </label> {{ Form::select('country', $countries, $trip->country, ['placeholder' => 'Please select...', 'class' => 'form-control', 'id' => 'country']) }}
										@if ($errors->has('country'))
											<span class="help-block">
												<strong>{{ $errors->first('country') }}</strong>
											</span>
										@endif
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group {{ $errors->has('fromdate') ? ' has-error' : '' }}">
									<div class="">
										<label>Departure Date </label> <input name="fromdate" class="form-control" type="text" placeholder="YYYY-MM-DD" value="{{ $trip->from_date or old('fromdate') }}" id="datepicker1"/>
										@if ($errors->has('fromdate'))
											<span class="help-block">
                            			<strong>{{ $errors->first('fromdate') }}</strong>
                          			</span>
										@endif
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group {{ $errors->has('country_to') ? ' has-error' : '' }}">
									<div class="">
										<label>To Country </label> {{ Form::select('country_to', $countries, $trip->country_to, ['placeholder' => 'Please select...', 'class' => 'form-control', 'id' => 'dcountry']) }}
										@if ($errors->has('country_to'))
											<span class="help-block">
												<strong>{{ $errors->first('country_to') }}</strong>
											</span>
										@endif
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group {{ $errors->has('uptodate') ? ' has-error' : '' }}">
									<div class="">
										<label>Return Date</label> <input name="uptodate" class="form-control" type="text" placeholder="YYYY-MM-DD" value="{{ $trip->upto_date or old('uptodate') }}" id="datepicker2"/>
										@if ($errors->has('uptodate'))
											<span class="help-block">
                            			<strong>{{ $errors->first('uptodate') }}</strong>
                          			</span>
										@endif
									</div>
								</div>

							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<div class="">
										<label>Trip Type</label><br/> <label><input type="radio" name="trip_type" value="Return" {{ ($trip->trip_type == 'Return' ? 'checked' : '') }}> Return </label> <label><input type="radio" name="trip_type"
													value="One Way" {{ ($trip->trip_type == 'One Way' ? 'checked' : '') }}> One Way </label>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<div class="">
										<label>Budget in USD (Optional)</label> <input name="budget" class="form-control" type="text" placeholder="Your budget (optional)" value="{{ $trip->budget or old('budget') }}"/>
										{{--@if ($errors->has('returndate'))--}}
										{{--<span class="help-block">--}}
										{{--<strong>{{ $errors->first('returndate') }}</strong>--}}
										{{--</span>--}}
										{{--@endif--}}
									</div>

								</div>
							</div>
							<div class="col-md-6">

								<div class="form-group {{ $errors->has('notes') ? ' has-error' : '' }}">
									<div class="">
										<label>Visit Description</label> <textarea name="notes" class="form-control" placeholder="Describe your visit details, cities etc">{{ $trip->notes or old('notes') }}</textarea>
										@if ($errors->has('notes'))
											<span class="help-block">
                            			<strong>{{ $errors->first('notes') }}</strong>
                          			</span>
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="addLocations col-md-10 col-md-push-1">
						<div class="row">
							<div class="col-md-12">
								<h3>Transit Stops</h3>

							</div>
						</div>
						<div class="row child1">
							<div class="col-md-3">
								<div class="form-group">
									 <lable>City</lable><input type="text" class="form-control" name="city_transit[]" value="{{ $transit[0]['city'] or '' }}"/>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Country</label>
									{{ Form::select('country_transit[]', $countries, $transit[0]['country'] or '', ['placeholder' => 'Please select...', 'class' => 'form-control']) }}
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>From Date</label> <input name="fromDate[]" class="form-control datepickerfield" type="text" placeholder="YYYY-MM-DD" value="{{ $transit[0]['from_date'] }}"/>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Upto Date</label> <input name="uptoDate[]" class="form-control datepickerfield" type="text" placeholder="YYYY-MM-DD" value="{{ $transit[0]['upto_date'] }}"/>
								</div>
							</div>
						</div>
						<div class="row child2">
							<div class="col-md-3">
								<div class="form-group">
									 <input type="text" class="form-control" name="city_transit[]" value="{{ $transit[1]['city'] or '' }}"/>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">

									{{ Form::select('country_transit[]', $countries, $transit[1]['country'] or null, ['placeholder' => 'Please select...', 'class' => 'form-control']) }}
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<input name="fromDate[]" class="form-control datepickerfield" type="text" placeholder="YYYY-MM-DD" value="{{ $transit[1]['from_date'] }}"/>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<input name="uptoDate[]" class="form-control datepickerfield" type="text" placeholder="YYYY-MM-DD" value="{{ $transit[1]['upto_date'] }}"/>
								</div>
							</div>
						</div>
						<div class="row child3">
							<div class="col-md-3">
								<div class="form-group">
									 <input type="text" class="form-control" name="city_transit[]" value="{{ $transit[2]['city'] or '' }}"/>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">

									{{ Form::select('country_transit[]', $countries, $transit[2]['country'] or '', ['placeholder' => 'Please select...', 'class' => 'form-control']) }}
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<input name="fromDate[]" class="form-control datepickerfield" type="text" placeholder="YYYY-MM-DD" value="{{ $transit[2]['from_date'] }}"/>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<input name="uptoDate[]" class="form-control datepickerfield" type="text" placeholder="YYYY-MM-DD" value="{{ $transit[2]['upto_date'] }}"/>
								</div>
							</div>
						</div>
						<div class="row child4">
							<div class="col-md-3">
								<div class="form-group">
									 <input type="text" class="form-control" name="city_transit[]" value="{{ $transit[3]['city'] or '' }}"/>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">

									{{ Form::select('country_transit[]', $countries, $transit[3]['country'] or '', ['placeholder' => 'Please select...', 'class' => 'form-control']) }}
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<input name="fromDate[]" class="form-control datepickerfield" type="text" placeholder="YYYY-MM-DD" value="{{ $transit[3]['from_date'] }}"/>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<input name="uptoDate[]" class="form-control datepickerfield" type="text" placeholder="YYYY-MM-DD" value="{{ $transit[3]['upto_date'] }}"/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 ">
								<div class="pull-right">
									<button class="btn btn-primary addlocationrow">Add Location</button>
								</div>
							</div>
						</div>

					</div><!-- addLocations -->
					<div class="row">
						<div class="col-md-10 col-md-push-1">
							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Submit"/> <input type="hidden" name="id" value="{{ $trip->id }}"/>
								{{ csrf_field() }}
							</div>
						</div>
					</div>


			</form>
		</div>
	</section>
@endsection


@section('js')
	<script>

		$(document).ready(function () {

			@if ($transit[1]['country'] != "")
				$('.child2').show();
			@endif
			@if ($transit[2]['country'] != "")
				$('.child3').show();
			@endif
			@if ($transit[3]['country'] != "")
				$('.child4').show();
			@endif





			$('.addlocationrow').click(function (e) {
				e.preventDefault();
				if($('.child2').is(':visible')) {
					if($('.child3').is(':visible')) {
						if($('.child4').is(':visible')) {
							$('.addlocationrow').hide();
						} else {
							$('.child4').show(1000);
							$('.addlocationrow').hide();
						}
					} else {
						$('.child3').show(1000);
					}
				} else {
					$('.child2').show(1000);
				}
			})
		})
	</script>


@endsection