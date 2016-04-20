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
    	$result = DB::table('laporan_crowd')->get();
    	return view('dashboard.dashboard-reportpendanaan')->with('reportCrowd',$result);
    }
    public function showDetailReport()
    {
        return view('dashboard.dashboard-detailreportpendanaan');
    }
   public function getAllPendanaanAdmin(){
        $pendanaanadmin  = DB::table('pendanaan')->orderBy('id_pendanaan', 'desc')->paginate(5);
        return view('dashboard.dashboard-listdonasi')->withPendanaanadmin($pendanaanadmin);
    }
}
