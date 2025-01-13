<?php

namespace App\Http\Controllers;

use App\Charts\CashFlow;
use App\Models\Entry;
use App\Models\Outflow;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $cashFlowChart = new CashFlow;

            $entryData = Entry::groupBy('entry_date')
                ->orderBy('entry_date', 'asc')
                ->select('entry_date')
                ->selectRaw('sum(amount) as amount')
                ->get();

            $entriesDate = $this->convertDates($entryData->pluck('entry_date'));

            $outflowData = Outflow::groupBy('date')
                ->orderBy('date', 'asc')
                ->select('date')
                ->selectRaw('sum(amount) as amount')
                ->get();

            $outflowDates = $this->convertDates($outflowData->pluck('date'));

            $dates = array_unique(array_merge($entriesDate, $outflowDates));



            $cashFlowChart->labels($dates);
            $cashFlowChart->dataset('Entradas', 'line', $entryData->pluck('amount'))->options([
                'color' => '#16a34a'
            ]);
            $cashFlowChart->dataset('Saídas', 'line', $outflowData->pluck('amount'))->options([
                'color' => '#ef4444'
            ]);

            $cashFlowChart->options([
                'tooltip' => ['show' => true]
            ]);

            return view('dashboard')->with('cashFlowChart', $cashFlowChart);
        } catch (\Exception $e) {
            Log::error("DashboardController@index: " . $e->getMessage());
        }
    }

    private function convertDates($dates)
    {
        try {
            Log::debug("Dates: " . $dates);

            $formattedDates = [];
            foreach ($dates as $date) {
                $formattedDates[] = date('d/m/Y', strtotime($date));
            }

            Log::debug("Formatted Dates: " . json_encode($formattedDates));
            return $formattedDates;
        } catch (\Exception $e) {
            Log::error("DashboardController@convertDates: " . $e->getMessage());
        }
    }

    // private function convertAmounts($amounts)
    // {
    //     try {
    //         Log::debug("Amounts: " . $amounts);
    //         $formattedAmounts = [];
    //         foreach ($amounts as $amount) {
    //             $formattedAmounts[] = number_format($amount, 2, ',', '.');
    //         }
    //         Log::debug("Formatted Amounts: " . json_encode($formattedAmounts));
    //         return $formattedAmounts;
    //     } catch (\Exception $e) {
    //         Log::error("DashboardController@convertAmounts: " . $e->getMessage());
    //     }
    // }
}
