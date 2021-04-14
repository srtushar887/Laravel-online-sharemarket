@extends('layouts.user')
@section('user')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Bought Share</h4>

                <div class="page-title-right">

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
                                <th>Seller Name</th>
                                <th>Seller Phone</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($shares as $plan)
                                <?php
                                $seller_name = \App\Models\User::where('id',$plan->seller_id)->first();
                                ?>
                                <tr>
                                    <th>{{$seller_name->name}}</th>
                                    <th>{{$seller_name->phone}}</th>
                                    <th>{{$gn->site_currency}}.{{$plan->amount}}</th>
                                    <td>
                                        @if($plan->status == 1)
                                            <span class="badge badge-info-muted">Pending</span>
                                        @elseif($plan->status == 2)
                                            <span class="badge badge-info-muted">Confirm</span>
                                        @elseif($plan->status == 3)
                                            <span class="badge badge-info-muted">Remove</span>
                                        @elseif($plan->status == 4)
                                            <span class="badge badge-info-muted">Report</span>
                                        @elseif($plan->status == 5)
                                            <span class="badge badge-info-muted">Re-Pair</span>
                                        @else
                                            <span class="badge badge-info-muted">Not Set</span>
                                        @endif


                                    </td>
                                </tr>




                            @endforeach
                            </tbody>
                        </table>
                        {{$shares->links()}}
                    </div>

                </div>
            </div>
        </div>

    </div>



@endsection
