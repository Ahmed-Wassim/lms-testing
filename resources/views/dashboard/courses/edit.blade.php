@extends('dashboard.layouts.app')

@section('title', 'Edit Course')

@push('styles')
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/bootstrap-markdown/bootstrap-markdown.min.css') }}">
@endpush

@section('content')
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Edit Course</h2>
                </div>
                <div class="body">
                    <form id="item-form" method="POST" action="{{ route('courses.update', $course->id) }}">
                        @csrf
                        @method('PUT')

                        {{-- Row 1 --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input id="name" name="name" type="text" class="form-control"
                                        value="{{ old('name', $course->name) }}" required>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Price <span class="text-danger">*</span></label>
                                    <input id="price" name="price" type="number" step="0.01" class="form-control"
                                        value="{{ old('price', $course->price) }}" required>
                                    @error('price')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Row 2: two loading data selects + one basic --}}
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="mb-3">
                                    <label><strong>Level</strong></label>
                                    <select class="form-control show-tick ms select2" data-placeholder="Select"
                                        id="basic-select" name="level_id">
                                        <option></option>
                                        @foreach ($levels as $level)
                                            <option value="{{ $level->id }}" {{ old('level_id', $course->level_id) == $level->id ? 'selected' : '' }}>
                                                {{ $level->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('level_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="mb-3">
                                    <label><strong>User</strong></label>
                                    <select id="loadingA-select" name="user_id" class="form-control">
                                        @if($course->user)
                                            <option value="{{ $course->user->id }}" selected>
                                                {{ $course->user->name }}
                                            </option>
                                        @endif
                                    </select>
                                    @error('user_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="mb-3">
                                    <label><strong>Tag</strong></label>
                                    <select id="loadingB-select" name="tag_id" class="form-control">
                                        @if($course->tags->isNotEmpty())
                                            <option value="{{ $course->tags->first()->id }}" selected>
                                                {{ $course->tags->first()->name }}
                                            </option>
                                        @endif
                                    </select>
                                    @error('tag_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Row 3: markdown editor --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description / Content</label>
                                    <textarea id="markdown-editor" name="description" data-provide="markdown" rows="10"
                                        class="form-control">{{ old('description', $course->description) }}</textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('dashboard/assets/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/markdown/markdown.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/to-markdown/to-markdown.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/bootstrap-markdown/bootstrap-markdown.js') }}"></script>

    <script>
        $(document).ready(function () {
            // Basic Select2
            $('#basic-select').select2();

            // Loading Data (User)
            $('#loadingA-select').select2({
                placeholder: 'Select user',
                allowClear: true,
                ajax: {
                    url: '{{ route("users.getUsers") }}',
                    dataType: 'json',
                    delay: 250,
                    data: function (term) {
                        return {
                            q: term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data.results
                        };
                    },
                    cache: true
                },
                minimumInputLength: 1
            });

            // Loading Data (Tag)
            $('#loadingB-select').select2({
                placeholder: 'Select tag',
                allowClear: true,
                ajax: {
                    url: '{{ route("tags.getTags") }}',
                    dataType: 'json',
                    delay: 250,
                    data: function (term) {
                        return {
                            q: term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data.results
                        };
                    },
                    cache: true
                },
                minimumInputLength: 1
            });
        });
    </script>
@endpush