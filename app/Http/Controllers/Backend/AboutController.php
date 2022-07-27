<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    public function index(Datatables $datatables, Request $request)
    {
        if ($request->ajax()) {
            return $datatables->of(About::query()->latest()->withTrashed())
                ->addColumn('title', function (About $about) {
                    return $about->title;
                })
                ->addColumn('content', function (About $about) {
                    return Str::limit($about->content,10,'...') ;
                })
                ->addColumn('action', function (About $about) {

                    return \view('backend.about.button_action', compact('barang'));
                })
                ->addColumn('status', function (About $about) {
                    if ($about->deleted_at) {
                        return 'Inactive';
                    } else {
                        return 'Active';
                    }
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        } else {
            return view('backend.about.index');

        }
    }
    // public function index(Request $request)
    // {
    //     $data = About::orderBy('id','DESC')->paginate(5);
    //     return view('backend.about.index',compact('data'))
    //         ->with('i', ($request->input('page', 1) - 1) * 5);
    // }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.about.create');
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
            'slug' => 'required',
            'image'=> 'required',
            'content' => 'required',
            
        ]);
    
        $input = $request->all();

        
        About::create($input);
        
        
        return redirect()->route('dashboard.about.create')
                        ->with('success','About berhasil ditambahkan');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $about = About::find($id);
        return view('backend.about.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $about = About::find($id);
        return view('backend.about.edit',compact('about'));
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
            'slug' => 'required',
            'image'=> 'required',
            'content' => 'required',
            
        ]);
    
        $input = $request->all();
        $about = About::find($id);
        $about->update($input);
        
    
        return redirect()->route('dashboard.about.edit',$id)
                        ->with('success','About updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        About::find($id)->delete();
        return redirect()->route('dashboard.about.index')
                        ->with('success','About deleted successfully');
    }
    
}
