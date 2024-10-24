@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add Category
            </button>

        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">All Blog Category</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Category Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1
                                @endphp
                                @if(count($bal) > 0)
                                @foreach($bal as $items)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$items->cat_name}}</td>
                                    <td>{{$items->cat_slug}}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" id="{{$items->id}}" onclick="categoryEdit(this.id)" data-bs-toggle="modal" data-bs-target="#example">Edit</button>
                                        <a href="{{route('blog.category.delete',$items->id)}}" class="btn btn-outline-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="3" class="text-center">No Data Found</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="POST" action="{{route('store.blog.category')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="old_password" name="cat_name" autocomplete="off">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-primary me-2">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!--Edit Modal -->
<div class="modal fade" id="example" tabindex="-1" aria-labelledby="example" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="POST" action="{{route('blog.category.update')}}">
                    @csrf
                    <input type="hidden" class="form-control" id="cat_id" name="cat_id" autocomplete="off">
                    <div class="mb-3">
                        <label for="username" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="cat" name="cat_name" autocomplete="off">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary me-2">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function categoryEdit(id) {

        $.ajax({
            type: 'GET',
            url: '/admin/edit/blog/category/' + id,
            dataType: 'json',
            success: function(data) {
                $('#cat').val(data.cat_name);
                $('#cat_id').val(data.id);
            }
        })
    }
</script>
@endsection