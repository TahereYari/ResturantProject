@extends('Layoute.home')

@section('content')

<h1>{{ $category->name }}</h1>
@foreach ($category->products() as $product)
          
<div class="card mt-1 ms-1" style="width: 15rem;">
 
   <div class="card-body text-center">
   
     <h4 class="card-title">{{ $product->name }}</h4>
     
     <p class="text-muted">خرید ریال{{ $product->price }}</p>

   </div>
   @if(Auth::user())
   <a href="" class="btn btn-primary mb-3" data-abc="true">Add</a>
   @endif
   
@endforeach

@endsection