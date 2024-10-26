<div class="card shadow-sm mb-4">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Edit Post</h5>
    </div>
    <div class="card-body">
        <form class="my-3" wire:submit.prevent="update">
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
                <div class="d-flex align-items-center mb-2">
                    <img height="80px" width="80px" src="{{ asset('storage/images/' .$post->photo) }}" alt="post image" class="me-3 rounded">
                    <input type="file" class="form-control" wire:model="photo" id="postImage">
                </div>
                @error('photo')
                    <div class="text-danger small mt-1">{{$message}}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="/my/posts" wire:navigate class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
