<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\payment;
use App\Models\dues_category;

class WargaController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();

        // Get user's payments with dues category, ordered by period descending
        $payments = payment::where('id_user', $user->id)->with('duesCategory')->orderBy('period', 'desc')->get();

        // Calculate total paid
        $totalPaid = $payments->sum('nominal');

        // Assume monthly dues of 25000, calculate unpaid (simplified)
        $monthlyDues = 25000;
        $currentMonth = now()->format('Y-m');
        $paidThisMonth = $payments->where('period', 'like', '%' . now()->format('Y-m') . '%')->sum('nominal');
        $unpaidThisMonth = max(0, $monthlyDues - $paidThisMonth);

        // Total unpaid (simplified, assuming 3 months history)
        $totalUnpaid = $unpaidThisMonth; // For now

        return view('warga.dashboard', compact('payments', 'totalPaid', 'totalUnpaid', 'unpaidThisMonth'));
    }
}
