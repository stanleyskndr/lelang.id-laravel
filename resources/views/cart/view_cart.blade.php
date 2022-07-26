@extends('layouts.template')
@section('nav-menu-guest')
    <li class="nav-item">
        <a href="">Home</a>
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
        <a class="current-page" href="/viewCart">My bids</a>
    </li>
    <li class="nav-item">
        <a href="/viewTransactionHistory">
            <img src="/storage/res/message-icon.png" alt="">
        </a> 
    </li>
    <li class="nav-item">
        <a href="/viewTransactionHistory">
            <img src="/storage/res/notif-icon.png" alt="">
        </a> 
    </li>
@endsection

@section('nav-menu-admin')
    <li class="nav-item">
        <a href="">Home</a>
    </li>
    <li class="nav-item">
        <a class="" href="/viewUserTransaction">{{ __('All Transaction') }}</a>
    </li>
    <li class="nav-item">
        <a href="/createShoes">
            <button class="">Create Auction</button>
        </a> 
    </li>
@endsection

@section('content')
<div class="content-con">
    <div class="create-auction-header">
        <h2>My Bids</h3>
        <hr>
    </div>
    <div class="cart-group">
        <div class="section-header">
            <h3>Ongoing Auctions</h3>
        </div>
        <div class="auctions-con">
            @if (count($shoes) > 0)
                @foreach ($shoes as $shoe)
                    @php
                        date_default_timezone_set("Asia/Jakarta");
                        $now = date('d-m-y H:i:s', time());
                        $end = $shoe->end;
                        $distance = strtotime($end) - time();
                    @endphp

                    @if ($distance > 0)
                        <a href="/shoeDetail/{{ $shoe->id }}">
                            <div class="product-card">
                                <div class="product-image">
                                    <img class="" src="{{ $shoe->shoe_image }}" alt="{{ $shoe->shoe_image }}">
                                </div>
                                <div class="product-countdown">
                                    <img src="/storage/res/time-icon.png" alt="">
                                    <script>
                                        CountDownTimer('{{$shoe->start}}', 'countdown');
                                        function CountDownTimer(dt, oldid)
                                        {
                                            var id = oldid.concat('{{$shoe->id}}') 
                                            var end = new Date('{{$shoe->end}}');
                                            var _second = 1000;
                                            var _minute = _second * 60;
                                            var _hour = _minute * 60;
                                            var _day = _hour * 24;
                                            var timer;
                                            function showRemaining() {
                                                var now = new Date();
                                                var distance = end - now;
                                                if (distance < 0) {
                                                    clearInterval(timer);
                                                    document.getElementById(id).innerHTML = '<b class="color-red">Auction Ended.</b> ';
                                                    return;
                                                }
                                                var days = Math.floor(distance / _day);
                                                var hours = Math.floor((distance % _day) / _hour);
                                                var minutes = Math.floor((distance % _hour) / _minute);
                                                var seconds = Math.floor((distance % _minute) / _second);
                                    
                                                document.getElementById(id).innerHTML = days + "d ";
                                                document.getElementById(id).innerHTML += hours + 'h ';
                                                document.getElementById(id).innerHTML += minutes + 'm ';
                                                document.getElementById(id).innerHTML += seconds + 's';
                                            }
                                            timer = setInterval(showRemaining, 1000);
                                        }
                                    </script>
                                    <p id="countdown{{$shoe->id}}"></p>
                                </div>                           
                                <div class="product-body">
                                    <p class="card-title">{{ $shoe->shoe_name }}</p>
                                    <div class="product-detail bid-again">
                                        <div class="product-bid">
                                            <h6>CURRENT BID</h6>
                                            <p>Rp{{ $shoe->shoe_bid }}</p>
                                        </div>
                                        <h5>Bid Again</h5>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach
            @else
                <div class="empty-alert">
                    <h2>No Product Found :(</h2>
                </div>     
            @endif
        </div>

        <div class="section-header">
            <h3>Past Auctions</h3>
        </div>
        <div class="auctions-con">
            @if (count($shoes) > 0)
                @foreach ($shoes as $shoe)
                    @php
                        date_default_timezone_set("Asia/Jakarta");
                        $end = $shoe->end;
                        $distance = strtotime($end) - time();
                    @endphp

                    @if ($distance <= 0)
                        <a href="/shoeDetail/{{ $shoe->id }}">
                            <div class="product-card">
                                <div class="product-image">
                                    <img class="" src="{{ $shoe->shoe_image }}" alt="{{ $shoe->shoe_image }}">
                                </div>
                                <div class="product-countdown auction-ended">
                                    <img src="/storage/res/time-icon.png" alt="">
                                    <p>Ended</p>
                                </div>                           
                                <div class="product-body">
                                    <p class="card-title">{{ $shoe->shoe_name }}</p>
                                    <div class="product-detail">
                                        <div class="product-bid">
                                            <h6>WINNING BID</h6>
                                            <p>Rp{{ $shoe->shoe_bid }}</p>
                                        </div>
                                        <h5>Brand New</h5>
                                    </div>
                                </div>
                            </div>
                        </a>  
                    @endif
                @endforeach
            @else
                <div class="empty-alert">
                    <h2>No Product Found :(</h2>
                </div>     
            @endif
        </div>

            {{-- <div class="shoes-detail">
                <div class="shoes-detail-img">
                    <img class="" src="{{ $shoe->shoe_image }}" alt="{{ $shoe->shoe_image }}">
                </div>

                <div class="shoes-detail-body">
                    <h2>{{ $shoe->shoe_name }}</h2>
                    <h4 class="">Rp{{ $shoe->shoe_bid }}</h4>
                    <div class="cart-detail-cta">
                </div>
            </div> --}}
        @if (count($shoes) == 0)
        <div class="empty-alert">
            <h2 class="">You haven't bid yet :(</h2>
        </div>    
        @endif
    </div>
</div>
@endsection
