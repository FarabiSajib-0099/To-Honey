@extends('layouts.adminlayout.adminheader')
@extends('layouts.adminlayout.adminsidebar')
@section('home')
active
    
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
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
             
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-8">
           
            <div class="card">
              <div class="card-header">  
                <a href="{{url('send/newsletter')}}" class="btn  btn-success mb-3" >Send Newsletter to {{$total_users}} users</a>
                    </div>
              <div class="card-header">{{ __('Dashboard') }}
              <h1>Total User: {{$total_users}}</h1>
              </div>

              <div class="card-body">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif

               
                     
               
                  <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Created_at</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($users as $item)
              
                        <tr>
                          <th scope="row">{{$users->firstitem() + $loop->index}}</th>
                          <td>{{Str::title($item->name)}}</td>
                          <td>{{$item->email}}</td>
                         <td>
                          <li> {{$item->created_at->format('d/m/Y')}}</li>
                          <li> {{$item->created_at->format('h:i:s A')}}</li>
                          <li>{{$item->created_at->diffForHumans()}}</li>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <div class="text-danger" >{{$users->links()}}</div>
          
              </div>
          </div>
           
          </div>
         
           
          </div>
        </div>
        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
 
@endsection
  