@extends('admin/layout')
@section('page_title', 'Customer')
@section('customer_select', 'active')
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
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th colspan="2" class="text-center">Action</th>
                        
                                                
                    </tr>
                </thead>
                <tbody>
                      @foreach($customers as $customer)
                    <tr>
                        <td>{{$customer->full_name}}</td>
                        <td>{{$customer->username}}</td>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->password}}</td>
                        <td>
                            @if($customer->status == 1)
                            <a href="{{url('admin/deactivate/'.$customer->id)}}" class="btn btn-success">Activate</a>
                            @else
                            <a href="{{url('admin/activate/'.$customer->id)}}" class="btn btn-warning">Deactivate</a>
                            @endif
                        </td> 
                        <td>
                            <a href="{{url('admin/delete/'.$customer->id)}}" class="btn btn-danger">Delete</a>
                        </td> 
                        
                   </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
                                <!-- END DATA TABLE-->
    </div>
</div>

@endsection