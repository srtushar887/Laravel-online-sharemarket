@extends('layouts.admin')
@section('admin')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">General Settings</h4>

                <div class="page-title-right">

                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" novalidate="" action="{{route('admin.general.settings.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="validationCustom01">Site Name</label>
                                    <input type="text" name="site_name" value="{{$gen->site_name}}" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="validationCustom01">Site Email</label>
                                    <input type="email" name="site_email" value="{{$gen->site_email}}" class="form-control" id="exampleInputEmail1" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="validationCustom01">Site Phone Number</label>
                                    <input type="text" name="site_phone" value="{{$gen->site_phone}}" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="validationCustom01">Site Currency</label>
                                    <input type="text" name="site_currency" value="{{$gen->site_currency}}" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="validationCustom01">Site Address</label>
                                    <textarea type="password" name="site_address" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="">{!! $gen->site_address !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01">First name</label>
                                    <br>
                                    <img src="{{asset($gen->icon)}}" style="height: 100px;width: 100px;">
                                    <input type="file" name="icon" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->

    </div>
@endsection
