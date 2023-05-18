<?php

namespace App\Http\Controllers\Admin;


use App\Models\Blogs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBlogController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Admin Blogs - DogeShop';
        $viewData['blogs'] = Blogs::all();
        return view('admin.blog.index')->with('viewData', $viewData);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
            'date' => 'required',
        ]);
        $blog = new Blogs();
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->image = $request->image;
        $blog->date = $request->date;
        $blog->save();
        if ($request->hasFile('image')) {
            $imageName = $blog->getId() . "_blog_Image" . "." . $request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $blog->setImage($imageName);
            $blog->save();
        }
        return back();
    }

    public function delete($id)
    {
        Blogs::destroy($id);
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData['title'] = 'Admin Blogs - DogeShop';
        $viewData['blogs'] = Blogs::findorfail($id);
        return view('admin.blog.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
            'date' => 'required',
        ]);
        $blog = Blogs::findorfail($id);
        $blog->setTitle($request->title);
        $blog->setContent($request->content);
        $blog->setImage($request->image);
        $blog->setDate($request->date);
        if ($request->hasFile('image')) {
            $imageName = $blog->getId() . "_blog_Image" . "." . $request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $blog->setImage($imageName);
            $blog->save();
        }
        $blog->save();
        return redirect()->route('admin.blog.index');
    }
}
