@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header bg-light d-flex align-items-center justify-content-between">
                <h5>Add Product</h5>
                <div class="d-flex align-items-center justify-content-center">
                    <a href="/products" class="btn btn-primary mb-1"> <i class="ft-arrow-left"></i> Back</a>
                </div>
            </div>
            <div class="card-body">
                <form id="addCategoryForm" action="/add-product" method="POST">
                    @csrf
                    <h4 class="form-section"><i class="ft-info"></i> Details</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Select Category<span style="color:#ff0000">*</span></label>
                            <select required class="form-control mb-3" name="category_id" id="">
                                @foreach ($categories as $category)
                                    <option @if ($category->id==$product->category_id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                                </select>
                            <label>Product Name<span style="color:#ff0000">*</span></label>
                            <input autocomplete="off" required placeholder="Enter product name" class="form-control mb-3 @error('product_name') is-invalid @enderror" value="{{$product->name}}" type="text" id="product_name" name="product_name">
                            @error('product_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label>Product Price<span style="color:#ff0000">*</span></label>

                            <input autocomplete="off" required placeholder="Enter product price" class="form-control @error('product_price') is-invalid @enderror" value="{{$product->price}}"  type="number" id="product_price" name="product_price">
                            @error('product_price')
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
