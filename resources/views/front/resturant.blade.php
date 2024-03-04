@extends('Layoute.home')

@section('content')

    <h2 class="alert alert-primary">رستوران {{ $resturant->title }} </h2>
 
    <div class="container">

    <div class="row">

            <img src={{ asset('image/' .$resturant->image) }}  height="300" alt="">
    </div>

        <div class="row">
            <p class="card-text">{{ $resturant->address }}</p>
        </div>


        <div class="row">
          <p class="card-text">{!!$resturant->description !!}</p>
      </div>

   <div class="container">
    @foreach ($baskets as $basket)
  


    <p> Name:: {{ $basket->product()->name }}</p>

    <p> Count:: {{ $basket->count }}</p>
    <p> Price:: {{ $basket->product()->price }}</p>
    <a href="{{ route('basket.delete' ,['id' =>$basket->id]) }}">Delete</a>

    @endforeach
<br>
    <a href="{{ route ('basket.checkout', ['user_id' =>Auth::user()->id])}}" class="btn btn-warning mb-3" data-abc="true">Checkout</a>

    <div class="row">
      <a href="{{ route('resturant' ,['id' =>$resturant->id ])}}">all</a>
      @foreach($categories as  $category)

        <a href="{{ route('resturant' ,['id' =>$resturant->id  , 'category' => $category->id]) }}">{{ $category->name }}</a>
      @endforeach
    </div>
    <div class="row">
       @foreach ($products as $product)
          
       <div class="card mt-1 ms-1" style="width: 15rem;">
        
          <div class="card-body text-center">
          
            <h4 class="card-title">{{ $product->name }}</h4>
            
            <p class="text-muted">خرید ریال{{ $product->price }}</p>
            @if(Auth::user())

             <a href="{{ route('basket.add' ,['product_id' =>$product->id , 'resturant_id'=>$resturant->id]) }}" class="btn btn-primary mb-3" data-abc="true">Add</a>

            @endif
           
          </div>
     
      
  </div>
       
       @endforeach
      
     

 </div>

</div>
    

@endsection
   

    
   
