@extends('layouts.user')
@section('user')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Withdraw</h4>

                <div class="page-title-right">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#creareplan">
                        Create New Withdraw
                    </button>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sell List</h4>

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
                        {{$user_withs->links()}}
                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="creareplan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Withdraw Money</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('user.withdraw.save')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" class="form-control" placeholder="Enter Amount" name="amount">
                        </div>
                        <div class="form-group">
                            <label>Withndraw Address</label>
                            <textarea type="text" class="form-control" required readonly placeholder="Enter Withdraw Address" name="address">{{Auth::user()->phone}}</textarea>
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
