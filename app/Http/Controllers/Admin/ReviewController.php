<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\ReviewLog;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['user', 'cafe', 'photos'])->latest()->get();
        return view('admin.reviews.index', compact('reviews'));
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        // Catat log penghapusan
        ReviewLog::create([
            'admin_id'  => auth()->id(),
            'review_id' => $review->id,
            'action'    => 'deleted',
        ]);

        $review->delete();
        return back()->with('success', 'Review berhasil dihapus.');
    }
}