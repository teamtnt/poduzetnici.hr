<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = User::whereNotNull('slug')
            ->where('slug', '!=', '')
            ->where('is_public', true);

        // Search
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('company_name', 'like', "%{$search}%")
                    ->orWhere('firstname', 'like', "%{$search}%")
                    ->orWhere('lastname', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filter by Industry
        if ($request->filled('industry')) {
            $query->where('industry', $request->input('industry'));
        }

        // Get industries for filter dropdown
        $industries = [
            'IT / Programiranje',
            'Dizajn',
            'Marketing',
            'Računovodstvo',
            'Pravo',
            'Građevina',
            'Usluge čišćenja',
            'Edukacija',
            'Zdravlje i ljepota',
            'Turizam i ugostiteljstvo',
            'Prijevoz i logistika',
            'Ostalo',
        ];

        $users = $query->latest()->paginate(12)->withQueryString();

        return view('profiles.index', compact('users', 'industries'));
    }

    /**
     * Display the specified resource.
     */
    public function show($slug): View
    {
        $user = User::where('slug', $slug)->firstOrFail();
        $activeAds = $user->ads()->active()->latest()->get();

        return view('profile.show', compact('user', 'activeAds'));
    }
}
