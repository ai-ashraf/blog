<x-backend.master>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Blog Edit</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.blogs.index') }}">
                <button type="button" class="btn btn-sm btn-outline-primary">
                    <span data-feather="list"></span>
                    List
                </button>
            </a>
        </div>
    </div>

    <x-forms.errors />

    <form action="{{ route('admin.blogs.update', $blog->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="form-group mb-3">
            <label class="form-label fw-bold" for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                <option value="" disabled>Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id == $blog->category_id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="form-label fw-bold" for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" required value="{{ old('title', $blog->title) }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="form-label fw-bold" for="slug">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" required value="{{ old('slug', $blog->slug) }}">
            @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="form-label fw-bold" for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <img src="{{ asset('storage/blogs/' . $blog->image) }}" class="mb-3" height="100" />
        <x-forms.textarea type="text" name="description" label="Description" :value="old('description', $blog->description)" required placeholder="Enter blog Description" />
       
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</x-backend.master>