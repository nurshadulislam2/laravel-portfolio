@extends('backend.layouts.master')

@section('title', 'Header')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Header Update</div>
                <div class="card-body">
                    <form action="{{ route('header.update', $header->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name')
                                is-invalid
                            @enderror" id="name" name="name" value="{{ $header->name }}">
                            @error('name')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Profession</label>
                            <input type="text" class="form-control @error('profession')
                                is-invalid
                            @enderror" id="profession" name="profession" value="{{ $header->profession }}">
                            @error('profession')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file @error('image')
                                is-invalid
                            @enderror" name="image" id="image">
                            <img src="{{ asset('images/'. $header->image) }}" class="my-2" alt="profile" width="100">
                            @error('image')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="resume">Resume</label>
                            <input type="file" class="form-control-file @error('resume')
                                is-invalid
                            @enderror" name="resume" id="resume">
                            @error('resume')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                            <a href="{{ asset('files/'. $header->resume) }}" class="btn btn-link my-2" target="_blank">Resume</a>
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
