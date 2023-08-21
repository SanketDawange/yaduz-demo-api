@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header bg-light d-flex align-items-center justify-content-between">
                <h5>Add Category</h5>
                <div class="d-flex align-items-center justify-content-center">
                    <a href="/categories" class="btn btn-primary mb-1"> <i class="ft-arrow-left"></i> Back</a>
                </div>
            </div>
            <div class="card-body">
                <form id="addCategoryForm" action="/add-category" method="POST">
                    @csrf
                    <h4 class="form-section"><i class="ft-info"></i> Details</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Category Name<span style="color:#ff0000">*</span></label><input autocomplete="off" required placeholder="Enter category name" class="form-control @error('category_name') is-invalid @enderror" type="text" id="category_name" name="category_name">
                            @error('category_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <input type="submit" class="btn btn-success" value="Submit">
                </form>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
@endsection
