<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Trip;
use App\Models\DriverAvailability;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalTrips = Trip::count();
        $totalCanceledTrips = Trip::where('status', 'canceled')->count();
        $totalRevenue = Trip::where('status', 'completed')->sum('amount'); // Assuming you have an 'amount' field

        return view('admin.dashboard', compact('totalUsers', 'totalTrips', 'totalCanceledTrips', 'totalRevenue'));
    }
}