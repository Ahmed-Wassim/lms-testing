<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Level;
use Illuminate\Http\Request;
use App\Http\Requests\LevelRequest;
use App\Http\Controllers\Controller;

class LevelController extends Controller
{
    public function index()
    {
        $levels = Level::all();
        return view('dashboard.levels.index', compact('levels'));
    }

    public function store(LevelRequest $request)
    {
        Level::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('levels.index')->with('success', 'The Level has been created successfully');
    }


    public function update(LevelRequest $request, Level $level)
    {
        $level->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('levels.index')->with('success', 'The Level has been updated successfully');
    }

    public function destroy(Level $level)
    {
        $level->delete();

        return redirect()->route('levels.index')->with('success', 'The Level has been deleted successfully');
    }

    public function getLevel(Request $request)
    {
        $search = $request->get('q', '');

        $query = Level::query();

        if (!empty($search)) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $levels = $query->limit(10)->get(['id', 'name as text']);

        return response()->json([
            'results' => $levels
        ]);
    }
}
