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
                                        Please active your account by paying {{$gn->site_currency}}.200
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    @if (Auth::user()->is_acc_activate == 0)
                                    <button class="btn btn-primary" style="margin-top: 4px;" type="button" data-toggle="modal" data-target="#activeaccount">Active Account</button>
                                    @elseif (Auth::user()->is_acc_activate == 1)
                                        <button class="btn btn-primary" style="margin-top: 4px;" type="button">Submited</button>
                                    @elseif(Auth::user()->is_acc_activate == 3)
                                        <button class="btn btn-primary" style="margin-top: 4px;" type="button" data-toggle="modal" data-target="#activeaccount">Re-Submited</button>
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Active Account</h5>
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
                            <textarea type="text" class="form-control" required placeholder="Enter Address" name="address"></textarea>
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
                                    <th>{{$gn->site_currency}}{{$p_name->plan_amount}}</th>
                                    <th>{{$p_name->profit}}%</th>
                                    <th>{{$gn->site_currency}}{{$plan->amount}} + {{$gn->site_currency}}{{$plan->profit_amount}} = {{$gn->site_currency}}{{$plan->return_amount}}</th>
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
                                        @if($plan->status == 1)
                                            <span class="badge badge-primary text-white">Pending</span>
                                        @elseif ($plan->status == 2)
                                            <span class="badge badge-primary text-white">Complete</span>
                                        @elseif ($plan->status == 3)
                                            <span class="badge badge-primary text-white">Paid</span>
                                        @else
                                            <span class="badge badge-primary text-white">Not Set</span>
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
