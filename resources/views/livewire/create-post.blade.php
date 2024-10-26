<div class="card shadow mb-4">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Add New Post</h5>
    </div>
    <div class="card-body">
        <form class="my-4" wire:submit.prevent="save">
            <div class="mb-3">
                <label for="postTitle" class="form-label">Post Title</label>
                <input type="text" class="form-control" wire:model="post_title" id="postTitle" placeholder="Post Title" required>
                @error('post_title')
                    <div class="text-danger small mt-1">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="postContent" class="form-label">Your Post</label>
                <textarea class="form-control" wire:model="content" id="postContent" placeholder="Your post goes here.." rows="5" required></textarea>

                @error('content')
                    <div class="text-danger small mt-1">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="postImage" class="form-label">Post Image</label>
                <input type="file" class="form-control" wire:model="photo" id="postImage">
                @error('photo')
                    <div class="text-danger small mt-1">{{$message}}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success btn-lg">Save</button>
                <a href="/user/home" wire:navigate class="btn btn-outline-secondary btn-lg">Cancel</a>
            </div>
        </form>
    </div>
</div>
