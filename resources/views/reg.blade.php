@extends('layounts')
@section('page_title', 'Customer Registration')
@section('styles')


 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-12">
                <div class="aa-myaccount-login">
                <h4>Create Account</h4>
                @if(session('msg'))
                <div class="alert alert-danger">
                  {{session('msg')}}
                </div>
                @endif
                      @if($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                {{$error}}
                </div>
                @endforeach
                @endif
              
                 <form action="{{url('submit_reg')}}" method="post" class="aa-login-form">
                     @csrf
                  <label for="">Full Name<span>*</span></label>
                   <input type="text" name="full_name" placeholder="Full Name">
                   <label for="">Username<span>*</span></label>
                   <input type="text" name="username" placeholder="Username">
                  <label for="">Email address<span>*</span></label>
                   <input type="email" class="form-control" name="email" placeholder="Email">
                   <input type="hidden" name="status" value="1">
                   <label for="">Password<span>*</span></label>

                    <input type="password" name="password" placeholder="Password">
                    <button type="submit" class="aa-browse-btn" style="width:300px">Create</button>
                   
                  </form>
                </div>
              </div>
            
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->


  
@endsection