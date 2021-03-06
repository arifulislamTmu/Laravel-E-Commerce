@extends('admin.admin_master')
@section('addproduct')active  @endsection
@section('product')active show-sub @endsection
@section('admin_content')


    <!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
<div class="sl-pagebody">
<div class="sl-page-title">
    <h5>Added Product</h5>
</div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
        <div class="table-responsive">
        <div class="row">
        <div class="col-lg-2"></div>
            <div class="col-lg-8 bg-light py-3 px-3">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="table-responsive">
                <form action="{{route('store.product')}}" method="POST" enctype="multipart/form-data">
                    @csrf
<div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            <label for="exampleInputEmail1">Add Product</label>
            <input type="text"  name="product_name"class="form-control"value="{{ old('product_name') }}" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('product_name')
             <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-group">
            <label for="exampleInputEmail1">Select Category</label>
            <select  name="category_id"class="form-control"value="{{ old('category_id') }}" id="exampleInputEmail1" aria-describedby="emailHelp">
             <option value="">Select Category</option>
                @foreach ($categories as $category )
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <span class="text-danger">{{$message}}</span>
           @enderror
         </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label for="exampleInputEmail1">Select Brand</label>
            <select   name="brand_id"class="form-control"value="{{ old('brand_id') }}" id="exampleInputEmail1" aria-describedby="emailHelp">
            <option value=" ">Select Brand</option>
            @foreach ($brands as $brand )
             <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
             @endforeach
            </select>
            @error('brand_id')
            <span class="text-danger">{{$message}}</span>
           @enderror
         </div>
    </div>
    <div class="col-lg-12">

        <div class="form-group">
            <label for="exampleInputEmail1">Product description</label>
            <textarea name="product_description"class="form-control"value="{{ old('product_description') }}" ></textarea>
            @error('product_description')
             <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="col-lg-4">

        <div class="form-group">
            <label for="exampleInputEmail1">Product Code</label>
            <input type="text"  name="product_code"class="form-control"value="{{ old('product_code') }}" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('product_code')
             <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label for="exampleInputEmail1">Product Quantity</label>
            <input type="text"  name="product_quantity"class="form-control"value="{{ old('product_quantity') }}" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('product_quantity')
             <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label for="exampleInputEmail1">Product price</label>
            <input type="text"  name="product_price"class="form-control"value="{{ old('product_price') }}" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('product_price')
             <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="col-lg-4">

        <div class="form-group">
            <label for="exampleInputEmail1"> Product Image </label>
            <input type="file"  name="brand_image1"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('brand_image1')
             <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label for="exampleInputEmail1"> Product Image </label>
            <input type="file"  name="brand_image2"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('brand_image2')
             <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="col-lg-4">
    <div class="form-group">
                <label for="exampleInputEmail1"> Product Image </label>
                <input type="file"  name="brand_image3"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('brand_image3')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

    </div>
    <div class="col-lg-4">

    </div>
    <div class="col-lg-4">

    </div>
</div>






                    <button type="submit" class="btn btn-primary">Add Product</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
        </div><!-- card -->
        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->

@endsection
