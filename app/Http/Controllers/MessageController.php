<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ad_id' => 'required|exists:ads,id',
            'content' => 'required|string|min:10|max:2000',
        ]);

        $ad = Ad::findOrFail($validated['ad_id']);

        if ($ad->user_id === auth()->id()) {
            return back()->withErrors(['content' => 'Ne možete poslati poruku na vlastiti oglas.']);
        }

        Message::create([
            'ad_id' => $ad->id,
            'sender_id' => auth()->id(),
            'recipient_id' => $ad->user_id,
            'content' => $validated['content'],
        ]);

        return back()->with('status', 'Poruka je uspješno poslana!');
    }
}
