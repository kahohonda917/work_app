@extends('layouts.app')
@section('css')
<style type="text/css">
    .jumbotron{
        border: solid 10px white;
        /* background-color:#D09683; */
        /* color:#2D4262; */
    }
    .about{
        background-color:#73605B;
        color:white;
    }
    /* .welcome_container{
        background-color:#D09683;
    
    } */

</style>
@endsection
@section('content')
<div class="welcome_container">
    <div class="jumbotron jumbotron-fluid">
        <!-- <h1 class="display-4">　シフトカレンダー</h1> -->
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
    <div class="about col-6">
    <br>
    爽快にストレス解消できる会員制フィットネスクラブ<br>
    最寄駅：水道橋駅、後楽園駅。<br>
    営業時間<br>
    月〜土...6:00~23:00<br>
    日...13:00~21:00<br>
    祝日...10:00~21:00
    </div>
    <div class="col-6">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d51876.92139547132!2d139.8709295546128!3d35.64479268282813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60187dbb4d2901d7%3A0x63ee51e3b365ddd3!2z5Y2D6JGJ55yM5rWm5a6J5biC!5e0!3m2!1sja!2sjp!4v1644202750777!5m2!1sja!2sjp" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    </div>
    </div>
    </div>
@endsection
