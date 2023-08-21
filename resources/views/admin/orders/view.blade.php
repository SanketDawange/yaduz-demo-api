@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header bg-light d-flex align-items-center justify-content-between">
                <h5>View Order #{{$order->order_id}}</h5>
                <div class="d-flex align-items-center justify-content-center">
                    <a href="/orders" class="btn btn-primary mb-1"> <i class="ft-arrow-left"></i> Back</a>
                </div>
            </div>
            <div class="card-body">

            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
@endsection
