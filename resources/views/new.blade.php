@extends('layouts.app')

@section('title', 'New Bookmark')

@section('content')
    <form method="post" action="{{ route('new') }}">
        @csrf
        <div class="form-group">
            <label for="url">Url</label>
            <input type="text" name="url" class="form-control" id="url" value="{{ $url ?? '' }}">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <small id="error" class="form-text text-muted">{{ $error }}</small>
                    @endforeach
                </div>
            @elseif($error)
                <div class="alert alert-danger">
                    <small id="error" class="form-text text-muted">{{ $error }}</small>
                </div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
