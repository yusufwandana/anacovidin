<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Charts\CovidChart;
use App\Models\Visitor;

class DataController extends Controller
{
    public function index()
    {

        // Total keseluruhan kasus Covid-19 di Indonesia
        $totalIndonesia = Http::get('https://api.kawalcorona.com/indonesia');
        $data = $totalIndonesia->json();

        // Data per Provinsi
        // Start
        $chartData = collect(Http::get('https://api.kawalcorona.com/indonesia/provinsi')->json());
        $labels = $chartData->flatten(1)->pluck('Provinsi');
        $positifCase = $chartData->flatten(1)->pluck('Kasus_Posi');

        $chart = new CovidChart;
        $chart->labels($labels);
        $colors = $labels->map(function($item){
            return $rand_color = '#' . substr(md5(mt_rand()), 0, 6);
        });

        $detailData = $chartData;

        $chart->dataset('Kasus Positif Tertinggi', 'horizontalBar', $positifCase)->backgroundColor($colors);
        // End

        // Update Jumlah Visitor
        $cekVisitor = Visitor::all()->count();
        if ($cekVisitor == 0) {
            Visitor::create(['total_visitor' => 1]);
        }else{
            $visitor = Visitor::whereId(1)->first();
            $visitor->update(['total_visitor' => $visitor->total_visitor+1]);
        }
        $totalVisitor = Visitor::whereId(1)->first()->total_visitor;

        return view('welcome', compact('data', 'chart', 'detailData', 'totalVisitor'));
    }
}
