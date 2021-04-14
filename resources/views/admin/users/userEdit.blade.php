@extends('layouts.admin')
@section('admin')

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Edit User : {{$user->name}}</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{route('admin.user.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputUsername1">Name</label>
                                <input type="text" name="name" value="{{$user->name}}" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="">
                                <input type="hidden" name="edit_user" value="{{$user->id}}" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" value="{{$user->email}}"  class="form-control" id="exampleInputEmail1" placeholder="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" name="phone" value="{{$user->phone}}"  class="form-control" id="exampleInputEmail1" placeholder="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Account Status</label>
                                <select class="form-control" name="account_status">
                                    <option value="0">select any</option>
                                    <option value="1" {{$user->account_status == 1 ? 'selected' : ''}}>Active</option>
                                    <option value="2" {{$user->account_status == 3 ? 'selected' : ''}}>Block</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
