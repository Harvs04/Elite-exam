<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Album;

class AlbumController extends Controller
{

    public function index()
    {
        try {
            $albums_sold = Album::with('artist')->get();
            return view('album-sold', ['albums' => $albums_sold]);
        } catch (\Throwable $th) {
            return redirect('/albums')->withErrors("Something went wrong");
        }
    }

    public function combined()
    {
        try {
            $combined = DB::table('albums')
                ->select('artist_id', DB::raw('SUM(sales) as total_sales'))
                ->groupBy('artist_id')
                ->orderByDesc('total_sales')
                ->get();
            return view('combined-sold', ['albums' => $combined]);
        } catch (\Throwable $th) {
            return redirect('/albums')->withErrors("Something went wrong");
        }
    }

    public function create()
    {
        return view('album-create');
    }

    public function store(Request $request)
    {
        try {            
            $request->validate([
                'year' => 'required|int',
                'name' => 'required|string|max:255',
                'sales' => 'required|int',
                'artist' => 'required|int'
            ]);
    
            $album = Album::create([
                'year' => $request->year,
                'name' => $request->name,
                'sales' => $request->sales,
                'artist_id' => $request->artist
            ]);

            return redirect()->route('dashboard')->with('success-create', 'Album created successfully.');
        } catch (\Throwable $th) {
            return redirect()->route('dashboard')->withErrors('Something went wrong');
        }
    }

    public function show(string $id)
    {
        try {
            $album = Album::where('id', $id)->first();   
            if (!$album) return redirect()->route('dashboard')->withErrors('Something went wrong');
            return view('album-view', ['id' => $id]);
        } catch (\Throwable $th) {
            return redirect()->route('dashboard')->withErrors('Something went wrong');
        }
    }

    public function edit(string $id)
    {
        try {
            $album = Album::where('id', $id)->first();        
            if (!$album) redirect()->route('dashboard')->withErrors('Something went wrong');
            return view('album-edit', ['id' => $id]);

        } catch (\Throwable $th) {
            redirect()->route('dashboard')->withErrors('Something went wrong');
        }
    }

    public function update(Request $request, string $id)
    {
        try {            
            $request->validate([
                'year' => 'nullable|integer|min:1800|max:2025',
                'name' => 'nullable|string|max:255',
                'sales' => 'nullable|integer|min:0',
                'artist_id' => 'nullable',
                'cover_pic_url' => 'nullable|url|max:4096',
            ]);

    
            $album = Album::findOrFail($id);
            if (!$album) return redirect()->route('dashboard')->withErrors('Something went wrong');

            if ($request->filled('year')) {
                $album->year = $request->year;
            }

            if ($request->filled('name')) {
                $album->name = $request->name;
            }

            if ($request->filled('sales')) {
                $album->sales = $request->sales;
            }

            if ($request->filled('artist')) {
                $album->artist_id = $request->artist;
            }

            if ($request->filled('cover_pic_url')) {
                $album->cover_pic_url = $request->cover_pic_url;
            }

            $album->save();
            return redirect()->route('dashboard')->with('success-update', 'Album updated successfully.');

        } catch (\Throwable $th) {
            return redirect()->route('dashboard')->withErrors('Something went wrong');
        }
    }

    public function destroy(string $id)
    {
        try {
            $album = Album::where('id', $id)->first();   
            if (!$album) redirect()->route('dashboard')->withErrors('Something went wrong');

            $album->delete();
            return redirect()->route('dashboard')->with('success-delete', 'album deleted successfully.');

        } catch (\Throwable $th) {
            redirect()->route('dashboard')->withErrors('Something went wrong');
        }
    }
}
