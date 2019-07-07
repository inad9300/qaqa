@extends('layouts.app')

@section('body')
    <h1>{{ $question->content }}</h1>

    @if (count($answers) === 0)
        <p class="alert alert-info">No answers yet – be the first to reply!</p>
    @else
        <div>
            <ul class="list-group list-group-flush">
                @foreach ($answers as $a)
                    <li class="list-group-item bg-transparent">
                        <span class="badge badge-secondary mr-1">{{ $a->time }}</span>
                        {{ $a->content }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <hr class="my-3">

    <form class="needs-validation" novalidate method="POST" action="/question/{{ $question->id }}">
        @csrf

        <div>
            <textarea class="form-control @error('content') is-invalid @enderror" name="content" type="search" placeholder="Give it your best shot!" autofocus></textarea>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary float-right mt-2" type="submit">Reply</button>
    </form>
@endsection
