@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('add.type')}}" class="btn btn-inverse-primary">Add Property</a></li>

        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">All Blog</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Short Description</th>
                                    <th>Long Description</th>
                                    <th>Category Name</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1

                                @endphp
                                @if(count($blog)>0)
                                @foreach($blog as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->slug}}</td>
                                    <td>{{$item->short_des}}</td>
                                    <td>{!!$item->long_des!!}</td>
                                    <td>{{$item->cat->cat_name}}</td>
                                    <td> <img class="wd-60 rounded-circle" id="showImage" src="{{ (!empty($item->image)) ? 
                            url($item->image) : url('upload/no_image.jpg')}}" alt="profile">
                                    </td>
                                    <td>{{$item->tag}}</td>

                                    <td>
                                        <a href="{{route('blog.post.edit',$item->id)}}" class="btn btn-outline-primary">Edit</a>
                                        <a href="{{route('blog.post.delete',$item->id)}}" class="btn btn-outline-danger">Delete</a>
                                    </td>


                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="6" class="text-center">No Data Found</td>
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
@endsection