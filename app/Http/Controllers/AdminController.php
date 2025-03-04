<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Trip;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalTrips = Trip::count();
        $totalCanceledTrips = Trip::where('status', 'canceled')->count();
        $totalRevenue = Trip::where('status', 'completed')->sum('amount'); // Ensure 'amount' column exists

        return view('admin.dashboard', compact('totalUsers', 'totalTrips', 'totalCanceledTrips', 'totalRevenue'));
    }
}