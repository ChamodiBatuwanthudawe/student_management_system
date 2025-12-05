@extends('layouts.app')

@section('content')
<h1>Edit Subject</h1>
<form action="{{ route('subjects.update', $subject) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="name" value="{{ old('name', $subject->name) }}" >
        @error('name')
        <small class="text-danger">{{ $message }}</small>   
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Code</label>
        <input type="text" class="form-control" name="code" value="{{ old('code', $subject->code)  }}" >
        @error('code')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">  
        <label class="form-label">Description</label>
        <textarea class="form-control"  name="description" rows="3">{{ old('description', $subject->description) }}</textarea>
        @error('description')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update Subject</button>
    <a href="{{ route('subjects.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection