@extends('layouts.frontend')
@section('front')
    <div class="page-area">
        <div class="breadcumb-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcrumb text-center">
                        <div class="section-headline">
                            <h2>Blog Details</h2>
                        </div>
                        <ul>
                            <li class="home-bread">Home</li>
                            <li>Blog Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="blog-area bg-color fix area-padding">
        <div class="container">
            <div class="row">
                <div class="blog-details">
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <!-- single-blog start -->
                        <article class="blog-post-wrapper">
                            <div class="blog-banner">
                                <a href="#" class="blog-images">
                                    @if (!empty($blogs_details->image) && file_exists($blogs_details->image))
                                        <img src="{{asset($blogs_details->image)}}" style="height: 500px;width: 100%" alt="">
                                    @else
                                        <img src="https://www.chanchao.com.tw/images/default.jpg" style="height: 500px;width: 100%" alt="">
                                    @endif
                                </a>
                                <?php
                                $count_comm = \App\Models\blog_comment::where('blog_id',$blogs_details->id)->count();
                                ?>
                                <div class="blog-content">
                                    <h4>{!! $blogs_details->title !!}</h4>
                                    <div class="blog-meta">
                                            <span class="admin-type">
                                                <i class="fa fa-user"></i>
                                                Admin
                                            </span>
                                        <span class="date-type">
                                               <i class="fa fa-calendar"></i>
                                                {{\Carbon\Carbon::parse($blogs_details->created_at)->format('Y-m-d')}}
                                            </span>
                                        <span class="comments-type">
                                                <i class="fa fa-comment-o"></i>
                                                {{$count_comm}}
                                            </span>
                                    </div>
                                    <p>{!! $blogs_details->description !!}</p>
                                </div>
                            </div>
                        </article>
                        <div class="clear"></div>
                        <div class="clear"></div>
                        <div class="single-post-comments">
                            <div class="comments-area">
                                <div class="comments-heading">

                                    <h3>{{$count_comm}} comments</h3>
                                </div>
                                <div class="comments-list">
                                    <ul>
                                        @foreach($comments as $comm)
                                        <li>
                                            <div class="comments-details">
                                                <div class="comments-list-img">
                                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpiAvkk5ghcWyvOo7rY_OHEck0iLCl-IgZog&usqp=CAU" style="height: 55px;" alt="post-author">
                                                </div>
                                                <div class="comments-content-wrap">
														<span>
															<b><a href="#">{{$comm->name}}</a></b>
															{{$comm->email}}
															<span class="post-time">{{\Carbon\Carbon::parse($comm->created_at)->format('Y-md-d')}}</span>
														</span>
                                                    <p>{!! $comm->comment !!}</p>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                            <div class="comment-respond">
                                <h3 class="comment-reply-title">Leave a Reply </h3>

                                <form action="{{route('blog.comment.save')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <p>First Name *</p>
                                            <input type="text" name="name" required>
                                            <input type="hidden" name="blog_id" value="{{$blogs_details->id}}">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <p>Email *</p>
                                            <input type="email" name="email" required>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 comment-form-comment">
                                            <p>Massage *</p>
                                            <textarea id="message-box" cols="30" name="comment" rows="10" required></textarea>
                                            <input class="add-btn contact-btn" type="submit" value="Post Comment">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- single-blog end -->
                    </div>
                    <!-- Start Right Sidebar blog -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="left-head-blog right-side">
                            <div class="left-blog-page">
                                <div class="left-blog blog-category">
                                    <h4>categories</h4>
                                    <ul>
                                        @foreach($blog_categories as $cats)
                                            <?php
                                                $blog_count_cat = \App\Models\blog::where('cat_id',$cats->id)->count();
                                            ?>
                                        <li><span>{{$blog_count_cat}}</span><a href="#">{{$cats->category_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="left-blog-page">
                                <!-- recent start -->
                                <div class="left-blog">
                                    <h4>recent post</h4>
                                    <div class="recent-post">
                                        <!-- start single post -->
                                        @foreach($recent_blogs as $rblogs)
                                        <div class="recent-single-post">
                                            <div class="post-img">
                                                <a href="{{route('blog.details',$rblogs->id)}}">
                                                    @if (!empty($rblogs->image) && file_exists($rblogs->image))
                                                        <img src="{{asset($rblogs->image)}}" style="height: 100px;width: 100%" alt="">
                                                    @else
                                                        <img src="https://www.chanchao.com.tw/images/default.jpg" style="height: 100px;width: 100%" alt="">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="pst-content">
                                                <p><a href="{{route('blog.details',$rblogs->id)}}">
                                                        @if (strlen($rblogs->title) > 20)
                                                            {{substr($rblogs->title,0,20)}}.........
                                                        @else
                                                            {!! $rblogs->title !!}
                                                        @endif
                                                    </a></p>
                                                <span class="date-type">
														{{\Carbon\Carbon::parse($rblogs->created_at)->format('Y-m-d')}}
													</span>
                                            </div>
                                        </div>
                                    @endforeach
                                        <!-- End single post -->

                                    </div>
                                </div>
                                <!-- recent end -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Right Sidebar -->
            </div>
            <!-- End row -->
        </div>
    </div>
@endsection
