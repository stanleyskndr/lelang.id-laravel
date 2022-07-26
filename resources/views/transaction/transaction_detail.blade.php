@extends('layouts.template')

@section('nav-menu-guest')
    <li class="nav-item">
        <a  href="{{ route('home') }}">All Shoes</a>
    </li>
    @if (Route::has('register'))
        <li class="nav-item">
            <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
    @endif
    <li class="nav-item">
        <a href="{{ route('login') }}">{{ __('Login') }}</a>
    </li>
@endsection

@section('nav-menu-user')
    <li class="nav-item">
        <a href="{{ route('home') }}">All Shoes</a>
    </li>
    <li class="nav-item">
        <a class="" href="/viewTransactionHistory">{{ __('Transaction History') }}</a>
    </li>
    <li class="nav-item">
        <a  href="/viewCart">{{ __('Cart') }}</a>
    </li>
@endsection

@section('nav-menu-admin')
    <li class="nav-item">
        <a href="{{ route('home') }}">All Shoes</a>
    </li>
    <li class="nav-item">
        <a class="" href="/viewUserTransaction">{{ __('All User Transaction') }}</a>
    </li>
    <li class="nav-item">
        <a class="" href="/viewAllUser">{{ __('All User') }}</a>
    </li>
@endsection

@section('content')
<div class="content-con">
    <div class="middle-title">
        <h2>Transaction Detail</h3>
        <hr>
    </div>
    <div class="cart-group">
        @foreach($details as $detail)
            <div class="shoes-detail">
                <div class="shoes-detail-img">
                    <img class="" src="{{ $detail->shoes->shoe_image }}" alt="{{ $detail->shoes->shoe_image }}">
                </div>
                <div class="trans-detail-body">
                    <h3>{{ $detail->shoes->shoe_name }}</h3>
                    <p class="mt-2">Rp. {{ $detail->shoes->shoe_price }}</p>
                    <p class="mt-2">Total Price: Rp{{$detail->shoes->shoe_bid }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
