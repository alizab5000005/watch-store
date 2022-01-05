@extends('layounts')
@section('page_title', 'My Cart')
@section('styles')
 @if(session('msg'))
  <div class="alert-success">
    {{session('msg')}}
  </div>
  @endif
 <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="{{asset('show_assets/img/fashion/fashion-header-bg-8.jpg')}}" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Cart Page</h2>
        <ol class="breadcrumb">
          <li><a href="{{url('/')}}">Home</a></li>                   
          <li class="active">Cart</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Remove</th>
                        <th>Product Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php $gt=0?>
                     @foreach($items as $item)
                     <?php $gt+=$item->total_price?>
                      <tr>
                        <td><a class="remove" href="{{url('delete_item_from_cart/'.$item->id)}}"><fa class="fa fa-close"></fa></a></td>
                        <td><a href="#"><img src="{{asset('/storage/images/'.$item->image)}}" alt="img"></a></td>
                        <td><a class="aa-cart-title" href="#">{{$item->name}}</a></td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->qty}}</td>
                        <td>{{$item->total_price}}</td>
                      </tr>
                      @endforeach
                    
                      </tbody>
                  </table>
                </div>
             
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Cart Totals</h4>
               <table class="aa-totals-table">
                 <tbody>
                   
                   <tr>
                     <th>Total</th>
                     <td>Rs <?php echo number_format($gt);?>/-</td>
                   </tr>
                 </tbody>
               </table>
               <a href="{{url('checkout')}}" class="aa-cart-view-btn">Proced to Checkout</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->


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



@endsection