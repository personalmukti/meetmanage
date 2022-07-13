<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Meet, Skdp};

class MeetController extends Controller
{
    public function index(){
        $meets = Meet::with('skdp')->latest()->get();
        return view('admin.meet.index', compact('meets'));
    }
    public function create(){
        $skpds = Skdp::orderBy('nama')->get();
        return view('admin.meet.create', compact('skpds'));
    }
    public function store(Request $request){
        $request->validate([
            'kegiatan' => 'required',
            'skpd_id' => 'required',
            'link' => 'required',
            'waktu' => 'required',
            'keterangan' => 'required',
        ]);

        $file = $request->gambar;

        $meet = new Meet;
        $meet->kegiatan = $request->kegiatan;
        $meet->link = $request->link;
        $meet->skdp_id = $request->skpd_id;
        $meet->waktu = $request->waktu;
        $meet->keterangan = $request->keterangan;
        $meet->gambar = $request->gambar->getClientOriginalName();
        $save = $meet->save();

        $dir = 'img';
        $file->move($dir, $file->getClientOriginalName());
        if($save){
            return redirect()->route('meet')->with('success', 'Berhasil menambahkan data');
        }
    }
    public function edit($id){
        $meet = Meet::findOrFail($id);
        $skpds = Skdp::orderBy('nama')->get();
        return view('admin.meet.edit', compact('meet', 'skpds'));
    }
    public function update(Request $request){
        $request->validate([
            'kegiatan' => 'required',
            'skpd_id' => 'required',
            'link' => 'required',
            'waktu' => 'required',
            'keterangan' => 'required',
        ]);

        if($request->hasFile('gambar')){
            $meet = Meet::findOrFail($request->id);
            $meet->kegiatan = $request->kegiatan;
            $meet->link = $request->link;
            $meet->skdp_id = $request->skpd_id;
            $meet->waktu = $request->waktu;
            $meet->keterangan = $request->keterangan;
            $meet->gambar = $request->gambar->getClientOriginalName();
            $save = $meet->save();

            $file = $request->gambar;

            $dir = 'img';
            $file->move($dir, $file->getClientOriginalName());
            if($save){
                return redirect()->route('meet')->with('success', 'Berhasil mengubah data');
            }
        }else{
            $meet = Meet::findOrFail($request->id);
            $meet->kegiatan = $request->kegiatan;
            $meet->link = $request->link;
            $meet->skdp_id = $request->skpd_id;
            $meet->waktu = $request->waktu;
            $meet->keterangan = $request->keterangan;
            $save = $meet->save();

            if($save){
                return redirect()->route('meet')->with('success', 'Berhasil mengubah data');
            }
        }
    }
    public function destroy($id){
        $meet = Meet::findOrFail($id);
        $meet->delete();
        return redirect()->route('meet')->with('success', 'Berhasil menghapus data');
    }
}
