<?php

namespace App\Http\Controllers;

use App\Models\AccountEntry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return Inertia::render('Dashboard', [
            'entries' => AccountEntry::paginate(100),
            'today_entries' => AccountEntry::whereDate('date', now())->paginate(50),
            'total_entries_this_month' => AccountEntry::whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->count(),
            'total_entries_today' => AccountEntry::whereDate('date', now())->count(),
            'total_entries_this_year' => AccountEntry::whereYear('date', Carbon::now()->year)->count(),
            // 'total_entries_last_7_days' => AccountEntry::whereBetween('created_at', [now()->subDays(7), now()])->count(),
            // 'total_entries_last_30_days' => AccountEntry::whereBetween('created_at', [now()->subDays(30), now()])->count(),

            'total_entries' => AccountEntry::all()->count(),
            'total_amount_today' => number_format(AccountEntry::whereDate('date', now())->sum('amount'), 2),
            'total_delivery_charge' => number_format(AccountEntry::whereDate('date', now())->sum('delivery_charge'), 2),
            'total_merchant_balance' => number_format(AccountEntry::whereDate('date', now())->sum('merchant_balance'), 2),
            'total_cash' => number_format(
                AccountEntry::whereDate('date', now())
                    ->whereIn('payment_method', ['Cash', 'cash', 'CASH'])
                    ->sum('amount'),
                2
            ),
            'total_transfer' => number_format(
                AccountEntry::whereDate('date', now())
                    ->whereNotIn('payment_method', ['Cash', 'cash', 'CASH'])
                    ->sum('amount'),
                2
            ),

            // 'total_merchant_balance_percentage' => AccountEntry::sum('merchant_balance') / AccountEntry::sum('amount') * 100 ?? '0',
            // 'total_rider_balance' => AccountEntry::sum('amount') - AccountEntry::sum('delivery_charge') - AccountEntry::sum('merchant_balance'),
            // 'total_rider_balance_percentage' => (AccountEntry::sum('amount') - AccountEntry::sum('delivery_charge') - AccountEntry::sum('merchant_balance')) / AccountEntry::sum('amount') * 100,
            // 'average_amount' => AccountEntry::avg('amount'),
            // 'average_delivery_charge' => AccountEntry::avg('delivery_charge'),
            // 'average_merchant_balance' => AccountEntry::avg('merchant_balance'),
            // 'average_rider_balance' => AccountEntry::avg('amount') - AccountEntry::avg('delivery_charge') - AccountEntry::avg('merchant_balance'),
            // 'average_rider_balance_percentage' => (AccountEntry::avg('amount') - AccountEntry::avg('delivery_charge') - AccountEntry::avg('merchant_balance')) / AccountEntry::avg('amount') * 100,
            // 'total_payment_methods' => AccountEntry::select('payment_method')->groupBy('payment_method')->count(),
            // 'payment_methods' => AccountEntry::select('payment_method')->groupBy('payment_method')->get(),
            // 'total_riders' => AccountEntry::select('rider')->groupBy('rider')->count(),
            // 'riders' => AccountEntry::select('rider')->groupBy('rider')->get(),
            // 'total_products' => AccountEntry::select('product')->groupBy('product')->count(),
            // 'products' => AccountEntry::select('product')->groupBy('product')->get(),
            // 'total_months' => AccountEntry::selectRaw('MONTH(date) as month, COUNT(*) as count')->groupBy('month')->get(),
            // 'months' => AccountEntry::selectRaw('MONTH(date) as month, COUNT(*) as count')->groupBy('month')->get(),
            // 'total_years' => AccountEntry::selectRaw('YEAR(date) as year, COUNT(*) as count')->groupBy('year')->get(),
            // 'years' => AccountEntry::selectRaw('YEAR(date) as year, COUNT(*) as count')->groupBy('year')->get(),
            // 'total_days' => AccountEntry::selectRaw('DAYOFWEEK(date) as day, COUNT(*) as count')->groupBy('day')->get(),
            // 'days' => AccountEntry::selectRaw('DAYOFWEEK(date) as day, COUNT(*) as count')->groupBy('day')->get(),
            // 'total_weeks' => AccountEntry::selectRaw('WEEK(date) as week, COUNT(*) as count')->groupBy('week')->get(),
            // 'weeks' => AccountEntry::selectRaw('WEEK(date) as week, COUNT(*) as count')->groupBy('week')->get(),
        ]);
    }
}
