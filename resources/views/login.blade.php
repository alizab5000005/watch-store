@extends('layounts')
@section('page_title', 'Customer Login')
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
                <h4>Login</h4>
                @if(session('msg'))
                <div class="alert alert-danger">
                  {{session('msg')}}
                </div>
                @endif
                 <form action="{{url('submit_login')}}" method="post" class="aa-login-form">
                     @csrf
                  <label for="">Email address<span>*</span></label>
                   <input type="text" name="email" placeholder="Email">
                   <label for="">Password<span>*</span></label>
                    <input type="password" name="password" placeholder="Password">
                    <button type="submit" class="aa-browse-btn" style="width:300px">Login</button>
                    <label class="rememberme" for="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
                    <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
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