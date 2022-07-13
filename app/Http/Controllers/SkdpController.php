<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Skdp};

class SkdpController extends Controller
{
    public function index(){
        $skdps = Skdp::latest()->get();
        return view('admin.skdp.index', compact('skdps'));
    }
    public function create(){
        return view('admin.skdp.create');
    }
    public function store(Request $req){
        $req->validate([
            'nama' => ['required'],
        ]);
        $skdp = new Skdp;
        $skdp->nama = $req->nama;
        $save = $skdp->save();
        if($save){
            return redirect()->route('skdp')->with('success', 'Berhasil menambahkan data');
        }
    }
    public function edit($id){
        $skdp = Skdp::find($id);
        return view('admin.skdp.edit', compact('skdp'));
    }
    public function update(Request $req){
        $req->validate([
            'nama' => ['required'],
        ]);
        $skdp = Skdp::find($req->id);
        $skdp->nama = $req->nama;
        $save = $skdp->save();
        if($save){
            return redirect()->route('skdp')->with('success', 'Berhasil mengubah data');
        }
    }
    public function destroy($id){
        $skdp = Skdp::find($id);
        $delete = $skdp->delete();
        if($delete){
            return redirect()->route('skdp')->with('success', 'Berhasil menghapus data');
        }
    }
}
