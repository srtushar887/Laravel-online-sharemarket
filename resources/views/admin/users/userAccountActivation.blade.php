@extends('layouts.admin')
@section('admin')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Users</h4>

                <div class="page-title-right">
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">User List</h4>

                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users_acc as $user_ac)
                                <?php
                                $user_details= \App\Models\User::where('id',$user_ac->user_id)->first();
                                ?>
                                <tr>
                                    <th>
                                        @if ($user_details)
                                            {{$user_details->name}}
                                        @endif
                                        </th>
                                    <th>
                                        @if ($user_details)
                                            {{$user_details->email}}
                                        @endif

                                    </th>
                                    <th>
                                        @if ($user_details)
                                        {{$user_details->phone}}
                                            @endif
                                    </th>
                                    <th>
                                        @if ($user_details)
                                        {{$user_ac->address}}
                                            @endif
                                    </th>
                                    <th>

                                        @if ($user_ac->status == 1)
                                            Submited
                                        @elseif($user_ac->status == 2)
                                            Approved
                                        @elseif($user_ac->status == 3)
                                            Rejected
                                        @elseif($user_ac->status == 4)
                                            Not Set
                                        @else
                                            Not Set
                                        @endif
                                    </th>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updateuseraccount{{$user_ac->id}}">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>


                                <div class="modal fade" id="updateuseraccount{{$user_ac->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Update User Account</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('admin.users.account.activation.update')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>select status</label>
                                                        <select class="form-control" name="status">
                                                            <option value="0">select any</option>
                                                            <option value="2">Approved</option>
                                                            <option value="3">Rejected</option>
                                                        </select>
                                                        <input type="hidden" class="form-control" placeholder="Enter Plan Name" name="user_acc_id" value="{{$user_ac->id}}">
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
                        {{$users_acc->links()}}
                    </div>

                </div>
            </div>
        </div>

    </div>



@endsection
