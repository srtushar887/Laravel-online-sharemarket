@extends('layouts.user')
@section('user')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Sell</h4>

                <div class="page-title-right">

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
                                <th>Buyer Name</th>
                                <th>Buyer Phone</th>
                                <th>Amount</th>
                                <th>Action</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sell as $plan)
                                <?php
                                $buyer_name = \App\Models\User::where('id',$plan->user_id)->first();
                                ?>
                                <tr>
                                    <td>{{$buyer_name->name}}</td>
                                    <td>{{$buyer_name->phone}}</td>
                                    <td>{{$gn->site_currency}}.{{$plan->amount}}</td>
                                    <td>
                                        <a href="{{route('user.sell.confirm',$plan->id)}}"><span class="badge badge-info-muted">Confirm</span></a>
                                        <a href="{{route('user.sell.remove',$plan->id)}}"><span class="badge badge-info-muted">Remove</span></a>
                                        <a href="{{route('user.sell.report',$plan->id)}}"><span class="badge badge-info-muted">Report</span></a>
                                        <a href="{{route('user.sell.repair',$plan->id)}}"><span class="badge badge-info-muted">Re-Pair</span></a>
                                    </td>
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
                        {{$sell->links()}}
                    </div>

                </div>
            </div>
        </div>

    </div>



@endsection
