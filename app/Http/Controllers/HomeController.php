<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\Category;
use App\Models\Event;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama (beranda)
     */
    public function index()
    {
        $partners = Partner::latest()->get();
        $categories = Category::latest()->get();
        $events = Event::with('category')->latest()->take(3)->get();

        return view('welcome', compact('partners', 'categories', 'events'));
    }

    /**
     * Menampilkan halaman profil praktikan
     */
    public function profil()
    {
        return view('profil');
    }

    /**
     * Menampilkan halaman katalog event
     */
    public function katalog(Request $request)
    {
        $events = Event::with('category')
            ->when($request->search, function ($query, $search) {
                return $query->where('title', 'LIKE', '%' . $search . '%')
                    ->orWhere('description', 'LIKE', '%' . $search . '%')
                    ->orWhere('location', 'LIKE', '%' . $search . '%');
            })
            ->latest()
            ->get();

        return view('katalog', compact('events'));
    }

    /**
     * Menampilkan halaman bantuan / FAQ
     */
    public function bantuan()
    {
        return view('bantuan');
    }

    /**
     * Menampilkan halaman kontak
     */
    public function kontak()
    {
        return view('contact');
    }
}