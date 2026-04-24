<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function toggle($cafe_id)
    {
        $bookmark = Bookmark::where('user_id', auth()->id())
                            ->where('cafe_id', $cafe_id)
                            ->first();

        if ($bookmark) {
            $bookmark->delete();
            return back()->with('info', 'Cafe dihapus dari favorit.');
        } else {
            Bookmark::create([
                'user_id' => auth()->id(),
                'cafe_id' => $cafe_id,
            ]);
            return back()->with('success', 'Cafe ditambahkan ke favorit!');
        }
    }
}