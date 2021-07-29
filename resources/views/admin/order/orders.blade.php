@extends('admin/layout')
@section('page_title', 'Customer Orders')
@section('order_select', 'active')
@section('container')

<h3>Customer Orders</h3>
    
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
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>city</th>
                        <th>Zip Code</th>
                        <th>Address</th>
                        <th colspan="2">Products</th>
                        <th></th>
                        <th>Total Amount</th>
                        <th>Payment Mode</th>
                        <th>Completed</th>
                                                
                    </tr>
                </thead>
                <tbody>
                      @foreach($orders as $order)
                    <tr>
                        <td>{{$order->customer_name}}</td>
                        <td>{{$order->customer_email}}</td>
                        <td>{{$order->customer_phone}}</td>
                        <td>{{$order->city}}</td>
                        <td>{{$order->zip_code}}</td>
                        <td>{{$order->address}}</td>
                        <td colspan="3">{{$order->products}}</td>
                        <td>{{$order->total_amount}}</td>
                        <td>{{$order->pay_mode}}</td>
                        @if($order->Completed)
                        <td>
                           <h4><span class="fas fa-check-double" style="color: green;"></span></h4>
                        </td>
                        @else
                        <td>
                            <a href="{{url('admin/order/complete/'.$order->id)}}">
                            <h4><span class="fas fa-check" style="cursor: pointer; color: gray"></span></h4>
                            </a>
                        </td>    
                        @endif
                        
                   </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
                                <!-- END DATA TABLE-->
    </div>
</div>

@endsection