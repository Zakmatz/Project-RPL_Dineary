<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cafe;
use App\Models\Category;
use Illuminate\Http\Request;

class CafeController extends Controller
{
    public function index()
    {
        $cafes = Cafe::with('categories')->get();
        return view('admin.cafes.index', compact('cafes'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.cafes.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'address'     => 'required|string',
            'description' => 'nullable|string',
            'phone'       => 'nullable|string|max:20',
            'open_hours'  => 'nullable|string|max:100',
            'price_range' => 'nullable|string|max:100',
            'photo'       => 'nullable|image|max:2048',
            'categories'  => 'nullable|array',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('cafe-photos', 'public');
        }

        $cafe = Cafe::create([
            'name'              => $request->name,
            'address'           => $request->address,
            'description'       => $request->description,
            'deskripsi_singkat' => $request->deskripsi_singkat,
            'phone'             => $request->phone,
            'sosmed'            => $request->sosmed,
            'open_hours'        => $request->open_hours,
            'price_range'       => $request->price_range,
            'photo'             => $photoPath,
        ]);

        if ($request->categories) {
            $cafe->categories()->attach($request->categories);
        }

        return redirect()->route('admin.cafes.index')->with('success', 'Cafe berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $cafe = Cafe::with('categories')->findOrFail($id);
        $categories = Category::all();
        return view('admin.cafes.edit', compact('cafe', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $cafe = Cafe::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'address'     => 'required|string',
            'description' => 'nullable|string',
            'phone'       => 'nullable|string|max:20',
            'open_hours'  => 'nullable|string|max:100',
            'price_range' => 'nullable|string|max:100',
            'photo'       => 'nullable|image|max:2048',
            'categories'  => 'nullable|array',
        ]);

        if ($request->hasFile('photo')) {
            $cafe->photo = $request->file('photo')->store('cafe-photos', 'public');
        }

        $cafe->update([
            'name'              => $request->name,
            'address'           => $request->address,
            'description'       => $request->description,
            'deskripsi_singkat' => $request->deskripsi_singkat,
            'phone'             => $request->phone,
            'sosmed'            => $request->sosmed,
            'open_hours'        => $request->open_hours,
            'price_range'       => $request->price_range,
            'photo'             => $cafe->photo,
        ]);

        $cafe->categories()->sync($request->categories ?? []);

        return redirect()->route('admin.cafes.index')->with('success', 'Cafe berhasil diupdate!');
    }

    public function destroy($id)
    {
        $cafe = Cafe::findOrFail($id);
        $cafe->delete();
        return redirect()->route('admin.cafes.index')->with('success', 'Cafe berhasil dihapus!');
    }
}