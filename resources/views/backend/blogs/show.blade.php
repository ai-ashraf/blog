<x-backend.master>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Blog Details</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.blogs.edit', $blog->id) }}">
                <button type="button" class="btn btn-sm btn-warning">
                    <span data-feather="list"></span>
                    Edit
                </button>
            </a>
            <a href="{{ route('admin.blogs.index') }}">
                <button type="button" class="btn btn-sm btn-primary mx-2">
                    <span data-feather="list"></span>
                    List
                </button>
            </a>
        </div>
    </div>
<div class="row">
    <div class="col-md-7">
        <h3>Title : {{ $blog->title }}</h3>
        <h5>Title : {{ $blog->slug }}</h5>
    </div>
    <div class="col-md-5">
        <img src="{{ asset('storage/blogs/' . $blog->image) }}" height="300" />
    </div>
</div>
    <p><b>Description:</b> {!! $blog->description !!}</p>

</x-backend.master>