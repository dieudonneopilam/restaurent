<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class graphController extends Controller
{
    public function grapheRapport(){

        $chart_options = [
            'chart_title' => 'vente journaliere',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Rapport',
            'group_by_field' => 'date_rapport',
            'group_by_period' => 'day',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'vente_jour',
            'where_conditions' => [
                ['deleted', '=', 0],
            ],
            'chart_type' => 'line',
        ];

        $chart1 = new LaravelChart($chart_options);
        return view('pages.gra-rapport', compact('chart1'));
    }
    public function grapheventedette(){

        $chart_options = [
            'chart_title' => 'vente journaliere via dette',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Rapport',
            'group_by_field' => 'date_rapport',
            'group_by_period' => 'day',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'dettee_jour',
            'chart_type' => 'line',
        ];
        $chart1 = new LaravelChart($chart_options);
        return view('pages.graph-vente-dette', compact('chart1'));
    }
    public function grapheachat(){

        $chart_options = [
            'chart_title' => 'vente journaliere via dette',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Rapport',
            'group_by_field' => 'date_rapport',
            'group_by_period' => 'day',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'achat_jour',
            'chart_type' => 'line',
        ];

        $chart1 = new LaravelChart($chart_options);
        return view('pages.graph-achat', compact('chart1'));
    }
    public function graphedepense(){

        $chart_options = [
            'chart_title' => 'vente journaliere via dette',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Rapport',
            'group_by_field' => 'date_rapport',
            'group_by_period' => 'day',
            'aggregate_function' => 'sum',
            'where_null' => ['deleted'],
            'aggregate_field' => 'depense_jour',
            'chart_type' => 'line',
        ];

        $chart1 = new LaravelChart($chart_options);
        return view('pages.graph-depense', compact('chart1'));
    }
}
