<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use App\Models\Partner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::with('category')
            ->latest()
            ->take(6)
            ->get();

        $categories = Category::latest()
            ->take(6)
            ->get();

        $partners = Partner::latest()
            ->take(6)
            ->get();

        return view('welcome', compact('events', 'categories', 'partners'));
    }

    public function profil()
    {
        return view('profil');
    }

    public function katalog(Request $request)
    {
        $search = $request->search;

        $events = Event::with('category')
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('location', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            })
            ->latest()
            ->get();

        $categories = Category::all();

        return view('katalog', compact('events', 'categories', 'search'));
    }

    public function bantuan()
    {
        return view('bantuan');
    }

    public function kontak()
    {
        return view('contact');
    }
}