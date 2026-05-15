<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cafe;
use App\Models\Category;
use App\Models\Review;

class DashboardController extends Controller
{
   public function index()
    {
    $cafes   = Cafe::with('categories')->get();
    $reviews = Review::with(['user', 'cafe'])->latest()->get();

    return view('admin.dashboard', compact('cafes', 'reviews'));
    }
}