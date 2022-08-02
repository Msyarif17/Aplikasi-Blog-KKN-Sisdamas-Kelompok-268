<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(Datatables $datatables, Request $request)
    {
        if ($request->ajax()) {
            return $datatables->of(Category::query()->latest()->withTrashed())
                ->addColumn('name', function (Category $category) {
                    return $category->name;
                })
                ->addColumn('action', function (Category $category) {

                    return \view('dashboard.barang.button_action', compact('barang'));
                })
                ->addColumn('status', function (Category $category) {
                    if ($category->deleted_at) {
                        return 'Inactive';
                    } else {
                        return 'Active';
                    }
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        } else {
            return view('dashboard.barang.index');

        }
    }
    // public function index(Request $request)
    // {
    //     $data = Category::orderBy('id','DESC')->paginate(5);
    //     return view('dashboaboutrang.index',compact('data'))
    //         ->with('i', ($request->input('page', 1) - 1) * 5);
    // }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.barang.create',compact('kategori','supplyer','discount'));
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
            'name' => 'required',            
        ]);
    
        $input = $request->all();
        $input['slug'] = Str::slug($request->name,'-');
        
        Category::create($input);
        return redirect()->route('admin.barang.create')
                        ->with('success','Barang berhasil ditambahkan');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $category = Category::find($id);
        return view('dashboard.category.show',compact('category'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('dashboard.category.edit',compact('barang','kategori','supplyer','discount'));
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
            'name' => 'required',            
        ]);
    
        $input = $request->all();
        $input['slug'] = Str::slug($request->name,'-');
        
        $category = Category::find($id);
        $category->update($input);      
    
        return redirect()->route('admin.barang.edit',$id)
                        ->with('success','barang updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('admin.barang.index')
                        ->with('success','barang deleted successfully');
    }
}
