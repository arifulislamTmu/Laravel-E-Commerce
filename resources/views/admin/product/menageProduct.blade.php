@extends('admin.admin_master')
@section('product')active show-sub @endsection
@section('menage_product')active  @endsection
@section('admin_content')


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Basic Tables</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <div class="table-responsive">
          <div class="row">
            <div class="col-lg-12">

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
             </div>
            @endif
            <table class="table mg-b-0">
              <thead>
                <tr>
                  <th> <label class="ckbox mg-b-0"></label></th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Brand Name</th>
                    <th scope="col">Product Quantity</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($products as $row)
                <tr>
                  <td>
                    <label class="ckbox mg-b-0"></label>
                  </td>
                    <td>{{ $row->product_name}}</td>
                    <td ><img style="width:50px; height:40px"src="{{asset($row->brand_image1)}}" alt=""></td>
                    <td>{{$row->categoey->category_name}}</td>
                    <td>{{$row->brand->brand_name}}</td>
                    <td>{{ $row->product_quantity}}</td>
                    @if($row->starus==1)
                    <td class="text-success"><strong>Active</strong> </td>
                    @else
                    <td class="text-danger"><strong>Dective</strong> </td>
                    @endif

                    <td>
                        <a href="{{url('admin/product/edit/'.$row->id)}}" class="btn btn-success">Edit</a>
                       <a href="{{ url('delete/product/'.$row->id) }}" onclick="return confirm('You are sure to delete this ??')"   class="btn btn-danger">Delete</a>
                       @if ($row->starus==1)
                       <a href="{{url('Active/product/'.$row->id)}}" class="btn btn-danger">Dective</a>
                       @else
                       <a href="{{url('Dective/product/'.$row->id)}}" class="btn btn-success">Active</a>
                       @endif
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            </div>
        </div>
      </div>
     </div><!-- card -->
     </div><!-- sl-pagebody -->
 </div><!-- sl-mainpanel -->

@endsection
