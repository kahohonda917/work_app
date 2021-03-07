@extends('layouts.app')
@section('css')
    <style type="text/css">
        .card{
            border:10px solid #2D4262;
            border-radius: 30px 0px 30px 0px;
        }
        .card-header{
            color:white;
            background-color: #2D4262;
        }
        .card-header:first-child{
            border-radius: 0px;
        }
        .btn-primary{
            background-color: #2D4262;
            width:200px
        }
    </style>
@endsection

@section('content')
<div class="container" style="margin:100px auto">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('メールアドレスを承認する') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
		                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
	                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
