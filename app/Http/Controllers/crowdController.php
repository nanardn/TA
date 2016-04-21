<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Session;
use DB;
class crowdController extends Controller
{
    //
     public function index()
    {
        return view('dashboard.dashboard-pendanaan');
    }

    public function showReport()
    {
        return view('dashboard.dashboard-reportpendanaan');
    }
    public function listReportCrowd(Request $request){
    	$result = DB::select('SELECT * FROM laporan_crowd, pendanaan 
            WHERE laporan_crowd.id_pendanaan=pendanaan.id_pendanaan');
    	return view('dashboard.dashboard-reportpendanaan')->with('reportCrowd',$result);
    }
    public function detailReport()
    {
        $detailDana  = DB::table('laporan_penggunaan_crowd')
            ->join('laporan_crowd','laporan_penggunaan_crowd.id_laporan_c','=','laporan_crowd.id_laporan_c')
            ->orderBy('id_laporan_ct', 'desc')->paginate(30);
        
        return view('dashboard.dashboard-detailreportpendanaan')->with('detailDana',$detailDana);
    }
   public function getAllPendanaanAdmin(){
        $pendanaanadmin  = DB::table('pendanaan')->orderBy('id_pendanaan', 'desc')->paginate(5);
        return view('dashboard.dashboard-listdonasi')->withPendanaanadmin($pendanaanadmin);
    }
    
    public function uploadpendanaan(Request $request){
        /*if(Input::hasFile('file')){
                $postpendanaan = $request->all();
               // $file       = Input::file('file');
               // $fileproyek = Input::file('fileproyek');
               // $file->move('images/avatar/', $file->getClientOriginalName());
                //$fileproyek->move('images/proyek/', $fileproyek->getClientOriginalName());
                $namafilepj = $file->getClientOriginalName();
                $namafileproyek = $fileproyek->getClientOriginalName();
                $dateimputpendanaan = Carbon::now()->format('Y-m-d H:i:s');
                $postpendanaan = array(
                        'akun'        => $postpendanaan['transaksi'], 
                        ''    => $postpendanaan['nama_proyek'], 
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
                
                return redirect('dashboard.dashboard-reportpendanaan');
              
            } 
            */
        

}
}
