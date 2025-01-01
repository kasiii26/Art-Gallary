@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit User Role</h2>
    <input type="hidden" name="user_id" value="{{ $user->id }}">
    <form action="{{ route('update.role') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        
        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" id="role" class="form-control">
                <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>User</option>
                <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Admin</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Update Role</button>
    </form>
</div>
@endsection
