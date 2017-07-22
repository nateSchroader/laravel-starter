@extends( 'application' )
@section( 'title', 'Dashboard' )

@section( 'content' )
    <section id="login">
        <div class="container">
            @include( 'components/flash-message' )

            @if ( $earlySettlement )
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-8">
                                        <h4 class="text-bold">Early Settlement</h4>
                                        <h5>ES-{{$earlySettlement->display_id}}</h5>
                                    </div>
                                    <div class="col-xs-4 text-right">
                                        <a href="/earlySettlements/{{$earlySettlement->id}}"
                                           class="btn btn-sm btn-primary">
                                            View
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <section>
                                    <div class="row">
                                        <div class="col-sm-6 form-group
                                        @if( $earlySettlement->past_due > 0 )
                                            text-danger
                                        @endif
                                            ">
                                            <h5 class="text-bold">Balance Due</h5>

                                            <h1 class="currency">
                                                ${{$earlySettlement->current_due / 100}}
                                                <sup>{{ViewHelper::cents( $earlySettlement->current_due)}}</sup>
                                            </h1>
                                        </div>

                                        @if($earlySettlement->current_due > 0)
                                            <div class="col-sm-6 form-group
                                            @if( $earlySettlement->past_due > 0 )
                                                text-danger
                                            @endif
                                                ">
                                                <h5 class="text-bold">Due Date</h5>

                                                <h4>
                                                    {{date( 'M. j Y', strtotime( $latestDueBill->due_at ) )}}
                                                </h4>

                                                @if( $earlySettlement->past_due > 0 )
                                                    <h5 class="text-bold text-uppercase">Past Due</h5>
                                                @endif
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <a href="/earlySettlements/{{$earlySettlement->id}}/makePayment"
                                           class="btn btn-success btn-block">
                                            Make A Payment
                                        </a>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif ( $application !== null )
                <div class="row">
                    <div class="col-md-7 form-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-8">
                                        <h4 class="text-bold margin-sm-bottom">Early Settlement Application</h4>
                                        <h5>{{ date ( 'Y-M-d', strtotime( $application->created_at ) ) }}</h5>
                                    </div>
                                    <div class="col-xs-4 text-right">
                                        @if($application->status === 0)
                                            <a href="{{$application->getCurrentApplicationStep()}}"
                                               class="btn btn-sm btn-primary">
                                                View
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <h5 class="form-group">
                                    <span class="text-bold">Status</span>
                                    {!! $application->status_label !!}
                                </h5>

                                @if($application->status_name === 'complete')
                                    <h4 class="text-bold">Application Submitted</h4>
                                    <h5 class="text-muted margin-md-bottom">Let us take it from here</h5>

                                    <p>
                                        You're application has been submitted. Our team of specialists will
                                        be negotiating with <strong>{{$application->property_name}}</strong> to find the best options available to you.
                                    </p>

                                    <p>
                                        We will send email notifications to <strong>{{$user->email}}</strong> as updates are made
                                        available.
                                    </p>

                                    <p>
                                        Have a question? Email us at <a
                                            href="mailto:support@rentrelief.com">support@rentrelief.com</a>.
                                    </p>

                                    <a href="/logout" class="btn btn-success">Logout</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection