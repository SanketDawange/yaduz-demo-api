@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header bg-light d-flex align-items-center justify-content-between">
                <h5>View Category</h5>
                <div class="d-flex align-items-center justify-content-center">
                    <a href="/categories" class="btn btn-primary mb-1"> <i class="ft-arrow-left"></i> Back</a>
                </div>
            </div>
            <div class="card-body">
                <h4 class="form-section"><i class="ft-info"></i> Details</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td>Category Name</td>
                                <td>{{$category->name}}</td>
                            </tr>
                            <tr>
                                <td>Created Date</td>
                                <td>{{ $category->created_at->format('Y-m-d') }}</td>
                            </tr>
                            <tr>
                                <td>Created Time</td>
                                <td>{{ $category->created_at->format('H:i:s') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
@endsection
