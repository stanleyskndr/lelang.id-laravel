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
        <a class=""  href="/viewTransactionHistory">{{ __('Transaction History') }}</a>
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
        <a class=""  href="/viewUserTransaction">{{ __('All User Transaction') }}</a>
    </li>
    <li class="nav-item">
        <a class="" href="/viewAllUser">{{ __('All User') }}</a>
    </li>
@endsection

@section('content')
<div class="content-con">
    <div class="middle-title">
        <h2>Bid shoes</h2>
        <hr>
    </div>
    <div class="edit-shoes-detail">
        <div class="edit-shoes-detail-img">
            <img class="card-img-top" src="{{ $shoes->shoe_image }}" alt="{{ $shoes->shoe_image }}">
        </div>
        <div class="edit-shoes-detail-body">
            <form method="POST" action=" {{ route('update_shoes', $shoes->id) }}" enctype="multipart/form-data">
                @csrf

                <div class="form-input">
                    <h4 class="">Last bid: {{ $shoes->shoe_bid }}</h4>
                    <label for="bid" class="">{{ __('Bid: ') }}</label>
                    <input id="bid" type="text" class="form-control @error('bid') is-invalid @enderror" name="bid" value="{{ $shoes->shoe_bid}}" autofocus>

                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    {{ __('Confirm bid') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
