@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header bg-light d-flex align-items-center justify-content-between">
                <h5>Products</h5>
                <div class="d-flex align-items-center justify-content-center">
                <a href="add-product" class="btn btn-success mb-1"> <i class="fa fa-plus"></i> Add Product</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>@php
                                        $category = \App\Models\Category::find($product->category_id);
                                        @endphp

                                        @if ($category) {{ $category->name }}
                                        @else Category not found
                                        @endif</td>
                                    <td>
                                        <a class="btn btn-info" href="/view-product/{{$product->id}}"><i
                                        class="fa fa-eye"></i></a>
                                        <a href="edit-product/{{$product->id}}"
                                            class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        <button onclick="deleteCategory('{{ $product->id }}')" type="button"
                                            class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </td>
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

    <script src="{{ asset('app-assets/js/admin/categories.js') }}"></script>
    <script>
        function addCategory() {
            Swal.fire({
                title: 'Add Product',
                html: `
                    <form id="add-category-form" action="/add-product" method="POST">
                        @csrf
                        <label for="">Choose category</label>
                        <select required class="form-control" name="category_id" id="">
                        <option value="">Choose category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                        </select>
                        <input placeholder="Enter product name" required type="text" name="product_name" id="category_name" class="mt-3 form-control">
                        <input type="submit" class="mt-3 btn btn-success" value="Add">
                    </form>`,
                showCancelButton: true,
                focusConfirm: false
            });
        }
        function editCategory(productId ,cat_id, prod_name) {
            Swal.fire({
                title: 'Edit Product',
                html: `
                    <form id="edit-category-form" action="/edit-product" method="POST">
                        @csrf
                        <input type="text" hidden name="product_id" class="swal2-input" value="${productId}">
                        <select required class="form-control" name="category_id" id="">
                        @foreach ($categories as $category)
                            <option ${`{{$category->id}}`==cat_id ? 'selected' : ''} value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                        </select>
                        <input required type="text" name="product_name" id="product_name" class="mt-3 form-control" value="${prod_name}">
                        <input type="submit" class="mt-3 btn btn-success" value="Save">
                    </form>`,
                showCancelButton: false,
                focusConfirm: false
            });
        }

        function deleteCategory(categoryId) {
            Swal.fire({
                title: 'Delete Product',
                text: 'Are you sure you want to delete this product?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `/delete-product/${categoryId}`;
                }
            });
        }
    </script>
@endsection
