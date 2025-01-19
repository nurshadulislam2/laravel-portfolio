@extends('backend.layouts.master')

@section('title', 'Portfolio Create')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Portfolio Create</div>
                <div class="card-body">
                    <form action="{{ route('portfolio.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control @error('title')
                                is-invalid
                            @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="Title..">
                            @error('title')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file @error('image')
                                is-invalid
                            @enderror" name="image" id="image">
                            @error('image')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="30" rows="4" class="form-control @error('description')
                                is-invalid
                            @enderror" placeholder="Description..."></textarea>
                            @error('description')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="text" class="form-control @error('link')
                                is-invalid
                            @enderror" id="link" name="link" value="{{ old('link') }}" placeholder="Link...">
                            @error('link')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
