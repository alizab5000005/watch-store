@extends('layounts')
@section('page_title', 'My Orders')
@section('styles')


<!-- start contact section -->
 <section id="aa-contact bg-light">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="aa-contact-area">
           <div class="text-center text-dark">
             <h2>Here are your all Orders</h2>
           </div>
         
         <div class="container">
             
  <table class="table">
    <thead>
      <tr>
        <th>Full Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Ordered Items</th>
      </tr>
    </thead>
    <tbody>
      @foreach($c_orders as $order)
      <tr>
        <td>{{$order->customer_name}}</td>
        <td>{{$order->customer_email}}</td>
        <td>{{$order->customer_phone}}</td>
        <td>{{$order->address}}</td>
        <td>{{$order->products}}</td>
      </tr>
      @endforeach
      
    </tbody>
  </table>
</div>

         </div>
       </div>
     </div>
   </div>
 </section>


  
@endsection