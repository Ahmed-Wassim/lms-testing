@extends('dashboard.layouts.app')

@section('title', 'Levels')

@section('crumbs')
    <div class="col-lg-5 col-md-8 col-sm-12">
        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                    class="fa fa-arrow-left"></i></a> Dashboard</h2>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item active">Levels</li>
        </ul>
    </div>
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Levels</h2>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createModal">
                        Create Level
                    </button>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table m-b-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($levels as $level)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td><span>{{$level->name}}</span></td>
                                        <td>{{ $level->slug }} </td>
                                        <td>{{ $level->description }}</td>
                                        <td>
                                            <!-- Edit Button -->
                                            <button type="button" class="btn btn-sm btn-info" data-toggle="modal"
                                                data-target="#editModal{{ $loop->iteration }}">
                                                <i class="fa fa-edit"></i> Edit
                                            </button>

                                            <!-- Delete Button -->
                                            <button type="button" class="btn btn-sm btn-danger ml-2" data-toggle="modal"
                                                data-target="#deleteModal">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                    </tr>

                                    @include('dashboard.levels.edit')
                                    @include('dashboard.levels.delete')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('dashboard.levels.create')
@endsection