<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class bankController extends Controller
{
    //
    	public function showpage()
	    {
	        return view('bank.dashboard-daftar-pendanaan');
	    }
      public function uploadpendanaan(Request $request){
        if(Input::hasFile('file')){
                $postpendanaan = $request->all();
                $file       = Input::file('file');
                $fileproyek = Input::file('fileproyek');
                $file->move('images/avatar/', $file->getClientOriginalName());
                $fileproyek->move('images/proyek/', $fileproyek->getClientOriginalName());
                $namafilepj = $file->getClientOriginalName();
                $namafileproyek = $fileproyek->getClientOriginalName();
                $dateimputpendanaan = Carbon::now()->format('Y-m-d H:i:s');
                $postpendanaan = array(
                        'nama_pj'        => $postpendanaan['nama_pj'], 
                        'nama_proyek'    => $postpendanaan['nama_proyek'], 
                        'kategori'       => $postpendanaan['kategori'], 
                        'total_dana'     => $postpendanaan['total_dana'], 
                        'sementara_dana' => $postpendanaan['sementara_dana'], 
                        'deskripsi'      => $postpendanaan['deskripsi'], 
                        'foto_proyek'    => $namafileproyek,
                        'foto_pj'        => $namafilepj, 
                        'status'         => $postpendanaan['status'],  
                        'tgl_pendanaan'  => $dateimputpendanaan, 
                    );
            $i = DB::table('pendanaan')->insert($postpendanaan);
    		if ($i > 0) {
    		  	
    		  	return redirect('/home');
              
    		} 
        }

}
}
