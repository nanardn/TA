<?php

namespace App\Http\Controllers;

use App\CrowdReport;

class ApiController extends Controller
{
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
    }
}
