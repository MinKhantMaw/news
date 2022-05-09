@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                @component('component.bread_crumb')
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('article.index') }}" class="text-decoration-none">Article</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Article</li>
                @endcomponent
                <div class="card">
                    <div class="card-header">Edit Article</div>

                    <div class="card-body">
                        <form action="{{route('article.update',$article->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" value="{{$article->title}}" class="form-control @error('title')
                                    is-invalid
                                @enderror"  placeholder="Title">
                                @error('title')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                             <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" class="form-control @error('description')
                                is-invalid
                                @enderror" cols="20" rows="5">{{$article->description}}</textarea>
                                @error('description')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-2 rounded">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
