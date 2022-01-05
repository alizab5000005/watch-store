@extends('layounts')
@section('page_title', 'My Website')
@section('styles')
  <!-- Start slider -->
  @if(session('msg'))
  <div class="alert-success">
    {{session('msg')}}
  </div>
  @endif

  <section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="{{asset('show_assets/img/slider/1.jpg')}}" alt="Men slide img" />
              </div>
              <div class="seq-title">
                          
               <h2 data-seq>Amazing Watches Collections</h2>        
           </div>
            </li>
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="{{asset('show_assets/img/slider/5.jpg')}}" alt="Wristwatch slide img" />
              </div>
              <div class="seq-title">
                             
                <h2 data-seq>Watches of all the Top Brands</h2>                
             </div>
            </li>
          
                         
          </ul>
        </div>
        <!-- slider navigation btn -->
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
  </section>
  <!-- / slider -->

  <!-- Products section -->
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
           
                 <ul class="nav nav-tabs aa-products-tab">
                  
                  <li>
                  <div class="dropdown">
                  <a class="dropdown-toggle" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  All Brands
                  </a>

                  <div class="dropdown-menu p-3" aria-labelledby="dropdownMenuLink">
                    @foreach($brands as $brand)
                  <a class="dropdown-item m-2" style="padding: 1px" href="{{url('brands/'.$brand->id)}}">{{$brand->brand_name}}</a><br>
                  @endforeach
                  </div>
                  </div>
                  </li>
                  <li class="active"><a href="#men" data-toggle="tab">Men</a></li>
                  <li><a href="#women" data-toggle="tab">Women</a></li>
                    
                  </ul>
                  <!-- Tab panes -->
                
                  <div class="tab-content" id="m">
                    <!-- Start men product category -->
                    <div class="tab-pane fade in active" id="men">
                      <ul class="aa-product-catg">
                       @foreach($products as $product)
                       @if($product->category_id == 1)
                       <li>
                          <figure>
                            <a class="aa-product-img" href="{{url('single_product/'.$product->id.'/'.$product->name.'/'.$product->category_id)}}"><img style="width: 250px; height: 300px" src="{{asset('/storage/images/'.$product->image)}}" alt="polo shirt img"></a>
                            <a class="aa-add-card-btn"href="{{url('single_product/'.$product->id.'/'.$product->name.'/'.$product->category_id)}}"></span>Check Details</a>
                            <figcaption>
                              <h4 class="aa-product-title"><a href="{{url('single_product/'.$product->id.'/'.$product->name.'/'.$product->category_id)}}">{{$product->name}}</a></h4>
                              <span class="aa-product-price">Rs {{number_format($product->price)}}/-</span>
                            </figcaption>
                          </figure>                          
                         
                        </li>
                        @endif
                       @endforeach
                   
                      </ul>
                   </div>
                    <!-- / men product category -->
                    <!-- start women product category -->
                    <div class="tab-pane fade" id="women">
                      <ul class="aa-product-catg">
                      @foreach($products as $product)
                      @if($product->category_id == 2)
                        <!-- start single product item -->
                        <li>
                          <figure>
                            <a class="aa-product-img" href="{{url('single_product/'.$product->id.'/'.$product->name.'/'.$product->category_id)}}"><img style="width: 250px; height: 300px" src="{{asset('/storage/images/'.$product->image)}}" alt="polo shirt img"></a>
                            <a class="aa-add-card-btn"href="{{url('single_product/'.$product->id.'/'.$product->name.'/'.$product->category_id)}}">Check Details</a>
                            <figcaption>
                              <h4 class="aa-product-title"><a href="{{url('single_product/'.$product->id.'/'.$product->name.'/'.$product->category_id)}}">{{$product->name}}</a></h4>
                              <span class="aa-product-price">Rs {{number_format($product->price)}}/-</span>
                            </figcaption>
                          </figure>                         
                        
                        
                        </li>
                        @endif
                        @endforeach
                      </ul>
                    
                    </div>
                    <!-- / women product category -->
               
                  
                  </div>
                           
                             
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Products section -->
  <!-- banner section -->
  <section id="aa-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">        
          <div class="row">
            <div class="aa-banner-area">
            <a href="#"><img src="{{asset('show_assets/img/fashion-banner.jpg')}}" alt="fashion banner img"></a>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- popular section -->
  <section id="aa-popular-category">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-popular-category-area">
              <!-- start prduct navigation -->
             <ul class="nav nav-tabs aa-products-tab">
                <li class="active"><a href="#popular" data-toggle="tab">Popular</a></li>
               
                <li><a href="#latest" data-toggle="tab">Latest</a></li>                    
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <!-- Start men popular category -->
                <div class="tab-pane fade in active" id="popular">
                  <ul class="aa-product-catg aa-popular-slider">
                    @foreach($shirt as $s)
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="{{url('single_product/'.$product->id.'/'.$product->name.'/'.$product->category_id)}}"> <img style="width: 250px; height: 300px" src="{{asset('/storage/images/'.$s->image)}}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="{{url('single_product/'.$product->id.'/'.$product->name.'/'.$product->category_id)}}">Chech Details</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="{{url('single_product/'.$product->id.'/'.$product->name.'/'.$product->category_id)}}"> {{$s->name}}/-</a></h4>
                          <span class="aa-product-price">Rs {{number_format($s->price)}}</span>
                        </figcaption>
                      </figure>                     
                     
                      
                    </li>
                    @endforeach                                                                                
                  </ul>
                 
                </div>
                <!-- / popular product category -->
                
                

                <!-- start latest product category -->
                <div class="tab-pane fade" id="latest">
                  <ul class="aa-product-catg aa-latest-slider">
                    @foreach($shirt as $s)
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="{{url('single_product/'.$product->id.'/'.$product->name.'/'.$product->category_id)}}"><img style="width: 250px; height: 300px"src="{{asset('/storage/images/'.$s->image)}}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="{{url('single_product/'.$product->id.'/'.$product->name.'/'.$product->category_id)}}">Chech Details</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="{{url('single_product/'.$product->id.'/'.$product->name.'/'.$product->category_id)}}"> {{$s->name}}/-</a></h4>
                          <span class="aa-product-price">Rs {{number_format($s->price)}}</span>
                        </figcaption>
                      </figure>                     
                     
                      
                    </li>
                    @endforeach
                  
                   
                 
                                                                                              
                  </ul>
                 
                </div>
                <!-- / latest product category -->              
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </section>
  <!-- / popular section -->
  <!-- Support section -->
  <section id="aa-support">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-support-area">
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-truck"></span>
                <h4>FREE SHIPPING</h4>
                <P>We offer free shipping for the first 5 orders</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-clock-o"></span>
                <h4>30 DAYS MONEY BACK</h4>
                <P>We provide a month warrenty for our Products</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-phone"></span>
                <h4>SUPPORT 24/7</h4>
                <P>We are available for your service all week</P>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Support section -->
 



  <!-- Subscribe section -->
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
