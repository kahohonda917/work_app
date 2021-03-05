@extends('layouts.app')
@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active text-center">
                <img  class="carousel-img" src="{{asset('img/slider1.jpg')}}">
                </div>
                <div class="carousel-item text-center">
                <img class="carousel-img" src="{{asset('img/slider2.jpg')}}">
                </div>
                <div class="carousel-item text-center">
                <img class="carousel-img" src="{{asset('img/slider3.jpg')}}">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="container">
    <div class="row" >
    <div class="col-6">
    <br>
    爽快にストレス解消できる会員制フィットネスクラブ<br>
    最寄駅：水道橋駅、後楽園駅。<br>
    営業時間<br>
    月〜土...6:00~23:00<br>
    日...13:00~21:00<br>
    祝日...10:00~21:00
    </div>
    <div class="col-6">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3239.7750553856513!2d139.75079221520113!3d35.70715273615745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188c38bbf0efcd%3A0x19a5d8e06832fe53!2z44OV44Kj44OD44OI44ON44K544Kv44Op44OW5p2x5Lqs44OJ44O844Og!5e0!3m2!1sja!2sjp!4v1614687183741!5m2!1sja!2sjp" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    </div>
    </div>
@endsection
