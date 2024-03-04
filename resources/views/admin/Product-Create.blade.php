@extends('Layoute.admin')

@section('content')

<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- Default box -->
        <form action="{{ route('product_insert') }}" method="post">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name"  name="name" placeholder="Name">
            </div>
            <div class="form-group">
              <label for="price">price</label>
              <input type="number" class="form-control" id="price"  name="price" placeholder="price">
            </div>
            <div class="form-group">
                    <label>Category</label>
                    <select name="category" class="form-control">
                        @foreach ($categories as $category )
                        <option value= "{{ $category -> id }}">{{ $category -> name }} </option>
                        @endforeach
                     
                    
                    </select>
             </div>

             <div class="form-group">
                    <label>Resturant</label>
                    <select name="resturant" class="form-control">
                        @foreach ( $resturants as  $resturant)
                        <option  value= {{ $resturant->id }}  > {{ $resturant->title }} </option> 
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