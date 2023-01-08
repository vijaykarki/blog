@extends('layouts.layout')
@section('title', 'User Roles')

@section('content')
<style>
    table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #f2f2f2
}

th {
  background-color: #4CAF50;
  color: white;
}

.form-control {
  width: auto;
  display: inline;
}

</style>
    <div class="container">
        <h1>User Roles</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <form action="{{ route('users.update', $user) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <select name="role" id="role" class="form-control">
                                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                        <option value="creator" {{ $user->role == 'creator' ? 'selected' : '' }}>Creator</option>

                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Update Role</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
