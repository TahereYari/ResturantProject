@extends('Layoute.home')

@section('content')

<div class="row mt-2">
  <form class="row g-3"  action="{{ route('search') }}" method="GET" >
   
    <div class="col-auto">
     
      <input type="text" name="q" class="form-control" id="inputPassword2" >
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-3">Search</button>
    </div>
  </form>
  </div>



<div class="row " style="height:500 px width :200px">
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          @php
            $counter = 0;
          @endphp
          @foreach($sliderResturant as $slider)
            
          <div class="carousel-item {{ $counter == 0 ? 'active'  : '' }}">
            <img src="{{ asset('image/' .$slider ->image) }}" class="d-block w-100" alt="..." height="500">
            <div class="carousel-caption d-none d-md-block">
              <h5>{{ $slider ->title }}</h5>
              <p>{{ $slider ->address }}</p>
            </div>
          </div>
          @php
          $counter ++ ;
        @endphp

          @endforeach
          
      
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
</div>

<div class="row mt-2">
    <h1>جدیدترین ها</h1>
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


    <div class="row mt-2">
        <h1>بهترین ها</h1>
        {{-- @foreach ($bestResturant as $resturant )
          
        
            <div class="card mt-1 ms-1" style="width: 15rem;">
        
            <div class="card-body">
              <a href="{{route('resturant' , ['id' => $resturant->id]) }}">
            
              <h5 class="card-title">{{ $resturant->title }}</h5>
              </a>
              
                <img src="{{ asset('image/'.$resturant->image) }}" width="200" height="100" alt="">
                <p class="card-text">{{ $resturant->address }}</p>
                
        
            </div>
            </div>
            @endforeach --}}
        </div>
        <a href="{{ route('download') }}"><i class="fa fa-download"></i>Download</a>
        <div class="row mt-2">
        <h1> دسته بندی</h1>
        @foreach ($categories as $category )
          
        
            <div class="card mt-1 ms-1" style="width: 15rem;">
        
            <div class="card-body">
              <a href="{{ route('home.category' ,['id'=>$category->id ]) }}">
               <h5 class="card-title">{{ $category->name }}</h5>
              </a>
            </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            <h2>تعداد کاربران</h2>
            <div class="card mt-1 ms-1" style="width: 15rem;">
                <p>{{ $userCount }}</p>
            </div>
        </div>
    {{-- <div class="row" style="margin: 0 auto">
        {{ $resturants->links() }}
    </div> --}}
   
    


@endsection