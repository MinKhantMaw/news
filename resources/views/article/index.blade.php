@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                @component('component.bread_crumb')
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Home</a></li>

                    <li class="breadcrumb-item active" aria-current="page"> Article</li>
                @endcomponent
                <div class="card">
                    <div class="card-header">
                        Article List
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="">
                                {{ $article->links() }}
                            </div>
                            <div class="">
                                <form action="{{ route('search-article') }}" method="GET">
                                    @csrf
                                    <div class="form-inline mb-2">
                                        <input type="text" name="search" class="form-control">
                                        <button class="btn btn-primary">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Owner</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            @foreach ($article as $list)
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $list->id }}</th>
                                        <td>{{ substr($list->title, 0, 40) }}...</td>
                                        <td>{{ substr($list->description, 0, 30) }}...</td>
                                        <td>{{ $list->user_id }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('article.show', $list->id) }}"
                                                class="text-decoration-none btn btn-primary btn-sm">Show</a>
                                            <form action="{{ route('article.destroy', $list->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm ml-2">Delete</button>
                                            </form>
                                            <a href="{{ route('article.edit', $list->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
