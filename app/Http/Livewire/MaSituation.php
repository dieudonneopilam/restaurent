<?php

namespace App\Http\Livewire;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Livewire\Component;

class MaSituation extends Component
{
    public function render()
    {
        $settings1 = [
            'chart_title' => 'Achat par jour FC',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Achat',
            'group_by_field' => 'date_achat',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'prix_achat',
            'group_by_period' => 'day',
            'chart_type' => 'line',
            'chart_color' => '255, 99, 132, 0.2',
            'continuous_time'       => true,
        ];
        $settings2 = [
            'chart_title' => 'vente produit par jour',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Vente',
            'group_by_field' => 'date_vente',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'prix_vente',
            'group_by_period' => 'day',
            'chart_type' => 'line',
            'continuous_time'       => true,
        ];

        $chart1 = new LaravelChart($settings1, $settings2);

        $chart_options = [
            'chart_title' => 'vente produit par jour',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Vente',
            'group_by_field' => 'date_vente',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'qte_vente',
            'group_by_period' => 'day',
            'chart_type' => 'line',
            'colors' => ['#FF0000']
                ];
                        $charts = new LaravelChart($chart_options);
        return view('livewire.ma-situation',['charts' => $chart1]);
    }
}
