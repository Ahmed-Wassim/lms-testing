@extends('dashboard.layouts.app')

@section('title', 'Create Course')

@push('styles')
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/bootstrap-markdown/bootstrap-markdown.min.css') }}">
@endpush

@section('content')
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Create Item</h2>
                </div>
                <div class="body">
                    <form id="item-form" method="POST" action="{{ route('courses.store') }}">
                        @csrf

                        {{-- Row 1 --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input id="name" name="name" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Price <span class="text-danger">*</span></label>
                                    <input id="price" name="price" type="number" step="0.01" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        {{-- Row 2: two loading data selects + one basic --}}
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="mb-3">
                                    <label><strong>Basic</strong></label>
                                    <select class="form-control show-tick ms select2" data-placeholder="Select"
                                        id="basic-select" name="basic_field">
                                        <option></option>
                                        @foreach ($levels as $level)
                                            <option value="{{ $level->id }}">{{ $level->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="mb-3">
                                    <label><strong>Loading Data (Route A)</strong></label>
                                    <input type="hidden" id="loadingA-select" name="loadingA_field" class="form-control" />
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="mb-3">
                                    <label><strong>Loading Data (Route B)</strong></label>
                                    <input type="hidden" id="loadingB-select" name="loadingB_field" class="form-control">
                                </div>
                            </div>
                        </div>

                        {{-- Row 3: markdown editor --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description / Content</label>
                                    <textarea id="markdown-editor" name="description" data-provide="markdown" rows="10"
                                        class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
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
            $('.select2').select2();

            // Loading Data (Route A)
            $('#loadingA-select').select2({
                placeholder: 'Select from route A',
                allowClear: true,
                ajax: {
                    url: '{{ route("levels.getLevels") }}',  // change this route name
                    // type: 'GET',
                    dataType: 'json',
                    delay: 250,
                    data: function (term) {
                        console.log("Search term:", term);
                        return {
                            q: term
                        };
                    },
                    processResults: function (data) {
                        console.log("Select2 got data:", data);
                        return {
                            results: data.results
                        };
                    },
                    cache: true
                },
                minimumInputLength: 1
            });

            // Loading Data (Route B)
            $('#loadingB-select').select2({
                placeholder: 'Select from route B',
                allowClear: true,
                ajax: {
                    url: '{{ route("tags.getTags") }}',  // another route
                    type: 'GET',
                    dataType: 'json',
                    delay: 250,
                    data: function (term) {
                        console.log("Search term:", term);
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