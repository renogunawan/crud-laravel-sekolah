<?php

namespace App\Http\Controllers;


use App\Models\Perpu;
use Illuminate\Http\Request;
use App\Http\Requests\StorePerpuRequest;
use App\Http\Requests\UpdatePerpuRequest;

class PerpuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $perpu = Perpu::where('nama','LIKE','%'. $request->search.'%')
            ->orWhere('nama_peminjam', 'LIKE','%'.$request->search.'%')
            ->orWhere('buku', 'LIKE','%'.$request->search.'%')
            ->orWhere('tgl_pinjam', 'LIKE','%'.$request->search.'%')
            ->orWhere('tgl_kembali', 'LIKE','%'.$request->search.'%')
            ->paginate(3);
        }else {
            $perpu = Perpu::latest()->paginate(3);
        }
    
        return view('perpus.index' , compact('perpu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perpus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePerpuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'nama_peminjam' => 'required',
            'buku' => 'required',
            'tgl_pinjam' => 'required|date_format:Y-m-d',
            'tgl_kembali' => 'required|date_format:Y-m-d|after_or_equal:tgl_pinjam',
        ],[
            'nama.required'=>'harap isi nama penjaga',
            'nama_peminjam.required'=>'harap isi nama peminjam',
            'buku.required'=>'harap isi buku yang di pinjam',
            'tgl_pinjam.date_format' => 'Format tanggal tidak valid !',
            'tgl_pinjam.required' =>'Tanggal tidak boleh kosong',
            'tgl_kembali.date_format' => 'Format tanggal tidak valid !',
            'tgl_kembali.required' =>'Tanggal tidak boleh kosong',
            'tgl_kembali.after_or_equal' => 'Tanggal kembali harus setelah atau sama dengan tanggal pinjam.',
        ]);
    
        $tgl_pinjam_formatted = date('d-m-Y', strtotime($request->tgl_pinjam));
        $tgl_kembali_formatted = date('d-m-Y', strtotime($request->tgl_kembali));
    
        Perpu::create([
            'nama' => $request->nama,
            'nama_peminjam' => $request->nama_peminjam,
            'buku' => $request->buku,
            'tgl_pinjam' => $tgl_pinjam_formatted,
            'tgl_kembali' => $tgl_kembali_formatted,
        ]);
        return redirect()->route('perpus.index');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perpu  $perpu
     * @return \Illuminate\Http\Response
     */
    public function show(Perpu $perpu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perpu  $perpu
     * @return \Illuminate\Http\Response
     */
    public function edit(Perpu $perpu)
    {
        return view('perpus.edit' , compact('perpu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePerpuRequest  $request
     * @param  \App\Models\Perpu  $perpu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perpu $perpu)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nama_peminjam' => 'required',
            'buku' => 'required',
            'tgl_pinjam' => 'required|date_format:Y-m-d',
            'tgl_kembali' => 'required|date_format:Y-m-d|after_or_equal:tgl_pinjam',
        ],[
            'nama.required'=>'harap isi nama penjaga',
            'nama_peminjam.required'=>'harap isi nama peminjam',
            'buku.required'=>'harap isi buku yang di pinjam ',
'tgl_pinjam.date_format'=>'format tanggal tidak valid',
'tgl_kembali.date_format'=>'format tanggal tidak valid',
'tgl_kembali.after_or_equal' => 'Tanggal kembali harus setelah atau sama dengan tanggal pinjam.',
        ],);
        $tgl_pinjam_formatted = date('d-m-Y', strtotime($request->tgl_pinjam));
        $tgl_kembali_formatted = date('d-m-Y', strtotime($request->tgl_kembali));
       $perpu->update([
        'nama'=>$request->nama,
        'nama_peminjam'=>$request->nama_peminjam,
        'buku'=>$request->buku,
        'tgl_pinjam'=>$tgl_pinjam_formatted,
        'tgl_kembali'=>$tgl_kembali_formatted,
       ]);

        return redirect()->route('perpus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perpu  $perpu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perpu $perpu)
    {
       $perpu->delete();
       return redirect()->route('perpus.index');
    }
}
