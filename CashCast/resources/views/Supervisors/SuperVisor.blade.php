@extends('layouts.auth')
@section('title', 'Supervisor')

@section('content')
<!-- In resources/views/Supervisors/superVisor.blade.php -->

@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h3>Assign Permission to Role</h3>

<form method="POST" action="{{ route('supervisors.give-permission') }}">
    @csrf  <!-- Important: CSRF protection -->

    <div>
        <label for="role_id">Role:</label>
        <select name="role_id" id="role_id" required>
            <option value="">-- Select a Role --</option>
            @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
    </div>

    <div style="margin-top: 10px;">
        <label for="permission">Permission:</label>
        <select name="permission" id="permission" required>
            <option value="">-- Select a Permission --</option>
            @foreach($permissions as $permission)
                <option value="{{ $permission->name }}">{{ $permission->name }}</option>
            @endforeach
        </select>
    </div>

    <div style="margin-top: 20px;">
        <button type="submit">Give Permission</button>
    </div>
</form>
@endsection
