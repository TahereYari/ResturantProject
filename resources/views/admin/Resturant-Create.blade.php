@extends('Layoute.admin')

@section('content')

<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- Default box -->
        <form action="{{ route('resturant_insert') }}" method="post" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <br>
              @error('name')
                <span>نام را بررسی کنید</span>
              @enderror
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name"  name="name" placeholder="Name">
            </div>

            <div class="form-group">
              
              <label for="Listed">Listed</label>
              <input type="checkbox" class="form-control" id="is_list"  name="is_list" value=1>
            </div>

            <div class="form-group">
              <br>
              @error('Address')
                <span>آدرس را بررسی کنید</span>
              @enderror
              <label>Address</label>
              <textarea class="form-control" rows="3" name="Address"  placeholder="Address ..."></textarea>
            </div>

            <div class="form-group">
             
              <label>Description</label>
              <textarea class="form-control" rows="3" name="Description" id="tiny" placeholder="Address ..."></textarea>
            </div>

            <div class="form-group">
              <br>
              @error('image')
                <span>عکس را بررسی کنید</span>
              @enderror
              <label>Image</label>
              <input type="file" class="form-control" name="image" id="image" placeholder="image">
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