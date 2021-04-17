@extends('layouts.user')
@section('user')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Welcome to {{$gn->site_name}}</h4>

                <div class="page-title-right">

                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    @if (Auth::user()->is_acc_activate == 0 || Auth::user()->is_acc_activate == 1 || Auth::user()->is_acc_activate == 3)
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" novalidate="">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <div class="alert alert-warning" role="alert">
                                        Please activate your account to continue.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    @if (Auth::user()->is_acc_activate == 0)
                                    <button class="btn btn-primary" style="margin-top: 4px;" type="button" data-toggle="modal" data-target="#activeaccount">Activate Account</button>
                                    @elseif (Auth::user()->is_acc_activate == 1)
                                        <button class="btn btn-primary" style="margin-top: 4px;" type="button">Submited</button>
                                    @elseif(Auth::user()->is_acc_activate == 3)
                                        <button class="btn btn-primary" style="margin-top: 4px;" type="button" data-toggle="modal" data-target="#activeaccount">Activate Account</button>
                                    @else
                                    <button class="btn btn-primary" style="margin-top: 4px;" type="button">Submited</button>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->

    </div>
    @endif



    <div class="modal fade" id="activeaccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Activate Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('user.account.active.submit')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" class="form-control" placeholder="Enter Amount" name="amount" value="200" readonly>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea type="text" class="form-control" required placeholder="Enter Address" name="address" readonly>{{Auth::user()->phone}}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">My Referral Link</h4>
                    <form class="needs-validation" novalidate="">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <input type="text" id="code" class="form-control" value="{{route('referral.register',Auth::user()->my_ref_id)}}" readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <button class="btn btn-primary" onclick="myFunction()" style="margin-top: 1px;" type="button">Copy</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->

    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body overflow-hidden">
                                    <p class="text-truncate font-size-14 mb-2">Total Balance</p>
                                    <h4 class="mb-0">{{Auth::user()->balance}}</h4>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body overflow-hidden">
                                    <p class="text-truncate font-size-14 mb-2">Total Withdraw</p>
                                    <h4 class="mb-0">{{$toal_with_count}}</h4>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body overflow-hidden">
                                    <p class="text-truncate font-size-14 mb-2">My Plan</p>
                                    <h4 class="mb-0">{{$my_plan_count}}</h4>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end row -->

        </div>


    </div>
    <!-- end row -->





    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">My Plans</h4>

                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead>
                            <tr>
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
                                ?>
                                <tr>
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
                                                    <a href="{{route('cliam.amount',['plan_id'=>$plan->plan_id,'amount'=>$qt1,'type'=>1,'userplan_id'=>$plan->id])}}">Claim Q1 Amount</a>
                                                @elseif($plan->claim_status_one == 3)
                                                    Claimed Q1 Amount
                                                @endif
                                                <br>

                                                @if ($plan->claim_status_two == 1)
                                                    Pending for Q2
                                                @elseif($plan->claim_status_two == 2)
                                                    <a href="{{route('cliam.amount',['plan_id'=>$plan->plan_id,'amount'=>$qt1,'type'=>2,'userplan_id'=>$plan->id])}}">Claim Q2 Amount</a>
                                                @elseif($plan->claim_status_two == 3)
                                                    Claimed Q2 Amount
                                                @endif
                                                <br>
                                                @if ($plan->claim_status_three == 1)
                                                    Pending for Q3
                                                @elseif($plan->claim_status_three == 2)
                                                    <a href="{{route('cliam.amount',['plan_id'=>$plan->plan_id,'amount'=>$qt1,'type'=>3,'userplan_id'=>$plan->id])}}">Claim Q3 Amount</a>
                                                @elseif($plan->claim_status_three == 3)
                                                    Claimed Q3 Amount
                                                @endif
                                                <br>
                                                @if ($plan->claim_status_four == 1)
                                                    Pending for Q4
                                                @elseif($plan->claim_status_four == 2)
                                                    <a href="{{route('cliam.amount',['plan_id'=>$plan->plan_id,'amount'=>$qt1,'type'=>4,'userplan_id'=>$plan->id])}}">Claim Q4 Amount</a>
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
                    </div>

                </div>
            </div>
        </div>

    </div>



    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Withdraw Request</h4>

                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead>
                            <tr>
                                <th>Withdraw ID</th>
                                <th>Amount</th>
                                <th>Address</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user_withs as $userwith)
                                <tr>
                                    <th>{{$userwith->with_id}}</th>
                                    <th>{{$gn->site_currency}}{{$userwith->amount}}</th>
                                    <th>{!! $userwith->address !!}</th>
                                    <th>
                                        @if($userwith->status == 1)
                                            <span class="badge badge-success">Pending</span>
                                        @elseif($userwith->status == 2)
                                            <span class="badge badge-primary">Confirmed</span>
                                        @elseif($userwith->status == 3)
                                            <span class="badge badge-danger">Rejected</span>
                                        @else
                                            Not Set
                                        @endif
                                    </th>
                                </tr>



                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>


@endsection
@section('js')
    <script>
        function myFunction() {
            var copyText = document.getElementById("code");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
            alert("Copied the text: " + copyText.value);
        }
    </script>
@endsection
