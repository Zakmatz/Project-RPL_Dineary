<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\ReviewPhoto;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'cafe_id' => 'required|exists:cafes,id',
            'rating'  => 'required|integer|between:1,5',
            'comment' => 'required|string|max:1000',
            'photo'   => 'nullable|image|max:2048',
        ]);

        // Cek apakah user sudah pernah review cafe ini
        $existing = Review::where('user_id', auth()->id())
                          ->where('cafe_id', $request->cafe_id)
                          ->first();
        if ($existing) {
            return back()->with('error', 'Kamu sudah pernah memberikan review untuk cafe ini.');
        }

        $review = Review::create([
            'user_id' => auth()->id(),
            'cafe_id' => $request->cafe_id,
            'rating'  => $request->rating,
            'comment' => $request->comment,
        ]);

        // Upload foto jika ada
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('review-photos', 'public');
            ReviewPhoto::create([
                'review_id'  => $review->id,
                'photo_path' => $path,
            ]);
        }

        return back()->with('success', 'Review berhasil dikirim!');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        // Hanya user pemilik review yang bisa hapus
        if ($review->user_id !== auth()->id()) {
            abort(403);
        }

        $review->delete();
        return back()->with('success', 'Review berhasil dihapus.');
    }
}