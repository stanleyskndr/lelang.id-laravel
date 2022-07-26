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
    <title>Create Auction - Lelang.ID</title>
@endsection

@section('content')
<div class="content-con">
    <div class="create-auction-con">
        <div class="create-auction-header">
            <h2>Create New Auction</h2>
            <hr>
        </div>  
        <div class="create-auction-body">
            <form method="POST" action="{{ route('store_shoes') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-input">
                    <label for="name" class="">{{ __('Item Name') }}</label>
                    <input id="name" type="text" class=" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-input desc-input">
                    <label for="description" >{{ __('Item Description') }}</label>
                    <input  id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autofocus>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-input-image">
                    <label for="image" >{{ __('Item Image') }}</label>
                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autofocus>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="create-auction-button">
                    <button type="submit" class="">
                        {{ __('Add Item') }}
                    </button>
                </div>
                

            </form>
        </div>
    </div>
    
</div>
@endsection
