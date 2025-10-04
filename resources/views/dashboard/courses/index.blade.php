@extends('dashboard.layouts.app')

@section('title', 'Courses')

@section('crumbs')
    <div class="col-lg-5 col-md-8 col-sm-12">
        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                    class="fa fa-arrow-left"></i></a> Dashboard</h2>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item active">Courses</li>
        </ul>
    </div>
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Courses</h2>
                    <a href="{{ route('courses.create') }}" class="btn btn-sm btn-info">
                        <i class="fa fa-add"></i> Create Course
                    </a>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table m-b-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>User</th>
                                    <th>Level</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($courses as $course)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td><span>{{$course->name}}</span></td>
                                        <td>{{ $course->slug }} </td>
                                        <td>{{ $course->user->name }}</td>
                                        <td>{{ $course->level->name }}</td>
                                        <td>{{ $course->price }}</td>
                                        <td>{{ $course->description }}</td>

                                        <td>
                                            <!-- Edit Link -->
                                            <a href="{{ route('courses.edit', $tag->slug) }}" class="btn btn-sm btn-info">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>

                                            <!-- Delete Button -->
                                            <button type="button" class="btn btn-sm btn-danger ml-2" data-toggle="modal"
                                                data-target="#deleteModal{{ $loop->iteration }}">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                    </tr>

                                    @include('dashboard.levels.delete')
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">No courses found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection