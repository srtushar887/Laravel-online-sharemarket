@extends('layouts.admin')
@section('admin')





    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Normal Plans</h4>

                <div class="page-title-right">

                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Plan List</h4>

                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Plan Name</th>
                                <th>Plan Amount</th>
                                <th>Profit</th>
                                <th>Return Amount</th>
                                <th>Due Date</th>
                                <th>Plan Type</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($plans as $plan)
                                <?php
                                $p_name = \App\Models\plan::where('id',$plan->plan_id)->first();
                                $user_name =  \App\Models\User::where('id',$plan->user_id)->first();
                                ?>
                                <tr>
                                    <th>
                                        @if ($user_name)
                                            {{$user_name->name}}
                                        @endif

                                    </th>
                                    <th>{{$p_name->plan_name}}</th>
                                    <th>
                                        {{$gn->site_currency}}.{{$plan->amount}}

                                    </th>
                                    <th>
                                        @if ($plan->plan_type == 3)
                                            1.80%
                                        @else
                                            {{$plan->profit}}%
                                        @endif
                                    </th>
                                    <th>

                                        @if ($plan->plan_type == 3)
                                            <?php
                                            $qt1 = ($plan->amount * .45) ;
                                            $qt4 = ($plan->amount * .45);
                                            $total_am = ($plan->amount * 1.80);
                                            ?>

                                            @if ($plan->claim_status_one == 1)
                                                Q1 : {{$gn->site_currency}}.{{$qt1}} <strong>Pending</strong><br>
                                            @elseif ($plan->claim_status_one == 2)
                                                Q1 : {{$gn->site_currency}}.{{$qt1}} <strong>Matured</strong><br>
                                            @elseif ($plan->claim_status_one == 3)
                                                Q1 : {{$gn->site_currency}}.{{$qt1}} <strong>Complete</strong><br>
                                            @else
                                                Q1 : {{$gn->site_currency}}.{{$qt1}} <strong>Pending</strong><br>
                                            @endif

                                            @if ($plan->claim_status_two == 1)
                                                Q2 : {{$gn->site_currency}}.{{$qt1}} Pending<br>
                                            @elseif ($plan->claim_status_two == 2)
                                                Q2 : {{$gn->site_currency}}.{{$qt1}} <strong>Matured</strong><br>
                                            @elseif ($plan->claim_status_two == 3)
                                                Q2 : {{$gn->site_currency}}.{{$qt1}} <strong>Complete</strong><br>
                                            @else
                                                Q2 : {{$gn->site_currency}}.{{$qt1}} <strong>Pending</strong><br>
                                            @endif


                                            @if ($plan->claim_status_three == 1)
                                                Q3 : {{$gn->site_currency}}.{{$qt1}} Pending<br>
                                            @elseif ($plan->claim_status_three == 2)
                                                Q3 : {{$gn->site_currency}}.{{$qt1}} <strong>Matured</strong><br>
                                            @elseif ($plan->claim_status_three == 3)
                                                Q3 : {{$gn->site_currency}}.{{$qt1}} <strong>Complete</strong><br>
                                            @else
                                                Q3 : {{$gn->site_currency}}.{{$qt1}} <strong>Pending</strong><br>
                                            @endif

                                            @if ($plan->claim_status_four == 1)
                                                Q4 : {{$gn->site_currency}}.{{$qt1}} Pending<br>
                                            @elseif ($plan->claim_status_four == 2)
                                                Q4 : {{$gn->site_currency}}.{{$qt1}} <strong>Matured</strong><br>
                                            @elseif ($plan->claim_status_four == 3)
                                                Q4 : {{$gn->site_currency}}.{{$qt1}} <strong>Complete</strong><br>
                                            @else
                                                Q4 : {{$gn->site_currency}}.{{$qt1}} <strong>Pending</strong><br>
                                            @endif

                                            Total : {{$gn->site_currency}}{{$total_am}}
                                        @else

                                            {{$gn->site_currency}}{{$plan->amount}} + {{$gn->site_currency}}{{$plan->profit_amount}} = {{$gn->site_currency}}{{$plan->return_amount}}
                                        @endif


                                    </th>
                                    <th>
                                        @if ($plan->plan_type == 3)
                                            @if (!empty($plan->first_date) && !empty($plan->second_date) && !empty($plan->third_date) && !empty($plan->return_date))
                                                <?php
                                                $dt = $dt = \Carbon\Carbon::now();

                                                ?>
                                                Q1 :  {{\Carbon\Carbon::parse($plan->first_date)->toDayDateTimeString()}} <br>
                                                Q2 :  {{\Carbon\Carbon::parse($plan->second_date)->toDayDateTimeString()}}<br>
                                                Q3 :  {{\Carbon\Carbon::parse($plan->third_date)->toDayDateTimeString()}}<br>
                                                Q4 :  {{\Carbon\Carbon::parse($plan->return_date)->toDayDateTimeString()}}<br>
                                            @else
                                                Waiting for confirmation
                                            @endif

                                        @else
                                            {{\Carbon\Carbon::parse($plan->return_date)->toDayDateTimeString()}}
                                        @endif

                                    </th>
                                    <th>
                                        @if($plan->plan_type == 1)
                                            <span class="badge badge-primary text-white">Share Plan</span>
                                        @elseif($plan->plan_type == 2)

                                            <span class="badge badge-primary text-white">Normal Plan</span>
                                        @elseif($plan->plan_type == 3)
                                            <span class="badge badge-primary text-white">Special Plan</span>
                                        @else
                                            Not Set
                                            <span class="badge badge-primary text-white">Not Set</span>
                                        @endif
                                    </th>
                                    <td>
                                        <?php
                                        $date = \Carbon\Carbon::now();
                                        ?>

                                        @if ($plan->plan_type == 3)

                                            @if ($plan->status == 0)
                                                Waiting for confirmation
                                            @else

                                                @if ($plan->claim_status_one == 1)
                                                    Pending for Q1
                                                @elseif($plan->claim_status_one == 2)
                                                    Claim Q1 Amount
                                                @elseif($plan->claim_status_one == 3)
                                                    Claimed Q1 Amount
                                                @endif
                                                <br>

                                                @if ($plan->claim_status_two == 1)
                                                    Pending for Q2
                                                @elseif($plan->claim_status_two == 2)
                                                    Claim Q2 Amount
                                                @elseif($plan->claim_status_two == 3)
                                                    Claimed Q2 Amount
                                                @endif
                                                <br>
                                                @if ($plan->claim_status_three == 1)
                                                    Pending for Q3
                                                @elseif($plan->claim_status_three == 2)
                                                    Claim Q3 Amount
                                                @elseif($plan->claim_status_three == 3)
                                                    Claimed Q3 Amount
                                                @endif
                                                <br>
                                                @if ($plan->claim_status_four == 1)
                                                    Pending for Q4
                                                @elseif($plan->claim_status_four == 2)
                                                    Claim Q4 Amount
                                                @elseif($plan->claim_status_four == 3)
                                                    Claimed Q4 Amount
                                                @endif

                                            @endif


                                        @else
                                            @if($plan->status == 1)
                                                Pending
                                            @elseif ($plan->status == 2)
                                                Complete
                                            @elseif ($plan->status == 3)
                                                Paid
                                            @elseif ($plan->status == 0)
                                                Waiting for confirmation
                                            @elseif ($plan->status == 4)
                                                Rejected
                                            @else
                                                Not Set
                                            @endif
                                        @endif

                                    </td>
                                </tr>



                            @endforeach
                            </tbody>
                        </table>
                        {{$plans->links()}}
                    </div>

                </div>
            </div>
        </div>

    </div>



@endsection
