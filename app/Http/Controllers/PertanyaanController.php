<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Pertanyaan;

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
    
        //$query = DB::table('pertanyaan')->insert([
        //        'judul' => $req['judul'], 
        //         'isi' => $req['isi'],
        //         'profil_id' => 1
        //         ]);
        
        //$list = new Pertanyaan;
        //$list->judul = $req['judul'];
        //$list->isi = $req['isi'];
        //$list->save(); 

        $list = Pertanyaan::create([
            'judul' => $req['judul'],
            'isi' => $req['isi']
        ]);

        return redirect('/pertanyaan')->with('sukses','Pertanyaan berhasil dibuat !');
    }
    
    public function index () {
        //$list = DB::table('pertanyaan')->get();        
        $list = Pertanyaan::all();
        return view('pertanyaan.index',compact('list'));
    }

    public function show ($id) {
        //$list = DB::table('pertanyaan')->where('id',$id)->first();        

        //$list = Pertanyaan::find($id);
        $list = Pertanyaan::where('id', $id)->first();

        return view('pertanyaan.show',compact('list'));
    }

    public function edit ($id) {
        //$list = DB::table('pertanyaan')->where('id',$id)->first();    
        
        $list = Pertanyaan::find($id);

        return view('pertanyaan.edit',compact('list'));
    }

    public function update ($id,Request $req) {

        $req->validate([
            'judul' => 'required|unique:pertanyaan',
            'isi' => 'required',
        ]);

        //$list = DB::table('pertanyaan')
        //            ->where('id',$id)
        //            ->update([
        //                'judul' => $req['judul'],
        //                'isi' => $req['isi']
        //            ]);        

        //$list = Pertanyaan::find($id);
        //$list->judul = $req['judul'];
        //$list->isi = $req['isi'];
        //$list->save();

        $list = Pertanyaan::where('id',$id)->update([
                            'judul' => $req['judul'],
                            'isi' => $req['isi']
        ]);

        return redirect('/pertanyaan')->with('sukses','Pertanyaan berhasil diupdate !');
    }

    public function destroy($id) {

        //$list = DB::table('pertanyaan')->where('id',$id)->delete();

        //$list = Pertanyaan::find($id);
        //$list->delete();

        $list = Pertanyaan::where('id',$id)->delete();

        return redirect('/pertanyaan')->with('sukses','Pertanyaan berhasil dihapus !');
    }
}
