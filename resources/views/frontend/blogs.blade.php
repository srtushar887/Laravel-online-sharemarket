@extends('layouts.frontend')
@section('front')
    <div class="page-area">
        <div class="breadcumb-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcrumb text-center">
                        <div class="section-headline">
                            <h2>Blog</h2>
                        </div>
                        <ul>
                            <li class="home-bread">Home</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blog-area bg-color area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">

                </div>
            </div>
            <div class="row">
                <div class="blog-grid home-blog">
                    <!-- Start single blog -->
                    @foreach($blogs as $blog)
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-blog">
                            <div class="blog-image">
                                <a class="image-scale" href="{{route('blog.details',$blog->id)}}">
                                    @if (!empty($blog->image) && file_exists($blog->image))
                                        <img src="{{asset($blog->image)}}" style="height: 274px;width: 100%" alt="">
                                    @else
                                        <img src="https://www.chanchao.com.tw/images/default.jpg" style="height: 274px;width: 100%" alt="">
                                    @endif

                                </a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-category">
                                    <?php
                                    $bl_cat = \App\Models\blog_category::where('id',$blog->cat_id)->first();
                                    ?>
                                    <span>
                                        @if ($bl_cat)
                                            {{$bl_cat->category_name}}
                                        @endif

                                    </span>
                                </div>
                                <?php
                                $count_comm = \App\Models\blog_comment::where('blog_id',$blog->id)->count();
                                ?>
                                <div class="blog-meta">
                                        <span class="admin-type">
                                            <i class="fa fa-user"></i>
                                            Admin
                                        </span>
                                    <span class="date-type">
                                           <i class="fa fa-calendar"></i>
                                            {{\Carbon\Carbon::parse($blog->created_at)->format('Y-m-d')}}
                                        </span>
                                    <span class="comments-type">
                                            <i class="fa fa-comment-o"></i>
                                            {{$count_comm}}
                                        </span>
                                </div>
                                <div class="blog-title">
                                    <a href="{{route('blog.details',$blog->id)}}">
                                        <h4>
                                           @if (strlen($blog->title) > 40)
                                               {{substr($blog->title,0,40)}}.........
                                            @else
                                               {!! $blog->title !!}
                                           @endif
                                        </h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="blog-pagination">
                            {{$blogs->links()}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- End row -->
        </div>
    </div>

@endsection
