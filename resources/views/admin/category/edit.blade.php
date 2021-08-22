@extends('layouts.adminlayout.adminheader')
@extends('layouts.adminlayout.adminsidebar')
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

    
      <div class="col-md-4 m-auto">
         <div class="card  mb-3 ">
            <div class="card-header">Edit Category</div>
            {{-- @if ($errors->all())
                <div class="alert alert-danger">
                   @foreach ($errors->all() as $error)
                   <li>{{$error}} </li>
   
                   @endforeach
                
                </div>
            
            @endif --}}

            {{-- @if (session('msg'))
            <div class="aler alert-success">{{session('msg')}}</div>
                
            @endif --}}
           

         
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="{{route('addcategory')}}">Add Category</a></li>
                 <li class="breadcrumb-item active" aria-current="page">{{$update_info->cat_name}}</li>
               </ol>
             </nav>
          
               @if (session('edit_status'))
               <div class="alert alert-success">
               {{session('edit_status')}}
            </div> 
               @endif
          
            <form method="post" action="{{url('edit/category/post')}}">
               @csrf
               <div class="mb-3">
                 <label for="categoryname" class="form-label">Category Name</label>
                 <input type="hidden" value="{{$update_info->id}}" name="cat_id">
                 <input type="text" class="form-control" value="{{$update_info->cat_name}}" id="categoryname" name="cat_name" placeholder="Enter Catregory Name">
                 @error('cat_name')
                 <span class="text-danger">{{$message}}</span>
                 @enderror
               
               </div>
               <div class="mb-3">
                  <label for="categorydescription" class="form-label">Category Description</label>
                  <textarea class="form-control" name="cat_des" id="categorydescription" cols="4">{{$update_info->cat_des}}</textarea>
                  
                  @error('cat_des')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                
                </div>
                
               <button type="submit" class="btn btn-warning">Update Catrgory</button>
             </form>
           
   </div>
</div>
   </div>
</div>   
@endsection