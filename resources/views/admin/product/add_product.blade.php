@extends('admin/layout')
@section('page_title','Add Product')
@section('product_select','active')
@section('container')

<h1 class="mb10">Manage Product</h1>
<a href="{{url('admin/product')}}">
<button type="button" class="btn btn-success">
Back
</button>
</a>
<div class="row m-t-30">
   <div class="col-md-12">
      <form action="{{route('product.submit_product')}}" method="post" enctype="multipart/form-data">
         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-body">
                     @csrf
                     <div class="row">
                     <div class="form-group col-lg-6">
                        <label for="name" class="control-label mb-1"> Name</label>
                        <input id="name"  name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                       
                     </div>
                     
                     <div class="form-group col-lg-6">
                        <label for="image" class="control-label mb-1"> Image</label>
                        <input id="image" name="image" type="file" class="form-control" >
                        
                     </div>
                  </div>
                     <div class="form-group">
                        <div class="row">
                           <div class="col-md-4">
                              <label for="category_id" class="control-label mb-1"> Category</label>
                              <select id="category_id" name="category_id" class="form-control" >
                                 <option value="">Select Categories</option>
                                 @foreach($categories as $list)
                                 <option value="{{$list->id}}" >{{$list->category_name}}</option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="col-md-2">
                              <label for="price" class="control-label mb-1"> Price</label>
                              <input id="price"  name="price" type="text" class="form-control" aria-="true" aria-invalid="false" >
                           </div>
                           <div class="col-md-3">
                              <label for="brand" class="control-label mb-1"> Brand</label>
                              <input id="brand"  name="brand" type="text" class="form-control" aria-="true" aria-invalid="false" >
                           </div>
                           <div class="col-md-3">
                              <label for="model" class="control-label mb-1"> Model</label>
                              <input id="model" name="model" type="text" class="form-control" aria-="true" aria-invalid="false" >
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="short_desc" class="control-label mb-1"> Short Desc</label>
                        <textarea id="short_desc" name="short_desc" type="text" class="form-control" aria-="true" aria-invalid="false" ></textarea>
                     </div>
                     <div class="form-group">
                        <label for="desc" class="control-label mb-1"> Desc</label>
                        <textarea id="desc" name="desc" type="text" class="form-control" aria-="true" aria-invalid="false" ></textarea>
                     </div>
                     <div class="form-group">
                        <label for="keywords" class="control-label mb-1"> Keywords</label>
                        <textarea id="keywords" name="keywords" type="text" class="form-control" aria-="true" aria-invalid="false" ></textarea>
                     </div>
                     <div class="form-group">
                        <label for="technical_specification" class="control-label mb-1"> Technical Specification</label>
                        <textarea id="technical_specification" name="technical_specification" type="text" class="form-control" aria-="true" aria-invalid="false" ></textarea>
                     </div>
                  
                     <div class="form-group">
                        <label for="warranty" class="control-label mb-1"> Warranty</label>
                        <textarea id="warranty" name="warranty" type="text" class="form-control" aria-="true" aria-invalid="false" ></textarea>
                     </div>
                  </div>
               </div>
            </div>
           
         </div>
         <div>
            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
            Submit
            </button>
         </div>
        
      </form>
   </div>
</div>

@endsection