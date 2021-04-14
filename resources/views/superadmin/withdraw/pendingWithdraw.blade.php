@extends('layouts.superadmin')
@section('superadmin')


    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Pending Withdraw Request</h4>
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
                                <th>Withdraw ID</th>
                                <th>Amount</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>
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
                                            <span class="badge badge-danger-muted text-white">Pending</span>
                                        @elseif($userwith->status == 2)
                                            <span class="badge badge-success">Confirmed</span>
                                        @elseif($userwith->status == 3)
                                            <span class="badge badge-primary">Rejected</span>
                                        @else
                                            Not Set
                                        @endif
                                    </th>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#admineditwith{{$userwith->id}}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#admindeletewith{{$userwith->id}}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>

                                <div class="modal fade" id="admineditwith{{$userwith->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Update Withdraw Money</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('superadmin.withdraw.status.save')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Select Status</label>
                                                        <select class="form-control" name="status">
                                                            <option value="2">Confirm</option>
                                                            <option value="3">Rejected</option>
                                                        </select>
                                                        <input type="hidden" value="{{$userwith->id}}" name="with_id">
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

                                <div class="modal fade" id="admindeletewith{{$userwith->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Delete Withdraw Money</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('superadmin.withdraw.delete')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        are you sure to delete this withdraw request ?
                                                        <input type="hidden" value="{{$userwith->id}}" name="with_del_id">
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
                        {{$user_withs->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>








@endsection
