@extends('layouts.superadmin')
@section('superadmin')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Plans</h4>

                <div class="page-title-right">
                    <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0 btn-sm" data-toggle="modal" data-target="#creareplan">
                        Create New
                    </button>
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
                                <th>Plan Type</th>
                                <th>Plan Amount</th>
                                <th>Sender Address</th>
                                <th>Create Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user_plans as $plan)
                                <?php
                                    $user= \App\Models\User::where('id',$plan->user_id)->first();
                                    $plan_name = \App\Models\plan::where('id',$plan->plan_id)->first();
                                ?>
                                <tr>
                                    <th>{{$user->name}}</th>
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
                                    <th>{{$plan->amount}}</th>
                                    <th>{{$plan->address}}</th>
                                    <th>{{$plan->created_at}}</th>
                                    <th>
                                        <?php
                                        $date = \Carbon\Carbon::now();
                                        ?>
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
                                    </th>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edituserplan{{$plan->id}}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>



                                <div class="modal fade" id="edituserplan{{$plan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Update Plan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('superadmin.user.plan.update')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select class="form-control" name="status">
                                                            <option value="0">select any</option>
                                                            <option value="1" {{$plan->status == 1 ? 'selected' : ''}}>Approved</option>
                                                            <option value="4" {{$plan->status == 4 ? 'selected' : ''}}>Rejected</option>
                                                        </select>
                                                        <input type="hidden" name="user_plan_update" value="{{$plan->id}}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>



                            @endforeach
                            </tbody>
                        </table>
                        {{$user_plans->links()}}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
