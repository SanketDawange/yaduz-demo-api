@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header bg-light d-flex align-items-center justify-content-between">
                <h5>Manage Order List</h5>
                <div class="d-flex align-items-center justify-content-center">
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped datatable" id="dataTable" width="100%" cellspacing="0"
                        data-url="order_data">
                        <thead>
                            <tr>
                                <th id="sr_no" data-orderable="false" data-searchable="false">Sr No</th>
                                <th id="order_id" data-orderable="false" data-searchable="false">Order ID</th>
                                <th id="grand_total" data-orderable="false" data-searchable="false">Order Amount</th>
                                <th id="gst" data-orderable="false" data-searchable="false">GST Percentage</th>
                                <th id="order_status" data-orderable="false" data-searchable="false">Order Status</th>
                                <th data-orderable="false" data-searchable="false">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $key => $order)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $order->order_id }}</td>
                                    <td>{{ $order->price_amount }}</td>
                                    <td>{{ $order->gst_percentage }}</td>
                                    <td>
                                        @if ($order->order_status == '0')
                                            Pending
                                        @else
                                            Successful
                                        @endif
                                    </td>
                                    <td><a href="view-order/{{$order->order_id}}" class="btn-primary btn"><i class="ft-eye"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
@endsection
