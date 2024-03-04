@extends('Layoute.admin')

@section('content')

<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- Default box -->
        <form action="{{ route('resturant_update') }}" method="post" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name"  name="name" placeholder="Name" value="{{ $resturant->title }}">
            </div>
            <div class="form-group">
              
              <label for="Listed">Listed</label>
              <input type="checkbox" class="form-control" id="is_list"  name="is_list"  value=1 {{ $resturant->is_list == 1 ? 'checked' : ''  }}>
            </div>
            <div class="form-group">
              <label>Address</label>
              <textarea class="form-control" rows="3"  name="Address" placeholder="Address ...">{{ $resturant->address }}</textarea>
            </div>
            <div class="form-group">
             
              <label>Description</label>
              <textarea class="form-control" rows="3" name="Description" id="tiny" placeholder="Address ...">{{ $resturant->description }}</textarea>
            </div>

            <div class="form-group">
              <label>Image</label>
              <input type="file" class="form-control" name="image" id="image" placeholder="image" value="{{ $resturant->image }}">
            <img src="{{ asset("image/" .$resturant->image) }}" alt="">
            </div>
            <div class="form-group">
            
              <input type="hidden" class="form-control" name="id"  placeholder="image" value="{{ $resturant->id }}">
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
  @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif
@endsection