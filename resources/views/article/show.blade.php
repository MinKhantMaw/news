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
                       <div class="">
                           <h4 for=""> {{$article->title}}</h4>
                           <p>{{$article->description}}</p>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
