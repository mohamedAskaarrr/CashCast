@extends('layouts.auth')
@section('title', 'Supervisor')

@section('content')
<h2 class="text-2xl font-bold text-white mb-4">Supervisor Management</h2>

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

<form method="POST" action="{{ route('supervisors.give-permission') }}" class="mb-4">
    @csrf
    <input name="role_id" placeholder="Role ID" required>
    <input name="permission" placeholder="Permission" required>
    <button type="submit">Give Permission</button>
</form>

<form method="POST" action="{{ url('supervisors/give-permission') }}" class="mb-4">
    @csrf
    <select name="role_id" class="px-2 py-1 rounded text-black">
        @foreach($roles as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach
    </select>
    <select name="permission" class="px-2 py-1 rounded text-black">
        @foreach($permissions as $perm)
            <option value="{{ $perm->name }}">{{ $perm->name }}</option>
        @endforeach
    </select>
    <button type="submit" class="ml-2 bg-green-600 px-4 py-2 rounded text-white">Assign Permission</button>
</form>
@endsection
