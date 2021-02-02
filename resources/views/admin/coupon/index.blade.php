@extends('admin.admin_master')
@section('coupon')active @endsection
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
            <div class="col-lg-9">

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
                    <th scope="col">coupon Name</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Status</th>
                    <th scope="col">Create Time</th>
                    <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
               @php
                $i=1;
                @endphp
              @foreach($coupons as $coupon)
              <tr>
                  <td>
                    <label class="ckbox mg-b-0"></label>
                  </td>
                    <td>{{$i++}}</td>
                    <td>{{$coupon->coupon_name}}</td>
                    <td>{{$coupon->discount}}%</td>
                    @if($coupon->status== 1)
                    <td class="text-success">Active</td>
                    @else
                    <td class="text-danger">Dective</td>
                    @endif
                    <td>{{$coupon->created_at}}</td>
                    <td><a href="{{url('admin/coupon/'.$coupon->id)}}" class="btn btn-success">Edit</a>
                     <a href="{{ url('Delete/coupon/'.$coupon->id) }}" onclick="return confirm('You are sure to delete this ??')"   class="btn btn-danger">Delete</a>

                        @if($coupon->status== 1)
                        <a href="{{url('admin/Dective/'.$coupon->id)}}" class="btn btn-danger">Deactive</a>
                        @else
                        <a href="{{url('admin/Active/'.$coupon->id)}}" class="btn btn-success">Active</a>
                        @endif
                    </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
            </div>
     <div class="col-lg-3">
         <div class="table-responsive">
            <form action="{{ route('store.Coupon') }}" method="POST">
                  @csrf
                    <div class="form-group">
                    <label for="exampleInputEmail1">Add coupon</label>
                    <input type="text"  name="coupon_name"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('coupon_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Add discount </label>
                        <input type="text"  name="discount"class="form-control" placeholder="Coupon Discount %" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('discount')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
             <button type="submit" class="btn btn-primary">Add coupon</button>
          </form>
            </div>
        </div>
        </div>
      </div>
     </div><!-- card -->
     </div><!-- sl-pagebody -->
 </div><!-- sl-mainpanel -->

@endsection
