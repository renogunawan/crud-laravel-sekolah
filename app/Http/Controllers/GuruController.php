<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use App\Http\Requests\StoreGuruRequest;
use App\Http\Requests\UpdateGuruRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        if ($request->has('search')) {
            $gurus = Guru::where('nama', 'LIKE', '%'.$request->search .'%')
            ->orWhere('jenis_kelamin', 'LIKE', '%'. $request->search.'%')
            ->paginate(3);
        }else {
            $gurus = Guru::paginate(3);
        }
        return view('guru.index', compact('gurus'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mapel = Mapel::all();
        return view('guru.create' , compact('mapel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGuruRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'mapels_id' => 'required'
        ],[
'nama.required'=>'harap isi nama ',
'jenis_kelamin.required'=>'harap pilih jenis kelamiin',
'image.required'=>'foto tidak boleh kosong',
'mapels_id.required'=>'harap pilih mapel',
        ]);
            //upload image
            $image = $request->file('image');
            $image->storeAs('public/guru', $image->hashName());
            //create post
            
            Guru::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'image' => $image->hashName(),
            'mapels_id' => $request->mapels_id
            ]);
            //redirect to index
            return redirect()->route('guru.index')->with(['success' => 'Data
           Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $guru)
    {
        $mapel = Mapel::all();
        return view('guru.edit' , compact('guru','mapel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGuruRequest  $request
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $guru)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'image' => 'image',
            'mapel' => 'required',
        ]);
    
        // Check if a new image was uploaded
        if ($request->hasFile('image')) {
            // Upload new image
            $image = $request->file('image');
            $image->storeAs('public/guru', $image->hashName());
    
            // Delete old image
            Storage::delete('public/guru/'.$guru->image);
    
            // Update model with new image
            $guru->image = $image->hashName();
        }
    
        // Update model with other attributes
        $guru->nama = $request->nama;
        $guru->jenis_kelamin = $request->jenis_kelamin;
        $guru->mapel = $request->mapel;
    
        // Save changes to model
        $guru->save();
    
        return redirect()->route('guru.index');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        Storage::delete('public/guru/'. $guru->image);
 $guru->delete();

 return redirect()->route('guru.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
