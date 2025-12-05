@extends('layouts.app')

@section('content')
<h1>Edit Student</h1>
<form action="{{ route('students.update', $student) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="name" value="{{ old('name', $student->name) }}" >
        @error('name')
        <small class="text-danger">{{ $message }}</small>   
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="text" class="form-control" name="email" value="{{ old('email', $student->email)  }}" >
        @error('email')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">  
        <label class="form-label">Phone</label>
        <textarea class="form-control"  name="phone" rows="3">{{ old('phone', $student->phone) }}</textarea>
        @error('phone')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">  
        <label class="form-label">Subject</label>
        <select name="subject_id" class="form-select">
            @foreach($subjects as $subject)
                <option value="{{ $subject->id }}" {{ old('subject_id', $student->subject_id) == $subject->id ? 'selected' : '' }}>
                    {{ $subject->name }}
                </option>
            @endforeach
        </select>
        @error('subject_id')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update Student</button>
    <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection