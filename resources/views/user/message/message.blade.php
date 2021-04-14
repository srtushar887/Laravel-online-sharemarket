@extends('layouts.user')
@section('user')
    <div class="d-lg-flex mb-4">
        <div class="chat-leftsidebar">
            <div class="p-3 border-bottom">
                <div class="media">
                    <div class="align-self-center mr-3">
                        <img src="https://t3.ftcdn.net/jpg/03/46/83/96/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg" class="avatar-xs rounded-circle" alt="">
                    </div>
                    <div class="media-body">
                        <h5 class="font-size-15 mt-0 mb-1">Ricky Clark</h5>
                        <p class="text-muted mb-0"><i class="mdi mdi-circle text-success align-middle mr-1"></i> Active</p>
                    </div>

                </div>
            </div>



            <div class="tab-content py-4">
                <div class="tab-pane show active" id="chat">
                    <div>
                        <h5 class="font-size-14 px-3 mb-3">Users</h5>
                        <ul class="list-unstyled chat-list" data-simplebar style="max-height: 500px;">
                            @foreach($users as $user)
                            <li class="users" id="{{$user->id}}">
                                <a href="#">
                                    <div class="media">

                                        <div class="user-img online align-self-center mr-3">
                                            <img src="https://t3.ftcdn.net/jpg/03/46/83/96/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg" class="rounded-circle avatar-xs" alt="">
                                            <span class="user-status"></span>
                                        </div>

                                        <div class="media-body overflow-hidden">
                                            <h5 class="text-truncate font-size-14 mb-1">{{$user->name}}</h5>
                                            <p>{{$user->email}}</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @endforeach








                        </ul>
                    </div>
                </div>




            </div>
        </div>

        <div class="w-100 user-chat mt-4 mt-sm-0" id="messages">

        </div>
    </div>
@endsection
@section('js')
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>

        var receiver_id = '';
        var my_id ="{{Auth::user()->id}}";

        $(document).ready(function () {


            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('aa7d11419e97e0f9a843', {
                cluster: 'ap4'
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function(data) {
                // alert(JSON.stringify(data));

                if (my_id == data.from){
                    $('#' + data.to).click();
                }else if(my_id == data.to){
                    if (receiver_id == data.from){
                        $('#'+data.from).click();
                    }else {
                        var pending = '';
                        // if (pending){
                        //     $('#'+data.from).find('.pending').html(pending + 1);
                        // }else {
                        //     $('#'+data.from).append('<span class="pending">1</span>');
                        // }
                    }
                }

            });





            $('.users').click(function () {
                $('.users').removeClass('active');
                $(this).addClass('active');

                receiver_id = $(this).attr('id');
                $.ajax({
                    type: "get",
                    url : "message-get/"+receiver_id,
                    data:"",
                    cache:false,
                    success:function (data) {
                        $('#messages').html(data);
                        console.log(data)
                    }
                })


            });


            $(document).on('click','#messagesendbtn',function (e) {
                e.preventDefault();
                var message = $('#chatmsg').val();
                var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                $.ajax({
                    type: "post",
                    url: "send-message",
                    data : {
                        '_token' : "{{csrf_token()}}",
                        'receiver_id' : receiver_id,
                        'message' : message,
                    },
                    cache: false,
                    success:function (data){
                        // $(".message-wrapper").animate({ scrollTop: $('.message-wrapper').prop("scrollHeight")}, 0);
                        console.log(data)
                    },
                    error:function (jqXHR,status,err){

                    },
                    complete:function (){

                    }
                })

            })


        })
    </script>
@endsection
