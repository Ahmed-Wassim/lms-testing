<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Level;
use App\Models\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Spatie\Tags\Tag;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('tags', 'user', 'level')->get();
        return view('dashboard.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $levels = Level::select('id', 'name')->get();
        return view('dashboard.courses.create', compact('levels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $course = Course::create([
            'name' => $request->name,
            'price' => $request->price,
            'level_id' => $request->level_id,
            'user_id' => $request->user_id,
            'description' => $request->description,
        ]);

        $tag = Tag::find($request->tag_id);

        if ($request->tag_id) {
            $course->syncTags([$tag]);
        }

        return redirect()->route('courses.index')
            ->with('success', 'Course has been created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $course->load('tags');
        $levels = Level::select('id', 'name')->get();
        return view('dashboard.courses.edit', compact('course', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update([
            'name' => $request->name,
            'price' => $request->price,
            'level_id' => $request->level_id,
            'user_id' => $request->user_id,
            'description' => $request->description,
        ]);

        $tag = Tag::find($request->tag_id);

        if ($request->tag_id) {
            $course->syncTags([$tag]);
        }
        return redirect()->route('courses.index')->with('success', 'The course has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'The course has been deleted successfully');
    }
}
