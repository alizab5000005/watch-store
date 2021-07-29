@extends('admin/layout')
@section('page_title', 'Add Category')
@section('category_select', 'active')
@section('container')

<h3><span>
    <a href="categories">
    <button type="button" class=" btn btn-success">Back</button>
  </a></span>  Add Category </h3>
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
                                        <form action="{{route('/admin/category/submit_category')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="category_name" class="control-label mb-1">Category</label>
                                                <input id="category_name" name="category_name" type="text" class="form-control">
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                 Submit
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                     
                        </div>
                      
                    </div>
                </div>
            </div>
                           
@endsection