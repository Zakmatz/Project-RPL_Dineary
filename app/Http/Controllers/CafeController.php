<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\Category;
use Illuminate\Http\Request;

class CafeController extends Controller
{
    // Tampil daftar cafe + filter + search
    public function index(Request $request)
    {
        $query = Cafe::with(['categories', 'reviews']);

        // Filter berdasarkan nama
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter berdasarkan kategori
        if ($request->category) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('name', $request->category);
            });
        }

        $cafes = $query->get();
        $categories = Category::all();

        return view('cafes.index', compact('cafes', 'categories'));
    }

    // Tampil detail satu cafe
    public function show($id)
    {
        $cafe = Cafe::with(['categories', 'menus', 'reviews.user', 'reviews.photos'])->findOrFail($id);
        return view('cafes.show', compact('cafe'));
    }

    // Search
    public function search(Request $request)
    {
        return $this->index($request);
    }
}