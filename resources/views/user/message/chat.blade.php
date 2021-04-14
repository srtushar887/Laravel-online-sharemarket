<div class="p-3 px-lg-4 user-chat-border">
    <div class="row">
        <div class="col-md-4 col-6">
            <h5 class="font-size-15 mb-1 text-truncate">Frank Vickery</h5>
            <p class="text-muted text-truncate mb-0"><i class="mdi mdi-circle text-success align-middle mr-1"></i> Active now</p>
        </div>
        <div class="col-md-8 col-6">
        </div>
    </div>
</div>

<div class="px-lg-2">
    <div class="chat-conversation p-3 message-wrapper" style="height: 500px;">
        <ul class="list-unstyled mb-0 pr-3" id="usermessages" data-simplebar style="max-height: 450px;" >


           @foreach($messages as $message)
            <li class="{{$message->from == Auth::user()->id ? 'right' : '' }}">
                <div class="conversation-list">
                    <div class="chat-avatar">
                        <img src="https://t3.ftcdn.net/jpg/03/46/83/96/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg" alt="">
                    </div>
                    <div class="ctext-wrap">
                        <div class="conversation-name">Frank Vickery</div>
                        <div class="ctext-wrap-content">
                            <p class="mb-0">
                                {{$message->message}}
                            </p>
                        </div>
                        <p class="chat-time mb-0"><i class="mdi mdi-clock-outline align-middle mr-1"></i> {{date('d M y,h:i a',strtotime($message->created_at))}}</p>
                    </div>

                </div>
            </li>
            @endforeach


            <li>
                <div class="chat-day-title">
                    <span class="title">Today</span>
                </div>
            </li>


        </ul>
    </div>

</div>
<div class="px-lg-3">
    <div class="p-3 chat-input-section">
        <div class="row">
            <div class="col">
                <div class="position-relative">
                    <input type="text" id="chatmsg" name="message" class="form-control chat-input" placeholder="Enter Message...">
                </div>
            </div>
            <div class="col-auto">
                <button type="button" id="messagesendbtn" class="btn btn-primary chat-send w-md waves-effect waves-light"><span class="d-none d-sm-inline-block mr-2">Send</span> <i class="mdi mdi-send"></i></button>
            </div>
        </div>
    </div>
</div>
