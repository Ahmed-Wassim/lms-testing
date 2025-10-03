@extends('dashboard.layouts.app')

@section('title', 'Tags')

@section('crumbs')
    <div class="col-lg-5 col-md-8 col-sm-12">
        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                    class="fa fa-arrow-left"></i></a> Dashboard</h2>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item active">Tags</li>
        </ul>
    </div>
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Tags</h2>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createModal">
                        Create Tag
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
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tags as $tag)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td><span>{{$tag->name}}</span></td>
                                        <td>{{ $tag->slug }} </td>
                                        <td>
                                            <!-- Edit Button -->
                                            <button type="button" class="btn btn-sm btn-info" data-toggle="modal"
                                                data-target="#editModal{{ $loop->iteration }}">
                                                <i class="fa fa-edit"></i> Edit
                                            </button>

                                            <!-- Delete Button -->
                                            <button type="button" class="btn btn-sm btn-danger ml-2" data-toggle="modal"
                                                data-target="#deleteModal{{ $loop->iteration }}">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                    </tr>

                                    @include('dashboard.tags.edit')
                                    @include('dashboard.tags.delete')
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No tags found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('dashboard.tags.create')
@endsection