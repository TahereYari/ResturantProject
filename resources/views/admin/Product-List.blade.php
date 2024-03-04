
@extends('Layoute.admin')
@section('content')

<div class="row">
  <div class="col-12">
   
    <!-- /.card -->

    <div class="card">
      <div class="card-header">
      <!-- <button type="button" class="col-1 btn btn-block btn-warning">Create</button> -->

    
      <a href="{{ route('product_create') }}" class="col-1 btn btn-block btn-warning">Create</a>
 
        <h3 class="card-title">DataTable with default features</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
     
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Resturant</th>
             <th>Category</th>
             <th>Delete</th>
             <th>Edit</th>
          </tr>
          </thead>
          <tbody>

            @foreach ($products as $product)
            <tr>
              <td>{{ $product->name }}</td>
              <td>{{ $product->price }}</td>
              <td>{{ $product->resturant()->title }}</td>
              <td>{{ $product->category()->name }}</td>
              <td><a href="{{ route('product_delete',['id' => $product->id] )}}">Delete</a></td>
              <td><a href="{{ route('product_edit' ,['id' => $product->id]) }}">Edit</a></td>
           </tr>
            @endforeach
           

          </tbody>
          <tfoot>
          <tr>
            <th>Name</th>
            <th>Price</th>
             <th>Delete</th>
             <th>Edit</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>


@endsection
