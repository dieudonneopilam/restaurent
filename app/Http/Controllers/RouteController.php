<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class RouteController extends Controller
{
    public function index(){
        return view('pages.home');
    }

    public function vente(){
        return view('pages.ventes');
    }

    public function storePoduit(){
        return view('pages.addProduit');
    }
    public function stockage(){
        return view('pages.stock');
    }
    public function rapport(){
        return view('pages.rapport');
    }
    public function caisse(){
        return view('pages.caisse');
    }
    public function situation(){
        $chart_options = [
            'chart_title' => 'Transactions by dates',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\vente',
            'group_by_field' => 'date_vente',
            'group_by_period' => 'hour',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'prix_vente',
            'chart_type' => 'line',
        ];


        return view('pages.ma-stituation');
    }
}
