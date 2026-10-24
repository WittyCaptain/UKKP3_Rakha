<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $areas = pengaduan::all();

        return view('admin.pengaduan.view', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = kategori::all();
        return view('customer/index', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    

public function store(Request $request)
{
    $validated = $request->validate([
        'no_meja' => 'required',
        'kategori' => 'required',
        'deskripsi' => 'required|string',
        'foto' => 'required|image|max:2048',
    ]);

    $user = Auth::user();

    $foto = $request->file('foto')->store('foto', 'public');

    Pengaduan::create([
        'email' => $user->email,
        'no_meja' => $validated['no_meja'],
        'name' => $user->name,
        'no_tp' => $user->no_tp,
        'kategori' => $validated['kategori'],
        'deskripsi' => $validated['deskripsi'],
        'foto' => $foto,
    ]);

    return redirect()
        ->route('pengaduan.create')
        ->with('success', 'Pengaduan berhasil dikirim!');
}

    /**
     * Display the specified resource.
     */
    public function show(pengaduan $pengaduan)
    {
        return view('admin/pengaduan/read', compact('pengaduan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pengaduan $pengaduan)
    {
        $kategoris = DB::table('kategoris')->get();
        return view('admin/pengaduan/update', compact('pengaduan', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pengaduan $pengaduan)
    {
        $request->validate([
            'email' => 'required|email',
            'no_meja' => 'required',
            'name'=> 'required',
            'no_tp'=> 'required',
            'kategori'=> 'required',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|max:2048',
        ]);
         
        if($request->hasFile('foto')) {
            if($pengaduan->foto && Storage::disk('public')->exists($pengaduan->foto)) {
                Storage::disk('public')->delete($pengaduan->foto);
            }

            $namaFile = $request->file('foto')->store('foto', 'public');
        }else{
            $namaFile = $pengaduan->foto;
        }
        $pengaduan->update([
            'email' => $request->email,
            'no_meja' => $request->no_meja,
            'name'=> $request->name,
            'no_tp'=> $request->no_tp,
            'kategori'=> $request->kategori,
            'deskripsi' => $request->deskripsi,
            'foto' => $namaFile
        ]);

        return redirect()->route('pengaduan.saya');
    }

    public function saya(){
        $areas = Pengaduan::where('no_tp', Auth::user()->no_tp)
        ->latest()
        ->get();

    return view('customer/view', compact('areas'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pengaduan $pengaduan)
    {
        $pengaduan->delete();
        return redirect()->route('pengaduan.index');
    }
}
