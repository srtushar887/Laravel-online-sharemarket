@extends('layouts.user')
@section('user')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Buy</h4>

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
                            @foreach($plans as $plan)
                                <?php
                                $user_name = \App\Models\User::where('id',$plan->user_id)->first();
                                ?>
                                <tr>
                                    <th>{{$user_name->name}}</th>
                                    <th>{{$user_name->phone}}</th>
                                    <th>{{$gn->site_currency}}.{{$plan->amount}}</th>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#chooseplan{{$plan->id}}">
                                            Buy Now
                                        </button>


                                    </td>
                                </tr>



                                <div class="modal fade" id="chooseplan{{$plan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Buy Share</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('user.buy.share.save')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        are your sure to buy this share ?
                                                        <input type="hidden" class="form-control" placeholder="Enter Plan Name" name="choose_plan" value="{{$plan->id}}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

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
