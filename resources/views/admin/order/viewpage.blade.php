@extends('admin.admin_master')
@section('order')active @endsection
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

                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">View Shipping Details</h6>

                    <div class="form-layout">
                      <div class="row mg-b-25">
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label">Firstname: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="firstname" value="{{ $shipping-> shipping_first_name}}" readonly placeholder="Enter firstname">
                          </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label">Lastname: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="lastname" value="{{ $shipping->shipping_last_name }}" readonly placeholder="Enter lastname">
                          </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label">Shipping Email address: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="email" value="{{ $shipping->shipping_email }}" readonly placeholder="Enter email address">
                          </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                              <label class="form-control-label">Shipping Phone: <span class="tx-danger">*</span></label>
                              <input class="form-control" type="text" name="email" value="{{ $shipping->shipping_phone }}" readonly placeholder="Enter email address">
                            </div>
                          </div><!-- col-4 -->
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label class="form-control-label">Shipping address: <span class="tx-danger">*</span></label>
                              <input class="form-control" type="text" name="email" value="{{ $shipping->address }}" readonly placeholder="Enter email address">
                            </div>
                          </div><!-- col-4 -->
                      </div><!-- row -->
                    </div><!-- form-layout -->
                  </div><!-- card -->
            </div>

            <div class="col-lg-12">

                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">View Order Details</h6>

                    <div class="form-layout">
                      <div class="row mg-b-25">
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label">Invoice NO: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="firstname" value="#arif{{ $orders-> invoice_no}}" readonly placeholder="Enter firstname">
                          </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label">Payment type: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="lastname" value="{{ $orders->payment_type }}" readonly placeholder="Enter lastname">
                          </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label">Shipping Email address: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="email" value="{{ $orders->total }}" readonly placeholder="Enter email address">
                          </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                              <label class="form-control-label">Shipping Phone: <span class="tx-danger">*</span></label>
                              <input class="form-control" type="text" name="email" value="{{ $orders->sub_total }}" readonly placeholder="Enter email address">
                            </div>
                          </div><!-- col-4 -->
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label class="form-control-label">Shipping discount: <span class="tx-danger">*</span></label>
                              <input class="form-control" type="text" name="email" @if ($orders->coupon_discount ==null)
                              value="No"

                              @else
                              value="{{ $orders->coupon_discount }}"
                              @endif  readonly placeholder="Enter email address">
                            </div>
                          </div><!-- col-4 -->
                      </div><!-- row -->

                    </div><!-- form-layout -->
                  </div><!-- card -->

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
                    <th scope="col">SL NO</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Product quantity</th>
                </tr>
              </thead>
              <tbody>
               @php
                $i=1;
                @endphp
              @foreach($orderItem as $oreder)
                <tr>
                  <td>
                    <label class="ckbox mg-b-0"></label>
                  </td>
                    <td>{{$i++}}</td>
                    <td>{{$oreder->product->product_name}}</td>
                    <td><img style="width: 200px;height:60px;" src="{{ asset($oreder->product->brand_image1) }}" alt=""></td>
                    <td>{{$oreder->product_qty}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            </div>

            </div>
        </div>
      </div>
     </div><!-- card -->
     </div><!-- sl-pagebody -->
 </div><!-- sl-mainpanel -->

@endsection
