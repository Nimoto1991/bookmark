@extends('layouts.app')

@section('title', $bookmark->getUrl())

@section('content')
    <ul class="list-group">
        <li class="list-group-item">ID: {{ $bookmark->getId() }}</li>
        <li class="list-group-item">Adding Date: {{ $bookmark->getDateCreate() }}</li>
        <li class="list-group-item">Title: {{ $bookmark->getTitle() }}</li>
        <li class="list-group-item">Description: {{ $bookmark->getDescription() }}</li>
        <li class="list-group-item">Keywords: {{ $bookmark->getKeywords() }}</li>
        <li class="list-group-item">Url: {{ $bookmark->getUrl() }}</li>
    </ul>
@endsection
