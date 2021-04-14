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
                                <th>Plan Name</th>
                                <th>Plan Min Amount</th>
                                <th>Plan Max Amount</th>
                                <th>Return Date</th>
                                <th>Profit</th>
                                <th>Plan Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($plans as $plan)
                                <tr>
                                    <th>{{$plan->plan_name}}</th>
                                    <th>{{$gn->site_currency}}.{{$plan->plan_min_amount}}</th>
                                    <th>{{$gn->site_currency}}.{{$plan->plan_max_amount}}</th>
                                    <th>{{$plan->return_date}}</th>
                                    <th>{{$plan->profit}}</th>
                                    <th>
                                        @if($plan->plan_type == 1)
                                            Share Plan
                                        @elseif($plan->plan_type == 2)
                                            Normal Plan
                                        @elseif($plan->plan_type == 3)
                                            Special Plan
                                        @else
                                            Not Set
                                        @endif
                                    </th>
                                    <th>
                                        @if($plan->status == 1)
                                            Publish
                                        @elseif($plan->status == 2)
                                            Un-Publish
                                        @else
                                            Not Set
                                        @endif
                                    </th>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editplan{{$plan->id}}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteplan{{$plan->id}}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>



                                <div class="modal fade" id="editplan{{$plan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Update Plan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('superadmin.plan.update')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Plan Name</label>
                                                        <input type="text" class="form-control" placeholder="Enter Plan Name" name="plan_name" value="{{$plan->plan_name}}">
                                                        <input type="hidden" class="form-control" placeholder="Enter Plan Name" name="plan_edit" value="{{$plan->id}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Plan Min Amount</label>
                                                        <input type="number" class="form-control" placeholder="Enter Plan Min Amount" name="plan_min_amount" value="{{$plan->plan_min_amount}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Plan Max Amount</label>
                                                        <input type="number" class="form-control" placeholder="Enter Plan Max Amount" name="plan_max_amount" value="{{$plan->plan_max_amount}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Return Date (EX : 7)</label>
                                                        <input type="number" class="form-control" placeholder="Enter Plan Return Date" name="return_date" value="{{$plan->return_date}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Plan Profit (%)</label>
                                                        <input type="number" class="form-control" placeholder="Enter Plan Profit" name="profit" value="{{$plan->profit}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Plan Type</label>
                                                        <select class="form-control" name="plan_type">
                                                            <option value="0">select any</option>
                                                            <option value="1" {{$plan->plan_type == 1 ? 'selected' : ''}}>Share Plan</option>
                                                            <option value="2" {{$plan->plan_type == 2 ? 'selected' : ''}}>Normal Plan</option>
                                                            <option value="3" {{$plan->plan_type == 3 ? 'selected' : ''}}>Special Plan</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select class="form-control" name="status">
                                                            <option value="0">select any</option>
                                                            <option value="1" {{$plan->status == 1 ? 'selected' : ''}}>Publish</option>
                                                            <option value="2" {{$plan->status == 2 ? 'selected' : ''}}>Un-Publish</option>
                                                        </select>
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


                                <div class="modal fade" id="deleteplan{{$plan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Delete Plan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('superadmin.plan.delete')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        are your sure to delete this plan ?
                                                        <input type="hidden" class="form-control" placeholder="Enter Plan Name" name="plan_delete" value="{{$plan->id}}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Delete</button>
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


    <div class="modal fade" id="creareplan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Plan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('superadmin.plan.save')}}" method="post">
                    @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Plan Name</label>
                        <input type="text" class="form-control" placeholder="Enter Plan Name" name="plan_name">
                    </div>
                    <div class="form-group">
                        <label>Plan Min Amount</label>
                        <input type="number" class="form-control" placeholder="Enter Plan Min Amount" name="plan_min_amount">
                    </div>
                    <div class="form-group">
                        <label>Plan Max Amount</label>
                        <input type="number" class="form-control" placeholder="Enter Plan Max Amount" name="plan_max_amount">
                    </div>
                    <div class="form-group">
                        <label>Return Date (EX : 7)</label>
                        <input type="number" class="form-control" placeholder="Enter Plan Return Date" name="return_date">
                    </div>
                    <div class="form-group">
                        <label>Plan Profit (%)</label>
                        <input type="number" class="form-control" placeholder="Enter Plan Profit" name="profit">
                    </div>
                    <div class="form-group">
                        <label>Plan Type</label>
                        <select class="form-control" name="plan_type">
                            <option value="0">select any</option>
                            <option value="1">Share Plan</option>
                            <option value="2">Normal Plan</option>
                            <option value="3">Special Plan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="0">select any</option>
                            <option value="1">Publish</option>
                            <option value="2">Un-Publish</option>
                        </select>
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

@endsection
