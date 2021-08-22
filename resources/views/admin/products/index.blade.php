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
                    <h1 class="m-0">Product Page</h1>
                    <p>This is Dynamic Product Page</p>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('add/category')}}">Product</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container justify-content-center">
        <div class="row">
            <div class="col-md-8">

                <div class="card-header bg-secondary mb-5">List Product(Active)</div>
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

                                <th>Sl No</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quanity</th>
                                <th scope="col"> Alert Quantity</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Action</th>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                       
                            @forelse ($products as $product)
                            <tr>

                                <td>{{$loop->index+1}}</td>
                                {{-- <td>{{App\Category::find($product->category_id)->cat_name}}</td> --}}
                                <td>{{$product->relationwithcattable->cat_name}}</td>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->product_price}}</td>
                                <td>{{$product->product_quantity}}</td>
                                <td>{{$product->alert_quantity}}</td>
                                <td>
                                    <img class="img-fluid" style="width: 50px;"
                                        src="{{asset('uploads/productphotos')}}/{{$product->product_thumbnail_photo}}"
                                        alt="not found">
                                </td>
                                <td>
                                    <a href="{{route('product.edit',$product->id)}}" type="button" class="btn btn-info">Edit</a>
                                    <form action="{{route('product.destroy',$product->id)}}" method="POST">
                                       @csrf
                                       @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                             
                                  
                                
                                @empty
                            <tr>
                                <td colspan="50" class="text-center text-danger">No data avaliable</td>
                            </tr>
                            @endforelse



                        </tbody>
                    </table>

                    {{-- @if ($categories->count()>0)
                    <button type="submit" class="btn-sm btn-danger">Mark Deleted</button>
                    @endif --}}

                </form>
            </div>


            <div class="col-md-4">
                <div class="card  mb-3">
                    <div class="card-header">Add Product</div>
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
                    <form method="post" class="p-3" action="{{route('product.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="categoryname" class="form-label">Category Name</label>
                            <select name="category_id" id="" class="form-control">
                                <option value="">-- Select One --</option>
                                @foreach ($active_categories as $active_category)

                                <option value="{{$active_category->id}}">{{$active_category->cat_name}}</option>
                                @endforeach

                            </select>


                        </div>
                        <div class="mb-3">
                            <label for="categorydescription" class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="product_name">

                        </div>
                        <div class="mb-3">
                            <label for="categorydescription" class="form-label">Product Short Description</label>
                            <textarea class="form-control" name="product_short_description" id="categorydescription"
                                cols="4">{{old('cat_des')}}</textarea>


                        </div>
                        <div class="mb-3">
                            <label for="categorydescription" class="form-label">Product Long Description</label>
                            <textarea class="form-control"  id="product_long_description"  name="product_long_description" id="categorydescription"
                                cols="4">{{old('cat_des')}}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="categorydescription" class="form-label">Product Price</label>
                            <input type="text" class="form-control" name="product_price">

                        </div>



                        <div class="mb-3">
                            <label for="categorydescription" class="form-label">Product Quantity</label>
                            <input type="text" class="form-control" name="product_quantity">

                        </div>



                        <div class="mb-3">
                            <label for="categorydescription" class="form-label">Alert Quantity</label>
                            <input type="text" class="form-control" name="alert_quantity">

                        </div>

                        <div class="mb-3">
                            <label for="categorydescription" class="form-label">Product Thumbnail Photo</label>
                            <input type="file" class="form-control border "  name="product_thumbnail_photo">

                        </div>
                        <div class="mb-3">
                            <label for="categorydescription" class="form-label">Product Multiple Photo</label>
                            <input type="file" class="form-control" name="product_multiple_photo[]" multiple>

                        </div>
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </form>

                </div>
            </div>

            {{-- <div class="col-md-8">

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
                                {{-- <th scope="col"> Created At</th>
                                <th scope="col">Action</th>
                                </th>
                            </tr>
                        </thead>
                        <tbody> --}} --}}
                            {{-- @forelse ($delete_categories as $delete_category)
                            <tr>
                                <td>

                                    <input type="checkbox" name="category_id[]" value="{{$delete_category->id}}">
                            </td>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$delete_category->cat_name}}</td>
                            <td>{{$delete_category->cat_des}}</td>
                            <td>{{ App\User::find($delete_category->user_id)->name }}</td>
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
                            @endforelse --}}



                        </tbody>
                    </table>
                    {{-- @if ($delete_categories->count()>0)
                    <button type="submit" class="btn-sm btn-info">Mark Restrore</button>
                    @endif --}}


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
        
        ClassicEditor
                                .create( document.querySelector( '#product_long_description' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );

    </script>
    @endsection
