@extends('Layoute.admin')

@section('content')

<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- Default box -->
        <form action="{{ route('product_update') }}" method="post">
            @csrf
          <div class="card-body">
            <div class="form-group">
                
                <input type="hidden" class="form-control" id="id"  name="id" value="{{ $product->id }}">
              </div>
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name"  name="name" placeholder="Name" value="{{ $product->name }}">
            </div>
            <div class="form-group">
              <label for="price">price</label>
              <input type="number" class="form-control" id="price"  name="price" placeholder="price" value="{{ $product->price }}">
            </div>
            <div class="form-group">
                    <label>Category</label>
                    <select name="category" class="form-control">
                        @foreach ($categories as $category )
                        @if($category -> id == $product->category_id )
                            <option value= "{{ $category -> id }}" selected>{{ $category -> name }}  </option>
                            @else
                            <option value= "{{ $category -> id }}">{{ $category -> name }} </option>
                        @endif
                       
                        @endforeach
                     
                    
                    </select>
             </div>

             <div class="form-group">
                    <label>Resturant</label>
                    <select name="resturant" class="form-control">
                        @foreach ( $resturants as  $resturant)
                        @if($resturant ->id == $product->resturant_id )
                            <option value= {{ $resturant->id }} selected> {{ $resturant->title }}  </option>  
                            @else
                            <option value= {{ $resturant->id }} > {{ $resturant->title }} </option> 
                        @endif
                       
                        @endforeach
                      
                  
                    </select>
            </div>
        
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
       
        <!-- /.card -->
      </div>
    </div>
  </div>

@endsection