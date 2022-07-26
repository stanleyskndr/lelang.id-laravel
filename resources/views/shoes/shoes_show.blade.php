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
        <a href="/viewCart">My bids</a>
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

@section('title')
    <title>{{ $shoes->shoe_name }} - Lelang.ID</title>
@endsection

@section('content')
<div class="content-con">
    <div class="productpage-con">
        <div class="productpage-upper">
            <div class="productpage-image">
                <img class="" src="{{ $shoes->shoe_image }}" alt="{{ $shoes->shoe_image }}">
            </div>
            <div class="productpage-body">
                <div class="productpage-header">
                    <h2>{{ $shoes->shoe_name }}</h2>
                    <h5>Brand New</h5>
                </div>
                <hr>
                <div class="productpage-bid">
                    <div class="productpage-bid-detail">
                        <h5>CURRENT BID</h5>
                        <p>Rp{{ $shoes->shoe_bid }}</p>
                        <h6>By {{ $shoes->user->username }}</h6>
                    </div>
                    <div class="productpage-bid-detail">
                        <h5>ENDS IN</h5>
                        <div class="bid-countdown">
                            <div id="countdown"></div>
                        </div>
                        <h6>Ends at {{$shoes->end}}</h6>      
                    </div> 
                </div>
                <hr>
                <div class="productpage-bid-input">
                    @guest
                        <h5>PLACE BID</h5>
                        <div class="invalid-feedback">
                            <h4>You need to login to bid.</h4>
                        </div>
                    @else
                        @if (auth::check() && auth::user()->role == 0)
                            {{-- <form method="GET" action=" {{ route('bid_shoes', $shoes->id) }}">
                                @csrf
                                <div class="qty-input"> 
                                    <input id="quantity" placeholder="Enter Quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" autofocus>
                                    <button class="">Bid</button>
                                </div>    
                            </form>              --}}
                            <h5>PLACE BID</h5>
                            @php
                                date_default_timezone_set("Asia/Jakarta");
                                $end = $end;
                                $distance = strtotime($end) - time();
                            @endphp

                            @if ($distance <= 0)
                                <span class="invalid-feedback" role="alert">
                                    <strong>You can't place bid on auction that already ended.</strong>
                                </span>
                            @else
                                <form method="POST" action=" {{ route('update_shoes', $shoes->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-input">
                                        <p>Rp</p>
                                        <input id="bid" type="text" class="form-control @error('bid') is-invalid @enderror" name="bid" value="{{ $shoes->shoe_bid}}" autofocus>
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Confirm Bid') }}
                                        </button> 
                                    </div>
                                    @if($errors->any()) <h4 style="color: red;">{{$errors->first()}}</h4> 
                                        @endif 
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror                 
                                </form>
                            @endif
                        @else
                            @if (auth::check() && auth::user()->role == 1)
                                {{-- <a href="{{ route('bid_shoes', $shoes->id) }}"></a> --}}
                                <h5>CLOSE BID</h5>
                                <div class="close-bid">
                                    <form method="POST" action=" {{ route('destroy_shoes', $shoes->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        <button >{{ __('Delete Auction') }} </button>
                                    </form>
                                </div>     
                            @endif           
                        @endif
                    @endguest
                </div>  
            </div>
        </div>

        <div class="productpage-bottom">
            <div class="productpage-desc">
                <h5>DESCRIPTION</h5>
                <p class="">{{ $shoes->shoe_description }}</p>
            </div>
        </div>
    </div>
</div>

<script>
    CountDownTimer('{{$start}}', 'countdown');
    function CountDownTimer(dt, id)
    {
        var end = new Date('{{$end}}');
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

            document.getElementById(id).innerHTML = days +"d ";
            document.getElementById(id).innerHTML += hours + 'h ';
            document.getElementById(id).innerHTML += minutes + 'm ';
            document.getElementById(id).innerHTML += seconds + 's';
        }
        timer = setInterval(showRemaining, 1000);
    }
</script>
@endsection
