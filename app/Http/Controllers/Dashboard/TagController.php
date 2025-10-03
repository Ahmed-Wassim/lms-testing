<?php

namespace App\Http\Controllers\Dashboard;

use Spatie\Tags\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('dashboard.tags.index', compact('tags'));
    }

    public function store(TagRequest $request)
    {
        Tag::create([
            'name' => $request->name,
        ]);

        return redirect()->route('tags.index')->with('success', 'The tag has been created successfully');
    }


    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update([
            'name' => $request->name,
        ]);

        return redirect()->route('tags.index')->with('success', 'The tag has been updated successfully');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags.index')->with('success', 'The tag has been deleted successfully');
    }
}
