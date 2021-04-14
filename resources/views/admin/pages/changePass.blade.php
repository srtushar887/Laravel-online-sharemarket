@extends('layouts.admin')
@section('admin')

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Change Password</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{route('admin.change.password.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputUsername1">New Password</label>
                                <input type="password" name="npas" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Confirm Password</label>
                                <input type="password" name="cpass"  class="form-control" id="exampleInputEmail1" placeholder="">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
