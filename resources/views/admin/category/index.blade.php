@extends('layouts.adminlayout.adminheader')
@extends('layouts.adminlayout.adminsidebar')
@section('category')
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
                        <li class="breadcrumb-item active"><a href="{{url('add/category')}}">Category</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container justify-content-center">
        <div class="row">
            <div class="col-md-9">

                <div class="card-header bg-secondary mb-5">List Category(Active)</div>
                <form method="post" action="{{url('mark/delete')}}">
                    @csrf
                    <table class="table table-bordered" id="myTable">
                        @if (session('delete_status'))
                        <div class="alert alert-success">
                            {{session('delete_status')}}

                        </div>

                        @endif
                        @if (session('edit_status'))
                        <div class="alert alert-success">
                            {{session('edit_status')}}

                        </div>

                        @endif
                        <thead>
                            <tr>
                                <th>Mark</th>
                                <th>Sl No</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Catrgory Description</th>
                                {{-- <th scope="col">Catrgory Created By</th> --}}
                                <th scope="col">Photo</th>
                                <th scope="col"> Created At</th>
                                <th scope="col">Action</th>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                            <tr>
                                <td>

                                    <input type="checkbox" name="category_id[]" value="{{$category->id}}">
                                </td>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$category->cat_name}}</td>
                                <td>{{$category->cat_des}}</td>
                                {{-- <td>{{ App\User::find($category->user_id)->name }}</td> --}}
                                <td>
                                    <img src="{{asset('uploads/categroypic/')}}/{{$category->category_photo}}"
                                        class="img-fluid w-25" alt="Photo not found">
                                </td>
                                <td>{{$category->created_at->format('d-m-Y h:i:s A')}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">


                                        <a href="{{url('edit/category')}}/{{$category->id}}" type="button"
                                            class="btn btn-info">Edit</a>
                                        <a href="{{url('delete/category')}}/{{$category->id}}" type="button"
                                            class="btn btn-danger">Delte</a>
                                    </div>
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="50" class="text-center text-danger">No data avaliable</td>
                            </tr>
                            @endforelse



                        </tbody>
                    </table>

                    @if ($categories->count()>0)
                    <button type="submit" class="btn-sm btn-danger">Mark Deleted</button>
                    @endif

                </form>
            </div>


            <div class="col-md-3">
                <div class="card  mb-3">
                    <div class="card-header">Add Category</div>
                    @if ($errors->all())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{$error}} </li>

                        @endforeach

                    </div>

                    @endif

                    @if (session('msg'))
                    <div class="aler alert-success">{{session('msg')}}</div>

                    @endif
                    <form method="post" action="{{url('add/category/post')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="categoryname" class="form-label">Category Name</label>
                            <input type="text" class="form-control" value="{{old('cat_name')}}" id="categoryname"
                                name="cat_name" placeholder="Enter Catregory Name">
                            @error('cat_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="categorydescription" class="form-label">Category Description</label>
                            <textarea class="form-control" name="cat_des" id="categorydescription"
                                cols="4">{{old('cat_des')}}</textarea>

                            @error('cat_des')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="categorydescription" class="form-label">Category Photo</label>
                            <input type="file" class="form-control" name="category_photo">

                            {{-- @error('cat_des')
              <span class="text-danger">{{$message}}</span>
                            @enderror --}}

                        </div>
                        <button type="submit" class="btn btn-primary">Add Catrgory</button>
                    </form>

                </div>
            </div>

            <div class="col-md-8">

                <div class="card-header bg-danger">List Category(Deleted)</div>
                <form action="{{url('mark/restore')}}" method="post">
                    @csrf
                    <table class="table">
                        @if (session('delete_status'))
                        <div class="alert alert-success">
                            {{session('delete_status')}}

                        </div>

                        @endif
                        @if (session('restore_msg'))
                        <div class="alert alert-success">
                            {{session('restore_msg')}}

                        </div>

                        @endif

                        @if (session('pdelete_msg'))
                        <div class="alert alert-danger">
                            {{session('pdelete_msg')}}

                        </div>

                        @endif
                        <thead>
                            <tr>
                                <th>Mark</th>
                                <th>Sl No</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Catrgory Description</th>
                                {{-- <th scope="col">Catrgory Created By</th> --}}
                                <th scope="col"> Created At</th>
                                <th scope="col">Action</th>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($delete_categories as $delete_category)
                            <tr>
                                <td>

                                    <input type="checkbox" name="category_id[]" value="{{$delete_category->id}}">
                                </td>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$delete_category->cat_name}}</td>
                                <td>{{$delete_category->cat_des}}</td>
                                {{-- <td>{{ App\User::find($delete_category->user_id)->name }}</td> --}}
                                <td>{{$delete_category->created_at->format('d-m-Y h:i:s A')}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">


                                        <a href="{{url('parmanent/delete/category')}}/{{$delete_category->id}}"
                                            type="button" class="btn btn-danger">P.Delete</a>
                                        <a href="{{url('restore/category')}}/{{$delete_category->id}}" type="button"
                                            class="btn btn-success">Resotre</a>
                                    </div>
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="50" class="text-center text-danger">No data avaliable</td>
                            </tr>
                            @endforelse



                        </tbody>
                    </table>
                    @if ($delete_categories->count()>0)
                    <button type="submit" class="btn-sm btn-info">Mark Restrore</button>
                    @endif


                </form>
            </div>

        </div>
    </div>
    @endsection

    @section('footer_script')
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });

    </script>
    @endsection
