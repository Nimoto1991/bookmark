@extends('layouts.app')

@section('title', 'Bookmarks List')

@section('content')
    <div class="panel panel-default">
        <table class="table">
            <thead>
            <tr>
                <th>Date</th>
                <th>Favicon</th>
                <th>Url</th>
                <th>Title</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($bookmarks as $bookmark)
                <tr>
                    <td>{{ $bookmark->getDateCreate() }}</td>
                    <td>{{ $bookmark->getFavicon() }}</td>
                    <td>{{ $bookmark->getUrl() }}</td>
                    <td><a href="{{ route("detail", ["bookmarkId" => $bookmark->getId()]) }}">{{ $bookmark->getTitle() }}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            @foreach ($links as $link)
            <li class="page-item"><a class="page-link" href="{{ $link->getUrl() }}">{{ $link->getLabel() }}</a></li>
            @endforeach
        </ul>
    </nav>


@endsection
