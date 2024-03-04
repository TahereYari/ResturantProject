@extends('Layoute.admin')

@section('content')

<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- Default box -->
        <form action="{{ route('category_update') }}" method="post">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name"  name="name" placeholder="Name" value="{{ $category->name }}">
            </div>
            <div class="form-group">
              <label>Description</label>
              <textarea class="form-control" rows="3" name="Description" placeholder="Description ...">{{ $category->description }}</textarea>
            </div>

            <div class="form-group">
               
                <input type="hidden" class="form-control" id="id"  name="id" value="{{ $category->id }}">
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