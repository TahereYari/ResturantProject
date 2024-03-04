
@extends('Layoute.admin')
@section('content')

<div class="row">
  <div class="col-12">
   
    <!-- /.card -->

    <div class="card">
      <div class="card-header">
      <!-- <button type="button" class="col-1 btn btn-block btn-warning">Create</button> -->

    
      <a href="{{ route('category_Create') }}" class="col-1 btn btn-block btn-warning">Create</a>
 
        <h3 class="card-title">DataTable with default features</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
     
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>نام</th>
            <th>متن</th>
             <th>حذف</th>
             <th>ویرایش</th>
        
          </tr>
          </thead>
          <tbody>

            @foreach ($categories as $category)
            <tr>
              <th>{{ $category->name }}</th>
              <th>{{ $category->description }}</th>
              <th><a href="{{ route('category_delete',['id' => $category->id]) }}">Delete</a></th>
              <th> <a href="{{ route('category_edit' ,['id' => $category->id]) }}">Edit</a> </th>
            </tr>
            @endforeach

          </tbody>
          <tfoot>
          <tr>

            <th>نام</th>
            <th>متن</th>
             <th>حذف</th>
             <th>ویرایش</th>
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
