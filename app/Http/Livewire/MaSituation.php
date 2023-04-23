<?php

namespace App\Http\Livewire;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Livewire\Component;

class MaSituation extends Component
{
    public function render()
    {
        $chart_options = [
            'chart_title' => 'vente produit par jour',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Vente',
            'group_by_field' => 'date_vente',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'qte_vente',
            'group_by_period' => 'day',
            'chart_type' => 'line',
                ];
                $chart_option = [
                    'chart_title' => 'vente produit par jour',
                    'report_type' => 'group_by_date',
                    'model' => 'App\Models\Vente',
                    'group_by_field' => 'date_vente',
                    'aggregate_function' => 'sum',
                    'aggregate_field' => 'qte_vente',
                    'group_by_period' => 'day',
                    'chart_type' => 'line',
                        ];

                        $chart = new LaravelChart($chart_options);
                        $charts = new LaravelChart($chart_option);
        return view('livewire.ma-situation',['chart' => $chart, 'produit' => $charts]);
    }
}
