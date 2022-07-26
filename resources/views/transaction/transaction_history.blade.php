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
        <h2>Transaction History</h2>
        <hr>
    </div>
    
    <div class="transaction-group">
        @if (count($transaction) > 0)
            @foreach($transaction as $transaction)
                <a class="" href="/viewTransactionDetail/{{ $transaction->id }}">
                    <div class="transaction-con">
                        <div class="transaction-detail">
                            <h4>Transaction at {{ $transaction->created_at }}</h4>
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

                        <div class="transaction-img">
                            @foreach ($transaction->transactionDetails as $trans)
                                <img src="{{$trans->shoes->shoe_image}}" alt="">
                            @endforeach
                        </div>
                    </div>
                </a>
            @endforeach
        @else
            <div class="empty-alert">
                <img src="/storage/images/empty.png" alt="">
                <h2 class="">Your don't have any transaction :(</h2>
            </div>
        @endif
    </div>
</div>
@endsection
