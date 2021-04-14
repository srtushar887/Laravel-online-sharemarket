@extends('layouts.admin')
@section('admin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Dashboard</h4>

                <div class="page-title-right">

                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body overflow-hidden">
                                    <p class="text-truncate font-size-14 mb-2">Total Users</p>
                                    <h4 class="mb-0">{{$total_user}}</h4>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body overflow-hidden">
                                    <p class="text-truncate font-size-14 mb-2">Total Withdraw</p>
                                    <h4 class="mb-0">{{$total_withdraw}}</h4>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body overflow-hidden">
                                    <p class="text-truncate font-size-14 mb-2">Total User Invest Plan</p>
                                    <h4 class="mb-0">{{$user_invest_plan}}</h4>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end row -->

        </div>


    </div>
    <!-- end row -->





    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Latest Users</h4>

                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead>
                            <tr>
                                <th class="pt-0">Name</th>
                                <th class="pt-0">Email</th>
                                <th class="pt-0">Phone</th>
                                <th class="pt-0">Account Status</th>
                            </tr>
                            </thead>
                            @foreach($latest_users as $luser)
                                <tr>
                                    <td>{{$luser->name}}</td>
                                    <td>{{$luser->email}}</td>
                                    <td>{{$luser->phone}}</td>
                                    <td>
                                        @if ($luser->account_status == 1)
                                            Active
                                        @elseif ($luser->account_status == 0)
                                            Not Verified
                                        @elseif ($luser->account_status == 3)
                                            Blocked
                                        @else
                                            Blocked
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>



@endsection
