@extends('layouts.layout')

@section('content')
<style>
.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
}

h1 {
  margin: 20px 0;
  font-size: 36px;
  font-weight: 600;
  color: #333;
}

form {
  max-width: 500px;
  margin: 0 auto;
}

label {
  display: block;
  font-size: 26px;
  font-weight: 600;
  color: #666;
  margin-bottom: 5px;
}

input,
textarea {
  width: 100%;
  font-size: 16px;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 4px;
}

textarea {
  height: 200px;
}
.form-group{
    padding: 10px;
}
.create-button {
  display: block;
  width: 100%;
  background-color: #007bff;
  color: #fff;
  font-size: 20px;
  font-weight: 600;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.create-button:hover {
  background-color: #0069d9;
}

</style>
<div class="container">
    <h1>Edit Profile</h1>
    <form method="POST" action="/profiles/{{ $profile->id }}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $profile->location }}"  />
        </div>
        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea class="form-control" id="bio" name="bio" rows="3">{{ $profile->bio }}</textarea>
        </div>

        <div class="form-group">
    <button type="submit" class="create-button">Update Profile</button>
</div>
@endsection
