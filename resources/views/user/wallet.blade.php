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
                <div class="col-md-9">
                    <h2><i class="fa fa-envelope"></i> Wallet </h2>

                </div>
                <div class="col-md-3">
                    <b>Account Balance:</b>
                    @if ( $member->ledger_balance() )
                        {{ $member->ledger_balance() }} USD
                    @else
                        0.00 USD
                    @endif
                </div>
                @if(Session::has('flash_message'))
                    <div class="col-md-12">
                        <div class="alert alert-success">
                            {!! Session::get('flash_message') !!}
                        </div>
                    </div>
                @endif
                <div class="col-md-6">
                    <h3 class="inline"><i class="fa fa-list-ul"></i> Withdraw Funds </h3>
                    {{-- <div class="filterby">Filter by <select></select></div> --}}
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home1">Bank Transfer</a></li>
                        <li><a data-toggle="tab" href="#opt1">Easy Paisa</a></li>
                        <li><a data-toggle="tab" href="#opt2">Paypal</a></li>
                        <li><a data-toggle="tab" href="#opt3">Cards</a></li>
                        <li><a data-toggle="tab" href="#opt4">Western Union</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="home1" class="tab-pane fade in active">
                            <h3>Instructions</h3>
                            <p>
                                <strong>Bank Ltd</strong><br/>
                                Account Title: BringFare <br/>
                                Account #: 0000-000000000000-0</p>
                            <p><strong>Note:</strong> After depositing payment, please inform us usin form below so we
                                can credit your account.<br/></p>
                            <form method="post" action="{{ route('post-message') }}">
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea name="message" class="form-control"></textarea></div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Send">
                                    <input type="hidden" name="subject" value="Withdraw Funds - Bank Transfer">
                                    {{ csrf_field() }}
                                </div>
                            </form>

                        </div>
                        <div id="opt1" class="tab-pane fade">
                            <h3>Instructions</h3>
                            <p>
                                <strong>Easy Paisa</strong><br/>
                                Account Title: BringFare <br/>
                                Account #: 0000-000000000000-0</p>
                            <p><strong>Note:</strong> After depositing payment, please inform us usin form below so we
                                can credit your account.<br/></p>
                            <form method="post" action="{{ route('post-message') }}">
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea name="message" class="form-control"></textarea></div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Send">
                                    <input type="hidden" name="subject" value="Withdraw Funds - Easy Paisa">
                                    {{ csrf_field() }}
                                </div>
                            </form>
                        </div>
                        <div id="opt2" class="tab-pane fade">
                            <h3>Paypal</h3>
                            <p>You can send us payment thru paypal.</p>
                            <form method="post" action="{{ route('post-message') }}">


                                <div class="form-group ">
                                    <div class="">
                                        <label>Enter Amount to Deposit (USD)</label> <input name="amount" type="text"
                                                                                            class="form-control"
                                                                                            value="0"/>

                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="">

                                        <input class="btn btn-primary" type="submit" value="Send"/>
                                        <input type="hidden" name="subject" value="Withdraw Funds - Paypal">
                                        {{ csrf_field() }}
                                    </div>
                                </div>


                            </form>
                        </div>
                        <div id="opt3" class="tab-pane fade">
                            <h3>Credit / Debit Card</h3>
                            <p>You can send us payment thru Cards.</p>
                            <form method="post" action="{{ route('post-message') }}">


                                <div class="form-group ">
                                    <div class="">
                                        <label>Enter Amount to Deposit (USD)</label> <input name="amount" type="text"
                                                                                            class="form-control"
                                                                                            value="0"/>

                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="">

                                        <input class="btn btn-primary" type="submit" value="Send"/>
                                        <input type="hidden" name="subject" value="Withdraw Funds - Credit / Debit Card">
                                        {{ csrf_field() }}
                                    </div>
                                </div>


                            </form>
                        </div>
                        <div id="opt4" class="tab-pane fade">
                            <h3>Western Union</h3>
                            <p>You can send us payment thru Western Union.</p>
                            <form method="post" action="{{ route('post-message') }}">


                                <div class="form-group ">
                                    <div class="">
                                        <label>Enter Amount to Deposit (USD)</label> <input name="amount" type="text"
                                                                                            class="form-control"
                                                                                            value="0"/>

                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="">
                                        <input type="hidden" name="subject" value="Withdraw Funds - Western Union">
                                        <input class="btn btn-primary" type="submit" value="Send"/>
                                        {{ csrf_field() }}
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">


                    <h3 class="inline"><i class="fa fa-comments-o"></i> Add Funds </h3>
                    {{-- <div class="filterby">Filter by <select></select></div> --}}
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home2">Bank Transfer</a></li>
                        <li><a data-toggle="tab" href="#opt11">Easy Paisa</a></li>
                        <li><a data-toggle="tab" href="#opt12">Paypal</a></li>
                        <li><a data-toggle="tab" href="#opt13">Cards</a></li>
                        <li><a data-toggle="tab" href="#opt14">Western Union</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="home2" class="tab-pane fade in active">
                            <h3>Instructions</h3>
                            <p>
                                <strong>Bank Ltd</strong><br/>
                                Account Title: BringFare <br/>
                                Account #: 0000-000000000000-0</p>
                            <p><strong>Note:</strong> After depositing payment, please inform us usin form below so we
                                can credit your account.<br/></p>
                            <form method="post" action="{{ route('post-message') }}">
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea name="message" class="form-control"></textarea></div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Send">
                                    <input type="hidden" name="subject" value="Add Funds - Bank Transfer">
                                    {{ csrf_field() }}
                                </div>
                            </form>

                        </div>
                        <div id="opt11" class="tab-pane fade">
                            <h3>Instructions</h3>
                            <p>
                                <strong>Easy Paisa</strong><br/>
                                Account Title: BringFare <br/>
                                Account #: 0000-000000000000-0</p>
                            <p><strong>Note:</strong> After depositing payment, please inform us usin form below so we
                                can credit your account.<br/></p>
                            <form method="post" action="{{ route('post-message') }}">
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea name="message" class="form-control"></textarea></div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Send">
                                    <input type="hidden" name="subject" value="Add Funds - Easy Paisa">
                                    {{ csrf_field() }}
                                </div>
                            </form>
                        </div>
                        <div id="opt12" class="tab-pane fade">
                            <h3>Paypal</h3>
                            <p>You can send us payment thru paypal.</p>
                            <form method="post" action="{{ route('post-message') }}">


                                <div class="form-group ">
                                    <div class="">
                                        <label>Enter Amount to Deposit (USD)</label> <input name="amount" type="text"
                                                                                            class="form-control"
                                                                                            value="0"/>

                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="">
                                        <input type="hidden" name="subject" value="Add Funds - Paypal">
                                        <input class="btn btn-primary" type="submit" value="Send"/>
                                        {{ csrf_field() }}
                                    </div>
                                </div>


                            </form>
                        </div>
                        <div id="opt13" class="tab-pane fade">
                            <h3>Credit / Debit Card</h3>
                            <p>You can send us payment thru Cards.</p>
                            <form method="post" action="{{ route('post-message') }}">


                                <div class="form-group ">
                                    <div class="">
                                        <label>Enter Amount to Deposit (USD)</label> <input name="amount" type="text"
                                                                                            class="form-control"
                                                                                            value="0"/>

                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="">
                                        <input type="hidden" name="subject" value="Add Funds - Credot / Debit Card">
                                        <input class="btn btn-primary" type="submit" value="Send"/>
                                        {{ csrf_field() }}
                                    </div>
                                </div>


                            </form>
                        </div>
                        <div id="opt14" class="tab-pane fade">
                            <h3>Western Union</h3>
                            <p>You can send us payment thru Western Union.</p>
                            <form method="post" action="{{ route('post-message') }}">


                                <div class="form-group ">
                                    <div class="">
                                        <label>Enter Amount to Deposit (USD)</label> <input name="amount" type="text"
                                                                                            class="form-control"
                                                                                            value="0"/>

                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="">
                                        <input type="hidden" name="subject" value="Add Funds - Western Union">
                                        <input class="btn btn-primary" type="submit" value="Send"/>
                                        {{ csrf_field() }}
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="inline"><i class="fa fa-list-ul"></i> Ledger </h3>
                    {{-- <div class="filterby">Filter by <select></select></div> --}}
                    <table class="table messages">
                        <tr>
                            <th>Product</th>
                            <th>Narration</th>
                            <th>Amount</th>
                            <th>Date</th></tr>
                        @foreach($ledgers as $ledger)
                            <tr>
                                <td>{{ $ledger->product_id }}</td>
                                <td>{{ $ledger->narration }}</td>
                                <td>{{ $ledger->amount }}</td>
                                <td>{{ $ledger->created_at }}</td>
                            </tr>
                        @endforeach
                        <tr><td colspan="4">{{ $ledgers->links() }}</td></tr>
                    </table>

                </div>

            </div>
        </div>


    </section>

@endsection