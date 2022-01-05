@extends('admin/layout')
@section('page_title', 'Product')
@section('product_select', 'active')
@section('container')

<h3>Product <span>
    <a href="add_product">
	<button type="button" class="btn btn-success">Add Product</button>
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
                        <th>Name</th>
                        <th>Image</th>
                        <th>Action</th>
                                                
                    </tr>
                </thead>
                <tbody>
                      @foreach($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        
                        <td><img src="{{asset('/storage/images/'.$product->image)}}" width="70"></td>
                       
                        <td>
                            <a href="edit_product/{{$product->id}}">
                                <button class="btn btn-info">Edit</button>
                            </a>
                            @if($product->status == 1)
                            <a href="deactivate_product/{{$product->id}}">
                                <button class="btn btn-success">Activate</button>
                            </a>
                            @else
                            <a href="activate_product/{{$product->id}}">
                                <button class="btn btn-warning">Dactivate</button>
                            </a>
                             @endif
                             <a href="delete/{{$product->id}}">
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