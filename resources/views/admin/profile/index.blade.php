
@extends('layouts.adminlayout.adminheader')
@extends('layouts.adminlayout.adminsidebar')
@section('title')
    Home | Dashboard
@endsection
@section('dashcontent')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">Dashboard</h1>
           <p>This is Dynamic Page</p>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">Starter Page</li>
           </ol>
         </div><!-- /.col -->
       </div><!-- /.row -->
     </div><!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->
<div class="container">
   <div class="row">

     
      <div class="col-md-6 my-5">
         
         <div class="card  mb-3 ">
            <div class="card-header"> Name Edit</div>
           
       
            @if (session('name_change_status'))
            <div class="alert alert-danger">
            {{session('name_change_status')}}
         </div> 
            @endif
          
               @if (session('name_status'))
               <div class="alert alert-success">
               {{session('name_status')}}
            </div> 
               @endif
          
            <form method="post" action="{{url('profile/edit/post')}}">
               @csrf
               <div class="mb-3">
                 <label for="name" class="form-label"> Name</label>
                 {{-- <input type="hidden" value="{{$update_info->id}}" name="cat_id"> --}}
                 <input type="text" class="form-control" value="{{Auth::user()->name}}" id="name" name="name" placeholder="Enter  Name">
                 @error('cat_name')
                 <span class="text-danger">{{$message}}</span>
                 @enderror
               
               </div>
              
                
               <button type="submit" class="btn btn-warning">Update Name</button>
             </form>
         </div>  
         <div class="card mb-5 ">
            <div class="card-header"> Password Edit</div>
           
         {{-- @if ($errors->all())
             <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
               <li>{{$error}}</li>
      
                @endforeach
              
             </div>
                 
             @endif --}}
          
                 @if (session('pass_error'))
                  <div class="alert alert-danger">
                  {{session('pass_error')}}
               </div> 
                  @endif 
      
                  @error('password')
                  <div class="alert alert-danger">
                    
                  {{ $message}}
        
                   
                  </div> 
                  @enderror
              
         
          
            <form method="post" action="{{url('edit/password/post')}}">
               @csrf
               <div class="mb-3">
                 <label for="name" class="form-label">Old Password</label>
                 {{-- <input type="hidden" value="{{$update_info->id}}" name="cat_id"> --}}
                 <input type="password" class="form-control" id="name" name="old_pass" placeholder="Enter old passwword">
                
               
               </div>
               <div class="mb-3">
                  <label for="name" class="form-label">New Password</label>
          
                  <input type="password" class="form-control"  name="password" placeholder="Enter New passwword">
                 
                
                </div>
                <div class="mb-3">
                  <label for="name" class="form-label">Confrim Password</label>
                
                  <input type="password" class="form-control" id="password_inp" name="password_confirmation" placeholder="Enter Confrim passwword">
                 <input type="checkbox" id="checkbox" >Show Password
      
                 <script type="text/javascript">
                 $(document).on('click','#checkbox',function(){
                        var x = $('#password_inp').attr('type');
                        if (x == 'password') {
                           $('#password_inp').attr('type','text');
                        }else{
                           $('#password_inp').attr('type','password');
                        }
      
                      });
      
      
      
      
      
               //    function myFunction() {
      
                     
               //    alert();
               //     var x = document.getElementById("password_inp");
               // if (x.type === "password") {
               // x.type = "text";
               // } else {
               //  x.type = "password";
               // }
               
               </script>
                
                </div>
              
                
               <button type="submit" class="btn btn-warning">Change Password</button>
             </form>
           
      </div>    
   </div>
   <div class="col-md-6 my-5">
               
           @if ($errors->all())
             <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
               <li>{{$error}}</li>
      
                @endforeach
              
             </div>
                 
             @endif 
      <div class="card  mb-3 ">
         <div class="card-header">Change Profile Photo</div>
        
    
         @if (session('name_change_status'))
         <div class="alert alert-danger">
         {{session('name_change_status')}}
      </div> 
         @endif
       
            @if (session('name_status'))
            <div class="alert alert-success">
            {{session('name_status')}}
         </div> 
            @endif
       
         <form method="post" action="{{url('change/profile/photo')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label"> Profile Photo</label>
              {{-- <input type="hidden" value="{{$update_info->id}}" name="cat_id"> --}}
              <input type="file" class="form-control" name="profilepic">
             
            </div>
           
             
            <button type="submit" class="btn btn-warning">Update Name</button>
          </form>
      </div>
      
</div>
 
   </div>
</div>

   </div>
</div>   


@endsection