<?php

namespace App\Http\Controllers;

use App\Models\Eskul;
use App\Http\Requests\StoreEskulRequest;
use App\Http\Requests\UpdateEskulRequest;
use Illuminate\Http\Request;

class EskulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $eskuls = Eskul::where('nama', 'LIKE', '%'. $request->search.'%')
           ->orWhere('kelas', 'LIKE', '%'. $request->search.'%')
           ->orWhere('no_hp', 'LIKE', '%'. $request->search.'%')
           ->orWhere('ekstrakulikuler', 'LIKE', '%'. $request->search.'%')
           ->paginate(3);
        }else {
            $eskuls = Eskul::paginate(3);
    }
        return view('eskul.index' , compact('eskuls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eskul.create');
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
            'kelas'=>'required',
            'no_hp'=>'required|unique:eskuls,no_hp|numeric|digits_between:12,13',
            'ekstrakulikuler'=>'required',
        ],[
            'nama.required'=>'harap isi nama siswa',
            'kelas.required'=>'harap isi kelas',
            'ekstrakulikuler.required'=>'harap pilih ekstrakulikuler',
'no_hp.unique'=>'no hp duplicate',
'no_hp.required'=>'harap isi no hp',
'no_hp.numeric'=>'no hp hanya boleh angka',
'no_hp.digits_between'=>'no hp minimal 12 dan maksimal 13 digit',
        ]);
            Eskul::create([
            'nama'=>$request->nama,
            'kelas'=>$request->kelas,
            'no_hp'=>$request->no_hp,
            'ekstrakulikuler'=>$request->ekstrakulikuler,
            ]);
            return redirect()->route('eskul.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Eskul  $eskul
     * @return \Illuminate\Http\Response
     */
    public function show(Eskul $eskul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Eskul  $eskul
     * @return \Illuminate\Http\Response
     */
    public function edit(Eskul $eskul)
    {
        return view('eskul.edit', compact('eskul'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEskulRequest  $request
     * @param  \App\Models\Eskul  $eskul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , Eskul $eskul)
    {
        $this->validate($request ,[
            'nama'=>'required',
            'kelas'=>'required',
            'no_hp' => 'required|unique:eskuls,no_hp,' . $eskul->id . '|numeric|digits_between:12,13',
            'ekstrakulikuler'=>'required', 
        ],[
            'nama.required'=>'harap isi nama siswa',
            'kelas.required'=>'harap isi kelas',
            'ekstrakulikuler.required'=>'harap pilih eskul',
'no_hp.unique'=>'no hp duplicate',
'no_hp.required'=>'harap isi no hp',
'no_hp.numeric' => 'no hp hanya bisa angka',
'no_hp.digits_between'=>'no hp minimal 12 dan maksimal 13 digit',
        
        ]);
        $eskul->update([
            'nama'=>$request->nama,
            'kelas'=> $request->kelas,
            'no_hp'=> $request->no_hp,
           'ekstrakulikuler'=>$request->ekstrakulikuler,
        ]);
         
        return redirect()->route('eskul.index');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eskul  $eskul
     * @return \Illuminate\Http\Response
     */
    public function destroy(Eskul $eskul)
    {

    $eskul->delete();
    return redirect()->route('eskul.index');

    }
}
