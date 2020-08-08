<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PertanyaanController extends Controller
{
    Public Function create() {
        return view('pertanyaan.create');
    }

    Public Function store(Request $req) {
        
        $req->validate([
            'judul' => 'required|unique:pertanyaan',
            'isi' => 'required',
        ]);
    
        $query = DB::table('pertanyaan')->insert([
                'judul' => $req['judul'], 
                 'isi' => $req['isi'],
                 'profil_id' => 1
                 ]);
        
        return redirect('/pertanyaan')->with('sukses','Pertanyaan berhasil dibuat !');
    }
    
    public function index () {
        $list = DB::table('pertanyaan')->get();        
        return view('pertanyaan.index',compact('list'));
    }

    public function show ($id) {
        $list = DB::table('pertanyaan')->where('id',$id)->first();        
        return view('pertanyaan.show',compact('list'));
    }

    public function edit ($id) {
        $list = DB::table('pertanyaan')->where('id',$id)->first();        
        return view('pertanyaan.edit',compact('list'));
    }

    public function update ($id,Request $req) {

        $req->validate([
            'judul' => 'required|unique:pertanyaan',
            'isi' => 'required',
        ]);

        $list = DB::table('pertanyaan')
                    ->where('id',$id)
                    ->update([
                        'judul' => $req['judul'],
                        'isi' => $req['isi']
                    ]);        

        return redirect('/pertanyaan')->with('sukses','Pertanyaan berhasil diupdate !');
    }

    public function destroy($id) {

        $list = DB::table('pertanyaan')->where('id',$id)->delete();
        return redirect('/pertanyaan')->with('sukses','Pertanyaan berhasil dihapus !');
    }
}
