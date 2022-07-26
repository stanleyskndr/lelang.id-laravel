@extends('layouts.app')

@section('content')
<div class="row display-4">Freshen up with new shoes!</div>
@if (!auth::check() || auth::user()->role == 0)
    <form method="GET" action="{{ route('search_shoes') }}">
        <div class="form-group d-flex justify-content-center mt-3 align-items-center">
            <label for="name" class="col-form-label">Search Shoes:</label>
            <span class="col-sm-8">
                <input type="text" class="form-control" id="name" name="name" placeholder="Search your favorite pair of shoes">
            </span>
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
@else
    <a href="/createShoes"><button class="btn btn-dark text-white mt-3">Add Shoes</button></a>
@endif
<div class="d-flex justify-content-center flex-wrap mt-4">
    @if (count($shoes) > 0)
        @foreach ($shoes as $shoe)
            <a class="text-decoration-none" href="/shoeDetail/{{ $shoe->id }}">
                <div class="card mr-4 mb-4" style="width: 18rem;">
                    <img class="card-img-top" style="height: 200px" src="{{ $shoe->shoe_image }}" alt="{{ $shoe->shoe_image }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $shoe->shoe_name }}</h5>
                        <h6 class="card-subtitle mb-1 text-muted">{{ $shoe->shoe_description }}</h6>
                        <p class="card-text">Rp. {{ $shoe->shoe_price }}</p>
                        @if (auth::check() && auth::user()->role == 1)
                            <div class="d-flex justify-content-between mt-3">
                                <a href="editShoes/{{ $shoe->id }}">
                                    <button class="btn btn-primary">
                                        {{ __('Update shoes') }}
                                    </button>
                                </a>
                                <a href="deleteShoes/{{ $shoe->id }}">
                                    <button class="btn btn-danger">
                                        {{ __('Delete Shoes') }}
                                    </button>
                                </a>
                            </div>
                        @endif  
                    </div>
                </div>
            </a>
        @endforeach
    @else
        <h3>No Shoes Found</h3>
    @endif
</div>
<div class="d-flex justify-content-center">
    {{ $shoes->links() }}
</div>
@endsection
