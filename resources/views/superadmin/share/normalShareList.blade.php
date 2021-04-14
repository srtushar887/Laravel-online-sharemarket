@extends('layouts.superadmin')
@section('superadmin')

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">My Plans</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">My Plan Lists</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>User Name</th>
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
                                    <th>{{$plan->user->name}}</th>
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
                                            <span class="badge badge-info-muted">Pending</span>
                                        @elseif ($plan->status == 2)
                                            <span class="badge badge-info-muted">Complete</span>
                                        @elseif ($plan->status == 3)
                                            <span class="badge badge-info-muted">Paid</span>
                                        @else
                                            <span class="badge badge-info-muted">Not Set</span>
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
