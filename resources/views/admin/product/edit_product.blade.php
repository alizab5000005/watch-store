@extends('admin/layout')
@section('page_title', 'Edit Product')
@section('product_select', 'active')
@section('container')

<h3><span>
    <a href="products">
    <button type="button" class=" btn btn-success">Back</button>
  </a></span>Add Product</h3>
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
                                <div class="form-group col-lg-4">
                                    <label for="name" class="control-label mb-1">Name</label>
                                    <input id="name" name="name" type="text" class="form-control"
                                    value="{{$product->name}}">
                                </div>
                               
                                 <div class="form-group col-lg-4">
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
                                 <div class="form-group col-lg-4">
                                    <label for="brand" class="control-label mb-1">Brand</label>
                                    <input id="brand" name="brand" type="text" class="form-control"
                                    value="{{$product->brand}}">
                                </div>
                                 <div class="form-group col-lg-4">
                                    <label for="model" class="control-label mb-1">Model</label>
                                    <input id="model" name="model" type="text" class="form-control"
                                    value="{{$product->model}}">
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
                                <div class="form-group">
                                    <label class="control-label mb-1">Keywords</label>
                                    <textarea name="keywords" class="form-control">{{$product->keywords}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Technical Specification</label>
                                    <textarea name="technical_specification" class="form-control">{{$product->technical_specification}}</textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label mb-1">Warranty</label>
                                    <textarea name="warranty" class="form-control">{{$product->warranty}}</textarea>
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