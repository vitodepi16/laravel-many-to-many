@extends('layouts.admin')

@section('content')
    <main>
        <div class="container">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4 col-lg-3  d-flex p-3 mb-4 mt-4">
                    <div class="card p-1" style="width: 18rem;">
                        <img class="img-fluid" src="{{ $project->image }}" alt="{{ $project->title }}">
                        <div class="card-body">
                            <h5 class="card-title">Nome progetto: {{ $project->title }}</h5>
                            <p class="card-text">{{ $project->type->description }}</p>
                            <p class="card-text">Creato con: {{ $project->type->name }} <img
                                    src="/image/{{ $project->type->image }}" style="width: 100px"
                                    alt="{{ $project->type->name }}"></p>
                            <p class="card-text">{{ $project->body }}</p>
                            @if ($project->tags && count($project->tags) > 0)
                                <div>
                                    @foreach ($project->tags as $tag)
                                        <p class="badge mt-2 rounded-pill text-bg-success">{{ $tag->name }}
                                        </p>
                                    @endforeach
                                </div>
                            @endif
                            <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-outline-warning"
                                    href="{{ route('admin.projects.edit', $project->slug) }}"><i
                                        class="fa-solid fa-pencil"></i></a>
                                <button type='submit' class="delete-button btn btn-outline-danger"
                                    data-item-title="{{ $project->title }}"> <i class="fa-solid  fa-trash"></i></button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
            <div class="d-grid gap-2 d-md-block">
                <a class="btn btn-outline-primary btn-lg mx-auto" href="{{ route('admin.projects.index') }}">Torna ai
                    tuoi
                    progetti</a>
            </div>

        </div>
    </main>
    @include('partials.modal-delete-modal')
@endsection
