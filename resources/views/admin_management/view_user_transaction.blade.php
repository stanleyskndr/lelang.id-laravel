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
        <a class="current-page"  href="/viewTransactionHistory">{{ __('Transaction History') }}</a>
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
        <a class="current-page"  href="/viewUserTransaction">{{ __('All User Transaction') }}</a>
    </li>
    <li class="nav-item">
        <a class="" href="/viewAllUser">{{ __('All User') }}</a>
    </li>
@endsection

@section('content')
<div class="content-con">
    <div class="middle-title">
        <h2>All User Transaction</h2>
        <hr>
    </div> 
    @if (count($transactions) > 0)
        <div class="cart-group">
            @foreach($transactions as $transaction)
                <a class="" href="/viewTransactionDetail/{{ $transaction->id }}">
                    <div class="admin-trans-con">
                        <div class="admin-trans-img">
                            @foreach ($transaction->transactionDetails as $trans)
                                <img src="{{$trans->shoes->shoe_image}}" alt="">
                            @endforeach
                        </div>

                        <div class="admin-trans-body">
                            <h4>Transaction at {{ $transaction->created_at }}</h4>
                            <p>User: {{ $transaction->userDetail->username }} ({{ $transaction->userDetail->id }})</p>
                            @php
                                $totalPrice = 0;
                            @endphp
                            @foreach ($transaction->transactionDetails as $trans)
                                @php
                                    $shoeQuantity = $trans->quantity;
                                    $shoePrice = $trans->shoes->shoe_price;
                                    $totalPrice = $totalPrice + ($shoeQuantity * $shoePrice);
                                @endphp      
                            @endforeach
                            <p>Total Price: Rp{{ $totalPrice }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <h3>You have no transaction yet</h3>
    @endif
</div>
@endsection
