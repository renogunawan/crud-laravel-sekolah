<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Http\Requests\StoreMapelRequest;
use App\Http\Requests\UpdateMapelRequest;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $mapels = Mapel::where('kode_buku','LIKE','%'.$request->search.'%')
            ->orWhere('mapel','LIKE','%'.$request->search.'%')
            ->paginate(3);
        }else{
        $mapels = Mapel::latest()->paginate(3);
        }
        
        return view('mapel.index' , compact('mapels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mapel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMapelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $this->validate($request,[
            'kode_buku'=>'required|unique:mapels|min:5|max:7',
            
            'mapel'=>'required|unique:mapels',
        ],[
            'mapel.unique'=>'mapel sudah ada',
            'mapel.required'=>'harap isi mapel',
            'kode_buku.unique'=>'kode buku telah digunakan',
            'kode_buku.required'=>'harap isi kode buku',
            'kode_buku.min'=>'kode buku minimal 5',
            'kode_buku.max'=>'kode buku maksimal 7',
        ]);
            Mapel::create([
            'kode_buku'=>$request->kode_buku,
            'mapel'=>$request->mapel,
            ]);
            return redirect()->route('mapel.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function show(Mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit(Mapel $mapel)
    {
    return view('mapel.edit' , compact('mapel'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMapelRequest  $request
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mapel $mapel)
    {
        $this->validate($request, [
            'kode_buku' => 'required|unique:mapels,kode_buku, '. $mapel->id . '|min:5|max:7',
            'mapel' => 'required',
            
        ],[
'kode_buku.unique'=>'kode buku telah digunakan',
'kode_buku.required'=>'harap isi kode buku',
'kode_buku.min'=>'kode buku minimal 5',
'kode_buku.max'=>'kode buku maksimal 7',
        ]);
       $mapel->update([
        'kode_buku'=>$request->kode_buku,
        'mapel'=>$request->mapel,
       ]);

    
        return redirect()->route('mapel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mapel $mapel)
    {
        try {
             $mapel->delete();
            return redirect()->route('mapel.index');
        } catch (QueryException $e) {
            return back()->withError(['restrict' => 'Tidak dapat menghapus data ini karena terkait dengan data lain.']);
        }
       
    }
}
