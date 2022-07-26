<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(Datatables $datatables, Request $request)
    {
        if ($request->ajax()) {
            return $datatables->of(Blog::query()->with([
                'category',
                'tagDetail',
            ])->latest()->withTrashed())
                ->addColumn('title', function (Blog $blog) {
                    return $blog->title;
                })
                ->addColumn('content', function (Blog $blog) {
                    return Str::limit($blog->content, 10, '...') ;
                })
                ->addColumn('link',function (Blog $blog){
                    return $blog->slug;
                })
                ->addColumn('action', function (Blog $blog) {

                    return \view('dashboard.blog.button_action', compact('blog'));
                })
                ->addColumn('status', function (Blog $blog) {
                    if ($blog->deleted_at) {
                        return 'Inactive';
                    } else {
                        return 'Active';
                    }
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        } else {
            return view('backend.blog.index');

        }
    }
    // public function index(Request $request)
    // {
    //     $data = Blog::orderBy('id','DESC')->paginate(5);
    //     return view('dashboard.blog.index',compact('data'))
    //         ->with('i', ($request->input('page', 1) - 1) * 5);
    // }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Category::pluck('nama','id')->all();
        $tag = Tag::pluck('nama','id')->all();
        
        return view('backend.blog.create',compact('kategori','tag'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'tag_details_id' => 'required',
        ]);
    
        $input = $request->all();
        $input['slug'] = Str::slug($request->title);
        $input['user_id'] = auth()->user()->id;
        $input['image'] = $request->file('image')->store('blog');

        $input['category_id'] = implode("",$request->category_id);

        $input['tag_detail_id'] = implode("",$request->tag_id);


        Blog::create($input);
        
        
        return redirect()->route('backend.blog.index')
                        ->with('success','Blog berhasil ditambahkan');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $blog = Blog::find($id);
        return view('backend.blog.index',compact('blog'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Category::pluck('nama','id')->all();
        $tag = Tag::pluck('nama','id')->all();
        $blog = Blog::find($id);
        return view('backend.blog.create',compact('kategori','tag','blog'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'tag_details_id' => 'required',
        ]);
    
        $input = $request->all();
        $input['slug'] = Str::slug($request->title);
        $input['user_id'] = auth()->user()->id;
        $input['image'] = $request->file('image')->store('blog');

        $input['category_id'] = implode("",$request->category_id);

        $input['tag_detail_id'] = implode("",$request->tag_id);
    
        $blog = Blog::find($id);
        $blog->update($input);
        
    
        return redirect()->route('admin.blog.update',$id)
                        ->with('success','Post updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::find($id)->delete();
        return redirect()->route('admin.blog.index')
                        ->with('success','Post deleted successfully');
    }
    public function tambahStok($id){
        $input['stok'] = Blog::find($id)->stok+1;
        Blog::find($id)->update($input);
        return redirect()->route('admin.blog.index');
    }
    public function kurangiStok($id){
        $input['stok'] = Blog::find($id)->stok-1;
        Blog::find($id)->update($input);
        return redirect()->route('admin.blog.index');
    }
}