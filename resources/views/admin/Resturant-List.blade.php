
@extends('Layoute.admin')
@section('content')

<div class="row">
  <div class="col-12">
   
    <!-- /.card -->

    <div class="card">
      <div class="card-header">
      <!-- <button type="button" class="col-1 btn btn-block btn-warning">Create</button> -->

    
      <a href={{ route('resturant_Create') }} class="col-1 btn btn-block btn-warning">Create</a>
 
        <h3 class="card-title">DataTable with default features</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
     
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Title</th>
            <th>Address</th>
            <th>Image</th>
             <th>Delete</th>
             <th>Edit</th>
          </tr>
          </thead>
          <tbody>

          
      
           
      @foreach ($resturants as $resturant)
      <tr>
        <td>{{ $resturant->title }}</td>
        <td>{{ $resturant->address }}</td>
        <td> <img src="{{ asset('image/' .$resturant->image) }}" width="100" height="50" alt=""> </td>
        <td><a href="{{ route('resturant_delete' , ['id' => $resturant->id]) }}">Delete</a></td>
        <td><a href="{{ route('resturant_edit' ,['id' => $resturant->id]) }}">Edite</a></td>
     </tr>

      @endforeach
         
          </tbody>
          <tfoot>
          <tr>
      
            <th>Title</th>
            <th>Address</th>
            <th>Image</th>
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
