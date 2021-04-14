@extends('layouts.superadmin')
@section('superadmin')

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Seller Share</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">

        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Share List</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Seller Name</th>
                                <th>Seller Email</th>
                                <th>Seller Phone</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($plans as $plan)
                                <?php
                                    $seller = \App\Models\User::where('id',$plan->user_id)->first();

                                ?>
                                <tr>
                                    <th>{{$seller->name}}</th>
                                    <th>{{$seller->email}}</th>
                                    <th>{{$seller->phone}}</th>

                                </tr>




                            @endforeach
                            </tbody>
                        </table>
                        {{$plans->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
