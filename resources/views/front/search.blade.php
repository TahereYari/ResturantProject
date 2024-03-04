@extends('Layoute.home')

@section('content')

<div class="row mt-2">
    @if (count($resturants)==0)
        <h1>no result found</h1>
    @endif
    @foreach ($resturants as $resturant )
      
    
        <div class="card mt-1 ms-1" style="width: 15rem;">
    
        <div class="card-body">
          <a href="{{route('resturant' , ['id' => $resturant->id]) }}">
        
          <h5 class="card-title">{{ $resturant->title }}</h5>
          </a>
          
            <img src="{{ asset('image/'.$resturant->image) }}" width="200" height="100" alt="">
            <p class="card-text">{{ $resturant->address }}</p>
            
    
        </div>
        </div>
        @endforeach
    </div>

@endsection