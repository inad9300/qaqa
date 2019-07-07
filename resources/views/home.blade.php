@extends('layouts.app')

@section('body')
    <form class="needs-validation" novalidate method="POST" action="/">
        @csrf

        <div>
            <textarea class="form-control @error('content') is-invalid @enderror" name="content" type="search" placeholder="{{ $exampleQuestion }}" autofocus></textarea>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary float-right mt-2" type="submit">Shoot!</button>
    </form>
    <div class="clearfix"></div>

    <hr class="my-3">

    @if (count($questions) === 0)
        <p class="alert alert-info">No questions yet – go ahead and ask the first!</p>
    @else
        <!--
            You could consider the sorting requirement (depending upon interpretation)
            not fully met with Bootstrap's default column layout, but I liked it!
        -->
        <div class="card-columns">
            @foreach ($questions as $q)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-0">
                            <a href="/question/{{ $q->id }}">{{ $q->content }}</a>
                        </h5>
                        <p class="card-text">
                            <small class="text-muted">{{ $q->time }}</small>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

@endsection
