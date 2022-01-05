@extends('admin/layout')
@section('page_title', 'Edit Product')
@section('product_select', 'active')
@section('container')

<h3><span>
    <a href="{{url('admin/product/products')}}">
    <button type="button" class=" btn btn-success">Back</button>
  </a></span>Edit Product</h3>
<div class="row">
    <div class="col-md-12">
        <div class="mt-2">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{$error}}
                            </div>
                        @endforeach
                        @endif
                            <form action="../update_product/{{$product->id}}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="name" class="control-label mb-1">Name</label>
                                    <input id="name" name="name" type="text" class="form-control"
                                    value="{{$product->name}}">
                                </div>
                               
                                 <div class="form-group col-lg-6">
                                    <label for="image" class="control-label mb-1">Image</label>
                                    <input id="image" name="image" type="file" class="form-control"
                                    value="{{$product->image}}">
                                </div>
                                </div>
                                <div class="row">
                                 <div class="form-group col-lg-4">
                                    <label for="category_id" class="control-label mb-1">Category</label>
                                    <select class="form-control" name="category_id">
                                            @foreach($selected_category as $cat)
                                            <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                            @endforeach
                                        
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                 <div class="form-group col-lg-2">
                                    <label for="price" class="control-label mb-1">Price</label>
                                    <input id="price" name="price" type="text" class="form-control"
                                    value="{{$product->price}}">
                                </div>
                                 <div class="col-md-1">
                                  <label for="qty" class="control-label mb-1"> Quantity</label>
                                 <input id="qty"  name="qty" value="{{$product->qty}}" type="text" class="form-control" aria-="true" aria-invalid="false" >
                           </div>
                                <div class="col-md-5">
                              <label for="price" class="control-label mb-1"> Brands Category</label>
                              <select class="form-control" name="brand">
                                @foreach($selected_brand as $b)
                                <option value="{{$b->id}}">{{$b->brand_name}}</option>
                                @endforeach
                                @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                @endforeach
                              </select> 
                           </div>
                                
                               
                                </div>
                                  <div class="form-group">
                                    <label class="control-label mb-1">Short Description</label>
                                    <textarea name="short_desc" class="form-control">{{$product->short_desc}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Description</label>
                                    <textarea name="desc" class="form-control">{{$product->desc}}</textarea>
                                </div>
                               
                                <div>
            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
            Submit
            </button>
         </div>           
                      </div>
                     </div>
                  </div>
                                      
@endsection