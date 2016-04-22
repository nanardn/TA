<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;

use App\Http\Requests;

=======
>>>>>>> e05196639762a6bfdbbd5cd8988fd3d9fdf8b51a
use App\CrowdReport;

class ApiController extends Controller
{
<<<<<<< HEAD
    //
    public function crowdReport(){
    	$campaign = request ('campaign');
    	$year = request ('year');

    	$result = CrowdReport::where('id_pendanaan', $campaign)->where('tahun', $year)->orderBy('bulan', 'ASC')->get();
    	$data = [
    		[
    			'data' => [],
    			'label' => 'Total Pengeluaran'
    		],
    		[
    			'data' => [],
    			'label' => 'Total Pemasukan'
    		],
    		[
    			'data' => [],
    			'label' => 'Saldo Proyek'
    		]

    	];
    	foreach ($result as $row) {
    		# code...
    		$data[0]['data'][]  = [strtotime($row->tahun . '-' . $row->bulan . '-15') * 1000, $row->saldo_usaha];
           $data[1]['data'][]  = [strtotime($row->tahun . '-' . $row->bulan . '-15') * 1000, $row->total_pengeluaran];
           $data[2]['data'][]  = [strtotime($row->tahun . '-' . $row->bulan . '-15') * 1000, $row->total_pemasukan];
    	}
    	return collect($data)->toJson();
=======
    public function crowdReport()
    {
        $campaign = request('campaign');
        $year = request('year');

        $result = CrowdReport::where('id_pendanaan', $campaign)->where('tahun', $year)->orderBy('bulan', 'ASC')->get();

        $data = [
            [
                'data' => [],
                'label' => 'Total Pengeluaran'
            ],
            [
                'data' => [],
                'label' => 'Total Pemasukan'
            ],
            [
                'data' => [],
                'label' => 'Saldo Usaha'
            ]
        ];

        foreach ($result as $row) {
            $data[0]['data'][] = [strtotime($row->tahun . '-' . $row->bulan . '-15') * 1000, $row->total_pengeluaran];
            $data[1]['data'][] = [strtotime($row->tahun . '-' . $row->bulan . '-15') * 1000, $row->total_pemasukan];
            $data[2]['data'][] = [strtotime($row->tahun . '-' . $row->bulan . '-15') * 1000, $row->saldo_usaha];
        }

        return collect($data)->toJson();
>>>>>>> e05196639762a6bfdbbd5cd8988fd3d9fdf8b51a
    }
}
