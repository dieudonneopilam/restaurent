<?php

namespace App\Http\Livewire;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Livewire\Component;

class MaSituation extends Component
{
    public function render()
    {
        $settings1 = [
            'chart_title' => 'vente par jour',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Rapport',
            'group_by_field' => 'date_rapport',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'vente_jour',
            'group_by_period' => 'day',
            'chart_type' => 'line',
            'chart_color' => '255, 99, 132, 1',
            'continuous_time'       => true,
        ];
        $settings2 = [
            'chart_title' => 'depense par jour',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Rapport',
            'group_by_field' => 'date_rapport',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'depense_jour',
            'group_by_period' => 'day',
            'chart_type' => 'line',
            'chart_color' => '0, 0, 255, 1',
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
                ];
                        $charts = new LaravelChart($chart_options);
        return view('livewire.ma-situation',['charts' => $chart1]);
    }
}
