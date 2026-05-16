<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['user', 'cafe', 'photos'])->latest()->get();
        return view('admin.reviews.index', compact('reviews'));
    }

    public function destroy($id)
    {
        // 1. Cari data review berdasarkan ID
        $review = Review::findOrFail($id);

        // 2. Langsung hapus review dari database
        $review->delete();

        // 3. Kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Review berhasil dihapus.');
    }
}