@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Subjects</h1>
            <a href="{{ route('subjects.create') }}" class="btn btn-primary">Add New Subject</a>
        </div>

        @if($subjects->isEmpty())
            <p>No subjects available.</p>
        @else
    
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    
                    <th>Name</th>
                    <th>Code</th>
                    <th>Description</th>
                    <th width="150">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subjects as $subject)
                    <tr>
                        <td>{{ $subject->id }}</td>
                        <td>{{ $subject->name }}</td>
                        <td>{{ $subject->code }}</td>
                        <td>{{ $subject->description }}</td>
                        <td>
                            <a href="{{ route('subjects.edit', $subject) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('subjects.destroy', $subject) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" >Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif  
    </div>
@endsection