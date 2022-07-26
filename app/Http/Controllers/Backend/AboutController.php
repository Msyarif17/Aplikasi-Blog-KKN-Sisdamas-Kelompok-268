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

                    return \view('dashboard.barang.button_action', compact('barang'));
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
    //     return view('dashboard.barang.index',compact('data'))
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
            'nama' => 'required',
            'id_supplyer' => 'required',
            'kategori_id'=> 'required',
            'harga_beli_satuan' => 'required',
            'harga_jual_satuan' => 'required' ,
            'stok'=> 'required',
            
        ]);
    
        $input = $request->all();

        $input['discount'] = json_encode(array($request->discount));

        $input['kategori_id'] = implode("",$request->kategori_id);

        $input['id_supplyer'] = implode("",$request->id_supplyer);

        $id = 1;

        if(About::get()->count() != 0 || About::get()->count() != null){
            $id = About::latest()->first()->id+1;
        }

        $input['kode'] = (int)
        sprintf("%13s",$input['kategori_id']).
        sprintf("%03s",$input['id_supplyer']).
        sprintf("%03s",$id);

        $br = new DNS1D;

        $barcode =$br->getBarcodePNG($input['kode'], 'UPCA');

        Storage::disk('image')->put('barcode-'.str($input['kode']).'.png',base64_decode($br->getBarcodePNG($input['kode'], 'UPCA')));
        
        $input['barcode_img'] = 'image/barcode-'.str($input['kode']).'.png';

        About::create($input);
        
        
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
        
        $about = About::find($id);
        return view('dashboard.barang.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::pluck('nama','id')->all();
        $supplyer = Supplyer::pluck('nama','id')->all();
        $discount = array();
        for($i = 0;$i<=100;$i++){
            array_push($discount,$i);
        }
        $about = About::find($id);
        return view('dashboard.barang.edit',compact('barang','kategori','supplyer','discount'));
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
            'nama' => 'required',
            'id_supplyer' => 'required',
            'kategori_id'=> 'required',
            'harga_beli_satuan' => 'required',
            'harga_jual_satuan' => 'required' ,
            'stok'=> 'required'
            
        ]);
    
        $input = $request->all();
        $input['discount'] = json_encode(array($request->discount));
        $input['kategori_id'] = implode("",$request->kategori_id);
        $input['id_supplyer'] = implode("",$request->id_supplyer);
    
        $about = About::find($id);
        $about->update($input);
        
    
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
        About::find($id)->delete();
        return redirect()->route('admin.barang.index')
                        ->with('success','barang deleted successfully');
    }
    public function tambahStok($id){
        $input['stok'] = About::find($id)->stok+1;
        About::find($id)->update($input);
        return redirect()->route('admin.barang.index');
    }
    public function kurangiStok($id){
        $input['stok'] = About::find($id)->stok-1;
        About::find($id)->update($input);
        return redirect()->route('admin.barang.index');
    }
}
