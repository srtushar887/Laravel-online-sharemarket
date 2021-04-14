@extends('layouts.user')
@section('user')

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Profile</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="exampleInputUsername1">Name</label>
                                <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control" id="exampleInputEmail1" placeholder="">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Phone Number</label>
                                <input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control" id="exampleInputEmail1" placeholder="">
                            </div>
                            <div class="form-group col-md-3 ">
                                <label for="exampleInputPassword1">Profile Image</label>
                                <br>
                                <img src="{{asset(Auth::user()->profile_image)}}" style="height: 100px;width: 100px;">
                                <input type="file" name="profile_image" value="" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
