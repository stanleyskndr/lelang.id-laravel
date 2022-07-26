@extends('layouts.template')

@section('nav-menu-guest')
    <li class="nav-item">
        <a  href="{{ route('home') }}">All Shoes</a>
    </li>
    @if (Route::has('register'))
        <li class="nav-item">
            <a href="{{ route('register') }}">{{ __('Register') }}</a>
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
        <a class="" href="/viewCart">{{ __('Cart') }}</a>
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
    <div class="shoes-detail">
            <div class="shoes-detail-img">
                <img class="" src="{{ $shoes->shoe_image }}" alt="{{ $shoes->shoe_image }}">
            </div>
            <div class="shoes-detail-body">
                <form method="POST" action=" {{ route('destroy_shoes', $shoes->id) }}" enctype="multipart/form-data">
                    @csrf
                    <h3>{{ $shoes->shoe_name }}</h3>
                    <div class="mt-2">{{ $shoes->shoe_description }}</div>
                    <div class="mt-1">Rp. {{ $shoes->shoe_price }}</div>
                    <button class="btn btn-danger    mt-3">{{ __('Delete Shoes') }} </button>
                </form>
            </div>
    </div>
</div>
@endsection
