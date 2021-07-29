@extends('admin/layout')
@section('page_title', 'Category')
@section('category_select', 'active')
@section('container')

<h3>Category <span>
    <a href="add_category">
	<button type="button" class="btn btn-success">Add Category</button>
  </a></span></h3>
<div class="row m-t-30">
     <div class="col-md-12">
                                <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            @if(session('msg'))
             <div class="alert alert-success">
                 {{session('msg')}}
              </div>
            @endif
          
           
            
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Action</th>
                                                
                    </tr>
                </thead>
                <tbody>
                      @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->category_name}}</td>
                        <td>
                            <a href="edit_category/{{$category->id}}">
                                <button class="btn btn-info">Edit</button>
                            </a>
                            @if($category->category_status == 1)
                            <a href="deactivate_category/{{$category->id}}">
                                <button class="btn btn-success">Activate</button>
                            </a>
                            @else
                            <a href="activate_category/{{$category->id}}">
                                <button class="btn btn-warning">Dactivate</button>
                            </a>
                             @endif
                             <a href="delete/{{$category->id}}">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                            
                           
                        </td>
                   </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
                                <!-- END DATA TABLE-->
    </div>
</div>

@endsection