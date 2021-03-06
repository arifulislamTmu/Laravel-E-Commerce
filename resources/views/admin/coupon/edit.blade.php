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
    <div class="col-lg-4"></div>
     <div class="col-lg-4">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
         </div>
        @endif
         <div class="table-responsive">
            <form action="{{ route('coupon.update') }}" method="POST">
                  @csrf
                  <input type="hidden" name="hedden_id" value="{{ $coupons_id->id }}">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Edit Coupon Name</label>
                    <input type="text"  name="coupon_name"class="form-control" value="{{ $coupons_id->coupon_name }}"id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('coupon_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Edit discount</label>
                        <input type="text"  name="discount"class="form-control" value="{{ $coupons_id->discount }}"id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('discount')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
             <button type="submit" class="btn btn-primary">Update</button>
          </form>
            </div>
        </div>
        </div>
      </div>
     </div><!-- card -->
     </div><!-- sl-pagebody -->
 </div><!-- sl-mainpanel -->

@endsection

