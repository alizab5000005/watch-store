@extends('layounts')
@section('page_title', 'My Website')
@section('styles') 

<div>
  @if($errors->any())
@foreach($errors->all() as $error)
<div class="alert-danger pl-4">
  {{$error}}
</div>
@endforeach
@endif
</div>

  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">

   <img src="{{asset('show_assets/img/fashion/fashion-header-bg-8.jpg')}}" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        @foreach($single_product as $single)
        <h2>{{$single->name}}</h2>
        <ol class="breadcrumb">
          <li><a href="{{url('/')}}">Home</a></li>         
         
          <li class="active">{{$single->name}}</li>
          @endforeach
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                @foreach($single_product as $single)
                <form action="{{url('cart/'.$single->id)}}" method="post">
                @csrf
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">                              
                  <div class="aa-product-view-slider">                                
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                        <div class="simpleLens-big-image-container">
                          <a data-lens-image=""><img src="{{asset('/storage/images/'.$single->image)}}" class="simpleLens-big-image"></a></div>
                        <input type="hidden" name="image" value="{{$single->image}}">
                      </div>
              
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3>{{$single->name}}</h3>
                    <input type="hidden" name="name" value="{{$single->name}}">
                    <div class="aa-price-block">
                      <span class="aa-product-view-price">Rs {{number_format($single->price)}}/-</span>
                      <input type="hidden" name="price" value="{{$single->price}}">
                       @foreach($qty as $q)
                       @if($q->qty>0)
                       <p class="aa-product-avilability">Avilability: <span>In stock</span>
                        @else

                      <p class="aa-product-avilability">Avilability: <span>Out of stock</span>
                        @endif
                        </h5>
                        @endforeach
                    
                    </div>
                    <p>{{$single->short_desc}}</p>
                   
                    
                    
                    </h5>
                    <div class="aa-prod-quantity">
                    
                      @foreach($qty as $q)
                      
                      @if($q->qty>0)
                      <h5>Quantity : 
                        <input type="number" required style="width: 160px; padding: 5px" name="qty" placeholder="specify the quantity" min="1" max="{{$q->qty}}">
                        </h5>
                        @endif
                        
                        @endforeach
                        
                      <!-- <p class="aa-prod-category">
                        Category: <a href="#">Polo T-Shirt</a>
                      </p> -->
                    </div>
                    <input type="hidden" name="customer_id" value="{{session('CUSTOMER_ID')}}">
                    <input type="hidden" name="total_price"  value="{{$single->price}}">
                    <input type="hidden" name="p_id"  value="{{$single->id}}">
                    <div class="aa-prod-view-bottom">
                      <input type="submit" class="btn btn-success" value="Add To Cart">
                     
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="aa-product-details-bottom">
              <ul class="nav nav-tabs" id="myTab2">
                <li><a href="#description" data-toggle="tab">Description</a></li>
                <p>{{$single->desc}}</p>
                          
              </ul>
              @endforeach
           
               
            <!-- Related product -->
            <div class="aa-product-related-item">
              <h3>Related Products</h3>
              <ul class="aa-product-catg aa-related-item-slider">
                <!-- start single product item -->
                @foreach($related_product as $product)
                @if($product->category_id == $cat_id && $product->id != $id)
                <li>
                  <figure>
                    <a class="aa-product-img" href="{{url('single_product/'.$product->id.'/'.$product->name.'/'.$product->category_id)}}"><img style="width: 250px;height: 300px" src="{{asset('/storage/images/'.$product->image)}}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="{{url('single_product/'.$product->id.'/'.$product->name.'/'.$product->category_id)}}">Check Details</a>
                     <figcaption>
                      <h4 class="aa-product-title"><a href="{{url('single_product/'.$product->id.'/'.$product->name.'/'.$product->category_id)}}">{{$product->name}}</a></h4>
                      <span class="aa-product-price">Rs {{number_format($product->price)}}</span>
                    </figcaption>
                  </figure>                     
                
                </li>
                @endif
                 @endforeach                                                                               
              </ul>
             
            </div>  
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / product category -->


  <!-- Subscribe section -->
  <section style="margin:50px;font-size: 20px; margin-left: auto; margin-right: auto; width: 599px">
    <div class="container m-4">
      
        <div class="col-md-6">
          
            <h2>Leave a Comment </h2>
            
            <form action="" >
              Email Address
              <input type="email" style="margin-bottom: 14px" class="form-control" name="email" placeholder="Enter your Email">
              Comment
              <textarea placeholder="Enter your comment" class="form-control"></textarea>
              <br>
             
              <input type="submit" style="font-size: 20px;" value="Send" class="btn btn-success  p-2">
              
            </form>
          </div>
        </div>
      
    
  </section>
  <!-- / Subscribe section -->

    
@endsection
