<div class="container">
    <h1>Create Profile</h1>
    <form method="POST" enctype="multipart/form-data" action="/posts">
        @csrf
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location">
        </div>
        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea class="form-control" id="bio" name="bio" rows="3" ></textarea>
        </div>
        <button type="submit" class="create-button">Create</button>
    </form>
</div>