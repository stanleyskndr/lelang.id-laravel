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
        <a class="current-page" href="/viewAllUser">{{ __('All User') }}</a>
    </li>
@endsection

@section('content')
<div class="content-con">
    <div class="middle-title">
        <h2>All Users</h2>
        <hr>
    </div>
    <div class="user-list">
        <div class="user-row">
            <div class="user-id">
                <h4>User Id</h4>
            </div>
            <div class="user-username">
                <h4>Username</h4>
            </div>
            <div class="user-email">
                <h4>Email</h4>
            </div>
        </div>
        @if (count($users) > 0)
            @foreach ($users as $user)
                <div class="user-row">
                    <div class="user-id">
                        <p>{{ ($loop->index+1) }}</p>
                    </div>
                    <div class="user-username">
                        <p>{{ $user->username }}</p>                    
                    </div>
                    <div class="user-email">
                        <p>{{ $user->email }}</p>
                    </div>
                </div>
            @endforeach
        @else
            <h3>There are no user. :(</h3>
        @endif
    </div>
    
</div>
@endsection
