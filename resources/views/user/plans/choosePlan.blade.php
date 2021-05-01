@extends('layouts.user')
@section('user')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Choose Plan</h4>

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
                                <th>Plan Name</th>
                                <th>Plan Min Amount</th>
                                <th>Plan Max Amount</th>
                                <th>Return Date</th>
                                <th>Profit</th>
                                <th>Plan Type</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($plans as $plan)
                                <tr>
                                    <th>{{$plan->plan_name}}</th>
                                    <th>{{$gn->site_currency}}{{$plan->plan_min_amount}}</th>
                                    <th>{{$gn->site_currency}}{{$plan->plan_max_amount}}</th>
                                    <th>{{$plan->return_date}} Day</th>
                                    <th>{{$plan->profit}}%</th>
                                    <th>
                                        @if($plan->plan_type == 1)
                                            <span class="badge badge-primary text-white">Share Plan</span>
                                        @elseif($plan->plan_type == 2)
                                            <span class="badge badge-primary">Normal Plan</span>
                                        @elseif($plan->plan_type == 3)
                                            <span class="badge badge-primary">Special Plan</span>
                                        @else
                                            Not Set
                                        @endif
                                    </th>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-icon" data-toggle="modal" data-target="#chooseplan{{$plan->id}}">
                                            <i class="fas fa-shopping-basket"></i>
                                        </button>
                                    </td>
                                </tr>



                                <div class="modal fade" id="chooseplan{{$plan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Choose Plan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('user.choose.plan.save')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">

                                                        <div class="form-group">
                                                            <label>Paybill Number : 4047793</label>
                                                            <input type="text" class="form-control" placeholder="Customer Number" name="address" value="{{Auth::user()->phone}}" readonly required>
                                                            <input type="hidden" class="form-control" placeholder="Enter Plan Name" name="choose_plan" value="{{$plan->id}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Enter Amount </label>
                                                            <input type="text" class="form-control" placeholder="Enter Amount" name="plan_amount">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

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
