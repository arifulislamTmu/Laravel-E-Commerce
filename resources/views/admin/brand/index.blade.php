@extends('admin.admin_master')
@section('brand')active @endsection
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
            <div class="col-lg-8">

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
                    <th scope="col">SL NO</th>
                    <th scope="col">Brand Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Create Time</th>
                    <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
               @php
                $i=1;
                @endphp
              @foreach($brands as $brand)
              <tr>
                  <td>
                    <label class="ckbox mg-b-0"></label>
                  </td>
                    <td>{{$i++}}</td>
                    <td>{{$brand->brand_name}}</td>
                    @if($brand->status== 1)
                    <td>Active</td>
                    @else
                    <td>Dective</td>
                    @endif
                    <td>{{$brand->created_at}}</td>
                    <td><a href="{{url('admin/brand/'.$brand->id)}}" class="btn btn-success">Edit</a>
                     <a href="{{ url('Delete/brand/'.$brand->id) }}" onclick="return confirm('You are sure to delete this ??')"   class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
            </div>
     <div class="col-lg-4">
         <div class="table-responsive">
            <form action="{{route('store.brand')}}" method="POST">
                  @csrf
                    <div class="form-group">
                    <label for="exampleInputEmail1">Add Brand</label>
                    <input type="text"  name="brand_name"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('brand_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
             <button type="submit" class="btn btn-primary">Add Brand</button>
          </form>
            </div>
        </div>
        </div>
      </div>
     </div><!-- card -->
     </div><!-- sl-pagebody -->
 </div><!-- sl-mainpanel -->

@endsection
