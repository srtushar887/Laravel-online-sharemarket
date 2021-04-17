@extends('layouts.superadmin')
@section('superadmin')

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
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th>{{$user->name}}</th>
                                    <th>{{$user->email}}</th>
                                    <th>{{$user->phone}}</th>
                                    <th>
                                       @if ($user->is_account_veirified == 0)
                                           Not Activated
                                        @elseif($user->is_account_veirified == 1)
                                           Activated
                                        @elseif($user->is_account_veirified == 2)
                                            Blocked
                                        @else
                                           Not Set

                                       @endif
                                    </th>
                                    <td>
                                        <a href="{{route('superadmin.edit.user',$user->id)}}">
                                            <button type="button" class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#userdelete{{$user->id}}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>


                                <div class="modal fade" id="userdelete{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Delete User</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('superadmin.user.delete')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        are your sure to delete this user ?
                                                        <input type="hidden" class="form-control" placeholder="Enter Plan Name" name="user_delete" value="{{$user->id}}">
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
                        {{$users->links()}}
                    </div>

                </div>
            </div>
        </div>

    </div>



@endsection
