<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\blog;
use App\Models\blog_category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SuperAdminBlogController extends Controller
{
    public function blog_category()
    {
        $blog_cats = blog_category::orderBy('id','desc')->paginate(15);
        return view('superadmin.blog.blogCategory',compact('blog_cats'));
    }

    public function blog_category_save(Request $request)
    {
        $blog_cat_save = new blog_category();
        $blog_cat_save->category_name = $request->category_name;
        $blog_cat_save->save();
        return back()->with('success','Blog Category Successfully Created');

    }


    public function blog_category_update(Request $request)
    {
        $blog_cat_update = blog_category::where('id',$request->blog_cat_edit)->first();
        $blog_cat_update->category_name = $request->category_name;
        $blog_cat_update->save();
        return back()->with('success','Blog Category Successfully Updated');
    }

    public function blog_category_delete(Request $request)
    {
        $blog_cat_delete = blog_category::where('id',$request->blog_cat_delete)->first();
        $blog_cat_delete->delete();
        return back()->with('success','Blog Category Successfully Deleted');
    }


    public function blog_list()
    {
        $blogs = blog::orderBy('id','desc')->paginate(15);
        return view('superadmin.blog.blogList',compact('blogs'));
    }

    public function blog_create()
    {
        $blog_cats = blog_category::all();
        return view('superadmin.blog.blogCreate',compact('blog_cats'));
    }

    public function blog_save(Request $request)
    {
        $new_blog = new blog();
        if($request->hasFile('image')){
//            @unlink($gen->logo);
            $image = $request->file('image');
            $imageName = time().uniqid().'.'.'png';
            $directory = 'assets/admin/images/blog/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $new_blog->image = $imgUrl;
        }


        $new_blog->cat_id = $request->cat_id;
        $new_blog->title = $request->title;
        $new_blog->description = $request->description;
        $new_blog->status = $request->status;
        $new_blog->save();
        return back()->with('success','Blog Successfully Created');


    }

    public function blog_edit($id)
    {
        $blog = blog::where('id',$id)->first();
        $blog_cats = blog_category::all();
        return view('superadmin.blog.blogEdit',compact('blog','blog_cats'));
    }

    public function blog_update(Request $request)
    {
        $update_blog = blog::where('id',$request->edit_blog)->first();
        if($request->hasFile('image')){
            @unlink($update_blog->logo);
            $image = $request->file('image');
            $imageName = time().uniqid().'.'.'png';
            $directory = 'assets/admin/images/blog/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $update_blog->image = $imgUrl;
        }


        $update_blog->cat_id = $request->cat_id;
        $update_blog->title = $request->title;
        $update_blog->description = $request->description;
        $update_blog->status = $request->status;
        $update_blog->save();
        return back()->with('success','Blog Successfully Updated');
    }


    public function blog_delete(Request $request)
    {
        $blog_delete = blog::where('id',$request->blog_delete)->first();
        @unlink($blog_delete->logo);
        $blog_delete->delete();
        return back()->with('success','Blog Successfully Deleted');
    }








}
