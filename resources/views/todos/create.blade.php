@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('todos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                @error('title') 
                    <span class="text-danger mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group"><label for="category_id">Category</label>
                <select class="form-control" name="category_id">
                    @forelse ($categories as $item)
                        <option {{ old('category_id') == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->title }}</option>
                    @empty
                        <option value="">Empty</option>
                    @endforelse

                </select>
                @error('category_id')
                    <span class="text-danger mt-1">{{ $message }}</span>
                @enderror
            </div>
            <button class="btn btn-primary">Create</button>
        </form>

    </div>
@endsection
