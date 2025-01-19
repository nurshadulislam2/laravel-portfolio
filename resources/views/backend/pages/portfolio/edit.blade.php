@extends('backend.layouts.master')

@section('title', 'Portfolio Update')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            Portfolio Update
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('portfolio.index') }}" class="btn btn-primary">Portfolios</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('portfolio.update', $portfolio->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control @error('title')
                                is-invalid
                            @enderror" id="title" name="title" value="{{ $portfolio->title }}" placeholder="Title..">
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
                            <img src="{{ asset('images/'. $portfolio->image) }}" class="mt-3" alt="{{ $portfolio->title }}" width="100">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="30" rows="4" class="form-control @error('description')
                                is-invalid
                            @enderror" placeholder="Description...">{{ $portfolio->description }}</textarea>
                            @error('description')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="text" class="form-control @error('link')
                                is-invalid
                            @enderror" id="link" name="link" value="{{ $portfolio->link }}" placeholder="Link...">
                            @error('link')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
