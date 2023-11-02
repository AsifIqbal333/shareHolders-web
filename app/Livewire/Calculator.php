<?php

namespace App\Livewire;

use App\Models\Property;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Livewire\Component;

class Calculator extends Component
{
    public Property $property;
    public $investment = 50000;
    public $rental_income = 0;
    public $value_appreciation = 0;
    public $growth = 30;
    public $net_yield;
    public $years = [];
    public $categories = [];
    public $series = [];
    public $colors = [];
    public $investment_numbers = [];
    public $rental_numbers = [];
    public $value_numbers = [];

    public function mount()
    {
        $this->net_yield = $this->property->net_yield;
        for ($i = 1; $i < 6; $i++) {
            $this->years[] = now()->addYear($i)->format('Y');
        }
        for ($i = 0; $i < 15; $i++) {
            $this->categories[] = $i;
        }

        $this->colors = ['#121C30', '#FFD147', '#41CE8E'];
        $this->investment_numbers = [0, 3, 6, 9, 12];
        $this->rental_numbers = [1, 4, 7, 10, 13];
        $this->value_numbers = [2, 5, 8, 11, 14];
        $this->calculations();
    }

    public function render()
    {
        $columnChartModel = collect($this->categories)->reduce(function ($columnChartModel, $data) {
            $yearIndex = floor($data / 3);
            $year = $this->years[$yearIndex];
            if (in_array($data, $this->investment_numbers)) {
                $color = '#121C30';
                $value = (int)$this->investment;
            } elseif (in_array($data, $this->rental_numbers)) {
                $color = '#FFD147';
                $value =  $this->rental_income * ($yearIndex + 1);
            } else {
                $color = '#41CE8E';
                $value =  $this->value_appreciation * ($yearIndex + 1);
            }

            return $columnChartModel->addColumn($year, $value, $color);
        }, (new ColumnChartModel()));
        // $columnChartModel =
        //     (new ColumnChartModel())
        //     ->addColumn('2024', 100, '#121C30')
        //     ->addColumn('2026', 178, '#FFD147')
        //     ->addColumn('2027', 188, '#41CE8E');


        return view('livewire.calculator', [
            'columnChartModel' => $columnChartModel,
        ]);
    }

    public function updatedInvestment()
    {
        $this->calculations();
    }

    public function updatedGrowth()
    {
        $this->calculations();
    }

    public function updatedNetYield()
    {

        $this->calculations();
    }

    private function calculations($event = true)
    {
        $this->rental_income = (($this->net_yield / 100) * $this->investment) * 5;
        $this->value_appreciation = ($this->growth / 100) * $this->investment;
        // $categories = ['investment', 'rental_income', 'net_yield'];
        // $colors = ['#121C30', '#FFD147', '#41CE8E'];

        // $this->series = [];
        // foreach ($categories as $idx => $category) {
        //     $values = [];
        //     $color = $colors[$idx];
        //     foreach ($this->years as $index => $year) {
        //         if ($category === 'investment') {
        //             $values[] = $this->investment;
        //         } elseif ($category === 'rental_income') {
        //             $values[] = $this->rental_income * ($index + 1);
        //         } else {
        //             $values[] = $this->value_appreciation * ($index + 1);
        //         }
        //     }

        //     $this->series[] = [
        //         'name' => '',
        //         'data' => $values,
        //         'color' => $color
        //     ];
        // }

        // $this->dispatch('chart-change', series: $this->series);
    }
}
