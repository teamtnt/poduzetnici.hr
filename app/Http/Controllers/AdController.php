<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
        $ads = \App\Models\Ad::active()->latest()->paginate(12);
        return view('ads.index', compact('ads'));
    }

    public function create()
    {
        return view('ads.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:offer,demand',
            'category' => 'required|string|in:Prodaja poslovanja,Partnerstva,Oprema i alati,Usluge,Oglasni prostor,Pitanja i odgovori',
            'price' => 'nullable|numeric|min:0',
            'duration_days' => 'required|integer|in:7,14,30',
            'is_anonymous' => 'nullable|boolean',
        ]);

        $slug = \Illuminate\Support\Str::slug($validated['title']) . '-' . uniqid();

        $request->user()->ads()->create([
            'title' => $validated['title'],
            'slug' => $slug,
            'description' => $validated['description'],
            'type' => $validated['type'],
            'category' => $validated['category'],
            'price' => $validated['price'],
            'duration_days' => $validated['duration_days'],
            'expires_at' => now()->addDays((int) $validated['duration_days']),
            'is_anonymous' => $request->boolean('is_anonymous'),
        ]);

        return redirect()->route('ads.index')->with('status', 'Ad created successfully!');
    }

    public function show($id)
    {
        // $id can be slug or ID in future, for now let's assume ID or Slug handled by route model binding if we change logic
        // But route definition was /ads/{id} so...
        if (is_numeric($id)) {
            $ad = \App\Models\Ad::findOrFail($id);
        } else {
             $ad = \App\Models\Ad::where('slug', $id)->firstOrFail();
        }

        return view('ads.show', compact('ad'));
    }
}
