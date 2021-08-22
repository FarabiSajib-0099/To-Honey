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

                    <h1 class="m-0">Contact Information Page</h1>
                    <p>This is Dynamic Contact Page</p>

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

                        <div class="card-body">


                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Attachment</th>
                                       

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $contact)

                                    <tr>
                                        <th scope="row">{{$loop->index +1}}</th>
                                        <td>{{$contact->contact_name}}</td>
                                        <td>{{$contact->contact_email}}</td>
                                        <td>{{$contact->contact_subject}}</td>
                                        <td>{{$contact->contact_message}}</td>
                                        <td>
                                           @if ($contact->contact_attachment)
                                         <a href="{{url('contact/upload/download')}}/{{$contact->id}}">  <i class="fa fa-download"></i> </a>|
                                         <a target="_blank"   href="{{asset('storage')}}/{{$contact->contact_attachment}}">  <i class="fa fa-file"></i> </a>

                                           @endif
                                            
                                        </td>

                                        {{--                           
                         <td>
                          <li> </li>
                          <li> </li>
                          <li></li>
                          </td> --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-danger"></div>

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
