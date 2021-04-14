@extends('layouts.superadmin')
@section('superadmin')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Update Blog</h4>

                <div class="page-title-right">

                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" novalidate="" action="{{route('superadmin.blog.create.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="validationCustom01">Blog Title</label>
                                    <input type="text" name="title" value="{!! $blog->title !!}" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="">
                                    <input type="hidden" name="edit_blog" value="{{$blog->id}}" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label for="validationCustom01">Blog Category</label>
                                    <select class="form-control" name="cat_id">
                                        <option value="0">select any</option>
                                        @foreach($blog_cats as $blogct)
                                            <option value="{{$blogct->id}}" {{$blogct->id == $blog->cat_id ? 'selected' : ''}}>{{$blogct->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="validationCustom01">Blog Description</label>
                                    <textarea type="text" name="description" class="form-control" id="summary-ckeditor-shipping" autocomplete="off" placeholder="">{!! $blog->description !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="validationCustom01">Blog Image</label>
                                    <br>
                                    @if (!empty($blog->image) && file_exists($blog->image))
                                        <img src="{{asset($blog->image)}}" style="height: 100px;width: 100px;">
                                    @else
                                        <img src="https://www.chanchao.com.tw/images/default.jpg" style="height: 100px;width: 100px;">
                                    @endif

                                    <input type="file" name="image" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label for="validationCustom01">Blog Status</label>
                                    <select class="form-control" name="status">
                                        <option value="0">select any</option>
                                        <option value="1" {{$blog->status == 1 ? 'selected' : ''}}>Publish</option>
                                        <option value="2" {{$blog->status == 2 ? 'selected' : ''}}>Un-Publish</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->

    </div>
@endsection

@section('js')
    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor-shipping' );

    </script>
@stop
