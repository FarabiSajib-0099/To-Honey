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
                    <h1 class="m-0">Product Edit Page</h1>
                    <p>This is Dynamic Product edit Page</p>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('product.index')}}">Product</a></li>
                        <li class="breadcrumb-item active"><a href="#">{{$product_info->product_name}}</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container justify-content-center">
        <div class="row">
           


            <div class="col-md-4 m-auto">
                <div class="card  mb-3">
                    <div class="card-header">Edit Product</div>
                    @if ($errors->all())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{$error}} </li>

                        @endforeach

                    </div>

                    @endif

                    @if (session('product_status'))
                    <div class="aler alert-success">{{session('product_status')}}</div>

                    @endif
                    <form method="post" class="p-3" action="{{route('product.update',$product_info->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="categoryname" class="form-label">Category Name</label>
                            <select name="category_id" id="" class="form-control">
                                <option value="">-- Select One --</option>
                                @foreach ($active_categories as $active_category)

                                <option {{($active_category->id == $product_info->category_id) ? "selected":""}} value="{{$active_category->id}}">{{$active_category->cat_name}}</option>
                                @endforeach

                            </select>


                        </div>
                        <div class="mb-3">
                            <label for="categorydescription" class="form-label">Product Name</label>
                            <input type="text" class="form-control" value="{{$product_info->product_name}}" name="product_name">

                        </div>
                        <div class="mb-3">
                            <label for="categorydescription" class="form-label">Product Short Description</label>
                            <textarea class="form-control"  value="" name="product_short_description" id="categorydescription"
                                cols="4">{{$product_info->product_short_description}}</textarea>


                        </div>
                        <div class="mb-3">
                            <label for="categorydescription" class="form-label">Product Long Description</label>
                            <textarea class="form-control" value=""  name="product_long_description" id="categorydescription"
                                cols="4">{{$product_info->product_long_description}}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="categorydescription" class="form-label">Product Price</label>
                            <input type="text" value="{{$product_info->product_price}}" class="form-control" name="product_price">

                        </div>



                        <div class="mb-3">
                            <label for="categorydescription" class="form-label">Product Quantity</label>
                            <input type="text" class="form-control" value="{{$product_info->product_quantity}}" name="product_quantity">

                        </div>



                        <div class="mb-3">
                            <label for="categorydescription" class="form-label">Alert Quantity</label>
                            <input type="text" class="form-control" value="{{$product_info->alert_quantity}}" name="alert_quantity">

                        </div>

                        
                        <button type="submit" class="btn btn-primary">Edit Product</button>
                    </form>

                </div>
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


