<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Artist;

class ArtistController extends Controller
{
  
    public function index()
    {
        try {
            $artists = Artist::latest()->get();
            return view('artists', ['artists' => $artists]);
        } catch (\Throwable $th) {
            return redirect('/artists')->withErrors("Something went wrong");
        }
    }

    public function top()
    {
        try {
            $top_album = DB::table('albums')
                ->select('artist_id', DB::raw('SUM(sales) as total_sales'))
                ->groupBy('artist_id')
                ->orderBy('total_sales', 'desc')
                ->first();
            return view('top-artist', ['top_album' => $top_album]);
        } catch (\Throwable $th) {
            return redirect('/artists')->withErrors("Something went wrong");
        }
    }

    public function create()
    {
        return view('artist-create');
    }

    public function store(Request $request)
    {
        try {            
            $request->validate([
                'name' => 'required|string|max:255',
                'code' => 'required|string|max:50',
            ]);
    
            $artist = Artist::create([
                'name' => $request->name,
                'code' => $request->code
            ]);

            return redirect()->route('artists')->with('success-create', 'Artist created successfully.');
        } catch (\Throwable $th) {
            return redirect()->route('dashboard')->withErrors('Something went wrong');
        }
    }

    public function show(string $id)
    {
        try {
            $artist = Artist::where('id', $id)->first();   
            if (!$artist) return redirect('/artists')->withErrors("Something went wrong");
            return view('artist-view', ['id' => $id]);
        } catch (\Throwable $th) {
            return redirect('/artists')->withErrors("Something went wrong");
        }
    }

    public function edit(string $id)
    {
        try {
            $artist = Artist::where('id', $id)->first();        
            if (!$artist) return redirect('/artists')->withErrors("Something went wrong");
            return view('artists-edit', ['id' => $id]);

        } catch (\Throwable $th) {
            return redirect('/artists')->withErrors("Something went wrong");
        }
    }

    public function update(Request $request, string $id)
    {
        try {            
            $request->validate([
                'name' => 'max:255',
                'code' => 'max:50',
            ]);
    
            $artist = Artist::findOrFail($id);
            if (!$artist) return redirect()->route('dashboard')->withErrors('Something went wrong');

            if ($request->filled('name')) {
                $artist->name = $request->name;
            }

            if ($request->filled('code')) {
                $artist->code = $request->code;
            }
            $artist->save();
            return redirect()->route('artists')->with('success-update', 'Artist updated successfully.');

        } catch (\Throwable $th) {
            return redirect()->route('dashboard')->withErrors('Something went wrong');
        }
    }

    public function destroy(string $id)
    {
        try {
            $artist = Artist::where('id', $id)->first();   
            if (!$artist) return redirect('/artists')->withErrors("Something went wrong");

            $artist->delete();
            return redirect()->route('artists')->with('success-delete', 'Artist deleted successfully.');

        } catch (\Throwable $th) {
            return redirect('/artists')->withErrors("Something went wrong");
        }
    }
}
