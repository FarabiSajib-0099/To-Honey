@extends('layouts.frontend_app')
@section('frontend_content')
 <!-- .breadcumb-area start -->
 <div class="breadcumb-area bg-img-4 ptb-100">
  <div class="container">
      <div class="row">
          <div class="col-12">
              <div class="breadcumb-wrap text-center">
                  <h2>Account</h2>
                  <ul>
                      <li><a href="index.html">Home</a></li>
                      <li><span>Login</span></li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- .breadcumb-area end -->
<!-- checkout-area start -->
<div class="account-area ptb-100">
  <div class="container">
      <div class="row">
          <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
              <div class="account-form form-style">
                @if ($errors->any())
                <div class="alert alert-danger">
              @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
                  
              @endforeach

                </div>
                    
                @endif
                <form action="{{route('login')}}" method="post">
                  @csrf
                  <p>User Name or Email Address *</p>
                  <input type="email" name="email" placeholder="Email" value="{{old('email')}}">
                  <p>Password *</p>
                  <input  type="password" name="password" class="form-control" placeholder="Password">
                  <div class="row">
                      <div class="col-lg-6">
                         
                          <label for="password">Remember Me</label>
                          <input type="checkbox" name="remember" id="remember" {{old('remember')? 'checked':''}} >
                      </div>
                      <div class="col-lg-6 text-right">
                        <a href="{{route('password.request')}}">Forgote Password</a>
                      </div>
                  </div>
                  <button>SIGN IN</button>
                  <div class="text-center">
                      <a href="register.html">Or Creat an Account</a>
                  </div>
                </form>
              
              </div>
          </div>
      </div>
  </div>
</div>
<!-- checkout-area end -->
   
@endsection
