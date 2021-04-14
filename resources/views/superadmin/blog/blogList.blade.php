@extends('layouts.superadmin')
@section('superadmin')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Blog</h4>

                <div class="page-title-right">
                    <a href="{{route('superadmin.blog.create')}}">
                    <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0 btn-sm">
                        Create New Blog
                    </button>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Plan List</h4>

                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead>
                            <tr>
                                <th>Blog Image</th>
                                <th>Category Title</th>
                                <th>Category Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blogs as $blog)
                                <tr>
                                    <th><img src="{{asset($blog->image)}}" style="height: 100px;width: 100px"></th>
                                    <th>
                                        @if (strlen($blog->title) > 20)
                                            {{substr($blog->title,0,50)}}.....
                                        @else
                                            {{$blog->title}}
                                        @endif

                                    </th>
                                    <th>@if ($blog->status == 1)
                                        Publish
                                        @elseif($blog->status == 2)
                                            Un-Publish
                                        @else
                                            Not Set
                                    @endif
                                    </th>
                                    <td>
                                        <a href="{{route('superadmin.blog.edit',$blog->id)}}">
                                            <button type="button" class="btn btn-primary btn-sm" >
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </a>

                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteblog{{$blog->id}}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>


                                <div class="modal fade" id="deleteblog{{$blog->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Delete Blog</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('superadmin.blog.create.delete')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        are your sure to delete this blog ?
                                                        <input type="hidden" class="form-control" placeholder="Enter Plan Name" name="blog_delete" value="{{$blog->id}}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            </tbody>
                        </table>
                        {{$blogs->links()}}
                    </div>

                </div>
            </div>
        </div>

    </div>


@endsection
