@extends('layounts')
@section('page_title', 'Checkout')
@section('styles')
<!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="{{asset('show_assets/img/fashion/fashion-header-bg-8.jpg')}}" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Checkout Page</h2>
        <ol class="breadcrumb">
          <li><a href="/">Home</a></li>                   
          <li class="active">Checkout</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="checkout">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="checkout-area">
            @if($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger">
    {{$error}}
    </div>
    @endforeach
    @endif
          <form action="{{url('order')}}" method="post">
            @csrf
            <div class="row">
              <div class="col-md-12">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">
                   
                 
                    <!-- Shipping Address -->
                    <div class="panel panel-default aa-checkout-billaddress">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collaseFour">
                            Shippping Address
                          </a>
                        </h4>
                      </div>
                      
                        <div class="panl-body">
                        
                      
                          <div class="row">
                             <div class="col-md-4">
                            <div class="aa-checkout-single-bill">
                                <input type="text" name="city" placeholder="City / Town*" >
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="aa-checkout-single-bill">
                                <input type="tel" name="customer_phone" placeholder="Phone*" >
                              </div>
                            </div>
                           
                          
                            <div class="col-md-4">
                              <div class="aa-checkout-single-bill">
                                <input type="text" name="zip_code" class="form-control" placeholder="Zip Code" >
                              </div>                             
                            </div>                            
                          </div>
                         
                           <div class="row">
                            <div class="col-md-8">
                              <div>
                                <textarea  placeholder="Address" name="address" class="form-control"></textarea>
                              </div>                             
                            </div> 
                            <div class="col-md-4">
                              <div>
                                <p>Payment Method</p>
                                Cash ON Delivery <input  type="radio" value="cod" name="pay_mode" >
                                <span style="margin-left: 20px">OnLine </span><input  value="online" type="radio" name="pay_mode" class="ml-4">
                              </div>                             
                            </div>                            
                          </div>              
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-md-6">
                <div class="checkout-right">
                  <h4>Order Summary</h4>
                  <div class="aa-order-summary-area">
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $gt=0?>
                         @foreach($products as $product)
                        <tr>
                         <td>{{$product->name}} <strong> x  {{$product->qty}}</strong></td>
                         <input type="hidden" name="products[]" value="{{$product->name.' (qty : '.$product->qty.')' }}">
                          <td>Rs {{number_format($product->total_price)}}/-</td>
                        </tr>
                         
                       <input type="hidden" name="q[]" value="{{$product->qty}}">
                       <input type="hidden" name="p_id[]" value="{{$product->p_id}}">
                         <?php $gt+=$product->total_price?>
                         <input type="hidden" name="total_amount" value="{{$gt}}">
                         @endforeach
                        
                      </tbody>
                      <tfoot>
                        
                        <tr>
                          <th>Subtotal</th>
                          <td>Rs {{number_format($gt)}}/-</td>
                        </tr>
                         <tr>
                          <th>Tax</th>
                          <td>0</td>
                        </tr>
                         <tr>
                          <th>Grand Total</th>
                          <td>Rs {{number_format($gt)}}/-</td>
                        </tr>
                      </tfoot>
                    </table>
                      <input type="submit" value="Place Order" class="aa-browse-btn btn-block "> 
                  </div>
                </div>
                  
                </div>
                 
                </div>
              </div>
              </div>
            </div>
          </form>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->

@endsection