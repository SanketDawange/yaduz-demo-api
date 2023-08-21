@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header bg-light d-flex align-items-center justify-content-between">
                <h5>Manage Category List </h5>
                <div class="d-flex align-items-center justify-content-center">
                    <a href="/add-category" class="btn btn-success mb-3"> <i class="fa fa-plus"></i> Add Category</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Category Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a class="btn btn-info" href="/view-category/{{$category->id}}"><i
                                            class="fa fa-eye"></i></a>
                                        <a href="edit-category/{{ $category->id }}" class="btn btn-primary"><i
                                                class="fa fa-edit"></i></a>
                                        <button onclick="deleteCategory('{{ $category->id }}')" type="button"
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
                title: 'Add Category',
                html: `
                    <form id="add-category-form" action="/add-category" method="POST">
                        @csrf
                        <input placeholder="Enter category name" required type="text" name="category_name" id="category_name" class="form-control mb-3">
                        <input type="submit" class="btn btn-success" value="Add">
                    </form>`,
                showCancelButton: true,
                focusConfirm: false
            });
        }

        function editCategory(categoryId, categoryName) {
            Swal.fire({
                title: 'Edit Category',
                html: `
                    <form id="edit-category-form" action="/edit-category" method="POST">
                        @csrf
                        <input type="text" hidden name="category_id" id="category_id" class="form-control" value="${categoryId}">
                        <input required type="text" name="category_name" id="category_name" class="form-control mb-3" value="${categoryName}">
                        <input type="submit" class="btn btn-success" value="Save">
                    </form>`,
                showCancelButton: true,
                focusConfirm: false
            });
        }

        function deleteCategory(categoryId) {
            Swal.fire({
                title: 'Delete Category',
                text: 'Are you sure you want to delete this Category?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `/delete-category/${categoryId}`;
                }
            });
        }
    </script>
@endsection
