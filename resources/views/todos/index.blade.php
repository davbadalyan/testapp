@extends('layouts.app');

@section('content')
    <div class="container">
        <h1>Todos</h1>

        <form action="?" method="GET">
            <input type="text" name="query" value="{{ request()->get('query') }}">
            <button class="btn btn-primary">Search</button>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>
                        Id
                        <a href="?sort=upId">Up</a>
                        <a href="?sort=downId">Down</a>
                    </th>
                    <th>
                        Title
                        <a href="?sort=upTitle">Up</a>
                        <a href="?sort=downTitle">Down</a>
                    </th>
                    <th>Category</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    {{-- <th>Complated</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($todos as $todo)
                    <tr>
                        <td>{{ $todo->id }}</td>
                        <td>{{ $todo->title }}</td>
                        <td>{{ $todo->category->title }}</td>
                        <td>{{ $todo->created_at }}</td>
                        <td>{{ $todo->updated_at }}</td>
                        {{-- <td>{{ $todo->complated }}</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
