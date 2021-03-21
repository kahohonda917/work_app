@extends('layouts.app')
@section('css')
<style type="text/css">
    .container{max-width:1170px; margin:auto;}
    img{ max-width:100%;}
    .inbox_people {
        background: #f8f8f8 none repeat scroll 0 0;
        float: left;
        overflow: hidden;
        width: 40%; border-right:1px solid #c4c4c4;
    }
    .inbox_msg {
        border: 1px solid #c4c4c4;
        clear: both;
        overflow: hidden;
    }
    .top_spac{ margin: 20px 0 0;}


    .recent_heading {float: left; width:40%;}
    .srch_bar {
        display: inline-block;
        text-align: right;
        width: 60%; padding:
    }
    .headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

    .recent_heading h4 {
        color: #05728f;
        font-size: 21px;
        margin: auto;
    }
    .srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
    .srch_bar .input-group-addon button {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        padding: 0;
        color: #707070;
        font-size: 18px;
    }
    .srch_bar .input-group-addon { margin: 0 0 0 -27px;}

    .chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
    .chat_ib h5 span{ font-size:13px; float:right;}
    .chat_ib p{ font-size:14px; color:#989898; margin:auto}
    .chat_img {
        float: left;
        width: 11%;
    }
    .chat_ib {
        float: left;
        padding: 0 0 0 15px;
        width: 88%;
    }

    .chat_people{ overflow:hidden; clear:both;}
    .chat_list {
        border-bottom: 1px solid #c4c4c4;
        margin: 0;
        padding: 18px 16px 10px;
    }
    .inbox_chat { height: 550px; overflow-y: scroll;}

    .active_chat{ background:#ebebeb;}

    .incoming_msg_img {
        display: inline-block;
        width: 6%;
    }
    .received_msg {
        display: inline-block;
        padding: 0 0 0 10px;
        vertical-align: top;
        width: 92%;
    }
    .received_withd_msg p {
        background: #ebebeb none repeat scroll 0 0;
        border-radius: 3px;
        color: #646464;
        font-size: 14px;
        margin: 0;
        padding: 5px 10px 5px 12px;
        width: 100%;
    }
    .time_date {
        color: #747474;
        display: block;
        font-size: 12px;
        margin: 8px 0 0;
    }
    .received_withd_msg { width: 57%;}
    .mesgs {
        float: left;
        padding: 30px 15px 0 25px;
        width: 60%;
    }

    .sent_msg p {
        background: #05728f none repeat scroll 0 0;
        border-radius: 3px;
        font-size: 14px;
        margin: 0; color:#fff;
        padding: 5px 10px 5px 12px;
        width:100%;
    }
    .outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
    .sent_msg {
        float: right;
        width: 46%;
    }
    .input_msg_write input {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        color: #4c4c4c;
        font-size: 15px;
        min-height: 48px;
        width: 100%;
    }

    .type_msg {border-top: 1px solid #c4c4c4;border-bottom: 1px solid #c4c4c4;position: relative;}
    .msg_send_btn {
        background: #73605B none repeat scroll 0 0;
        border: medium none;
        border-radius: 50%;
        color: #fff;
        cursor: pointer;
        font-size: 17px;
        height: 33px;
        position: absolute;
        right: 0;
        top: 11px;
        width: 33px;
    }
    .messaging { padding: 0 0 50px 0;}
    .msg_history {
        height: 516px;
        overflow-y: auto;
    }

</style>
@endsection

@section('javascript')

<!-- <script>

    // function scrollLinkTest01() {
    //     var divElement = document.getElementById( "scroll-inner" );
    //     var height = divElement.clientHeight;
    //     console.log(height);
    //     divElement.scrollTop(height);
    // }

        var divElement = document.getElementById( "scroll-inner" ) ;
        var height = divElement.clientHeight;
        divElement.scrollTop = divElement.scrollHeight;;
        console.log(divElement.scrollTop);

    // console.log(height);
    // scrollHeight = divElement.scrollTop;
    // divElement.scrollTop = height;
    // console.log(divElement.scrollTop);
    

</script> -->
@endsection

@section('content')
    <div class="container">
        <h3 class=" text-center">Messaging</h3>
        <div class="messaging">
            <div class="inbox_msg">
                <div class="inbox_people">
                    <div class="headind_srch">
                        <div class="recent_heading">
                            <h4>User</h4>
                        </div>
                <form action="/search" method="post">
                        @csrf 
                        <div class="srch_bar">
                            <div class="stylish-input-group">
                                <input type="text" class="search-bar" name="search_name"  placeholder="Search" >
                                <span class="input-group-addon">
                
                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i> </button>
                    <!-- <button type="submit">検索</button> -->
                
                </span> </div>
                        </div>
                </form>
                    </div>
                    <div class="inbox_chat">
                    
                        
                            @foreach($users as $user)
                            <div class="chat_list">
                            <div class="chat_people">
                                <div class="chat_img"> <img src="{{asset('img/sheep2.png')}}" alt="sunil"> </div>
                                <div class="chat_ib">
                                    <h5>{{ $user -> name }}</h5>
                                    
                                        <a href="/chat/{{$user->id}}"><input type="button" class="btn btn-primary" value="Chat"></a>
                                </div>
                            </div>
                            </div>
                            
                            @endforeach
                            <!-- $message -> FromUser() -> first() -> name  -->
                        
                    </div>
                </div>
                
                <div class="mesgs" >
                    <div class="msg_history" id="scroll-inner">
                    <a href="#msg_send_btn">下へ</a>
                    @foreach($messages as $key => $message)
                    <!-- 送信したメッセージ -->
                    @if($message->from_user_id == \Illuminate\Support\Facades\Auth::id())
                    <div class="outgoing_msg">
                            <div class="sent_msg">
                                <p>{{ $message -> message }}</p>
                                <span class="time_date"> {{ $message -> created_at }}</span> </div>
                        </div>
                    @endif
                    <!-- 受信したメッセージ -->
                    @if($message->to_user_id == \Illuminate\Support\Facades\Auth::id())
                    <div class="incoming_msg">
                            <div class="incoming_msg_img"> <img src="{{asset('img/sheep2.png')}}" alt="sunil"> </div>
                            <div class="received_msg">
                                <div class="received_withd_msg">
                                    <p>{{ $message -> message }}</p>
                                    <span class="time_date"> {{ $message -> created_at }}</span></div>
                            </div>
                    @endif
                    @endforeach




                    <!-- @foreach($kochas as $kocha)
                    <div class="incoming_msg">
                            <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="received_msg">
                                <div class="received_withd_msg">
                                    <p>{{ $kocha -> message }}</p>
                                    <span class="time_date"> {{ $kocha -> created_at }}</span></div>
                            </div>

                    
                    @endforeach

                    @foreach($sentkochas as $sentkocha)
                    <div class="outgoing_msg">
                            <div class="sent_msg">
                                <p>{{ $sentkocha -> message }}</p>
                                <span class="time_date"> {{ $sentkocha -> created_at }}</span> </div>
                        </div>
                    @endforeach -->

                    <div class="type_msg">
                        <div class="input_msg_write">
                        <form method="POST">
                            @csrf 
                            <input type="text" class="write_msg" placeholder="{{ $user_t -> name}}" name="message"/>
                            
                            <a href="#msg_send_btn"><button class="msg_send_btn" type="submit" id="msg_send_btn">⇧<i class="fa fa-paper-plane-o" aria-hidden="true"></i></button></a>
                        </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection
