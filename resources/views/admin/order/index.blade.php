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
                    <th scope="col">Invoice No</th>
                    <th scope="col">Payment Type</th>
                    <th scope="col">Total</th>
                    <th scope="col">Sub Totale</th>
                    <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
               @php
                $i=1;
                @endphp
              @foreach($oreders as $oreder)
                <tr>
                  <td>
                    <label class="ckbox mg-b-0"></label>
                  </td>
                    <td>{{$i++}}</td>
                    <td>#arif{{$oreder->invoice_no}}</td>
                    <td>{{$oreder->payment_type}}</td>
                    <td>{{$oreder->total}}</td>
                    <td>{{$oreder->sub_total}}</td>
                    @if($oreder->ststus== null)
                    <td>No | <a href="{{ url('view/product/'.$oreder->id) }}">View</a></td>
                    @else
                    <td>Yes | <a href="{{ url('view/product/'.$oreder->id) }}">View</a></td>
                    @endif
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
