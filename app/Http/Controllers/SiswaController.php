<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateSiswaRequest;



class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
    if ($request->has('search')) {
        $siswas = Siswa::where('agama', 'LIKE', '%' . $request->search . '%')
            ->orWhere('nisn', 'LIKE', '%' . $request->search . '%')
            ->orWhere('nama', 'LIKE', '%' . $request->search . '%')
            ->paginate(3);
    } else {
        $siswas = Siswa::paginate(3);
    }

    return view('siswa.index', compact('siswas'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
        'nama'=>'required',
        'nisn'=>'required|unique:siswas,nisn|numeric|digits_between:7,10',
        'jenis_kelamin'=>'required',
        'agama'=>'required',
        ],[
            'nisn.unique'=>'Nisn telah digunakan',
            'nama.required'=>'Harap isi nama',
            'nisn.required'=>'Harap isi nisn',
            'jenis_kelamin.required'=>'Harap pilih jenis kelamin',
            'agama.required'=>'Harap isi agama',
            'nisn.numeric'=>'nisn hanya boleh angka',
            'nisn.digits_between' => 'NISN harus memiliki minimal 7 digit dan maksimal 10 digit',
        ]);
        Siswa::create([
        'nama'=>$request->nama,
        'nisn'=>$request->nisn,
        'jenis_kelamin'=>$request->jenis_kelamin,
        'agama'=>$request->agama,
        ]);
        return redirect()->route('siswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        return view('siswa.edit' , compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSiswaRequest  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nisn' => 'required|unique:siswas,nisn,' . $siswa->id . '|numeric|digits_between:7,10',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
        ], [
            'nisn.unique' => 'nisn telah digunakan',
            'nisn.required' => 'harap isi nisn',
            'nama.required' => 'harap isi nama',
            'nisn.numeric'=>'nisn hanya boleh angka',
            'agama.required'=>'harap pilih agama',
            'nisn.digits_between' => 'NISN harus memiliki minimal 7 digit dan maksimal 10 digit',
        ]);
        
    
        // Check if a new image was uploaded
        //if ($request->hasFile('image')) {
            // Upload new image
            //$image = $request->file('image');
           // $image->storeAs('public/guru', $image->hashName());
    
            // Delete old image
           // Storage::delete('public/guru/'.$guru->image);
    
            // Update model with new image
            //$guru->image = $image->hashName();
        // }
    
        // Update model with other attributes
        $siswa->nama = $request->nama;
        $siswa->nisn = $request->nisn;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->agama = $request->agama;
    
        // Save changes to model
        $siswa->save();
    
        return redirect()->route('siswa.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswas = Siswa::findOrFail($id);
        $siswas->delete();
    return redirect()->route('siswa.index')->with(['success' => 'Data berhasil dihapus.']);

    }
}
