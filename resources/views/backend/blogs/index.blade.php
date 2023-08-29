<x-backend.master>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Blog Post</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('admin.blogs.create') }}">
                    <button type="button" class="btn btn-sm btn-outline-primary">
                        <span data-feather="plus"></span>
                        Add New
                    </button>
                </a>
            </div>
        </div>

        <x-forms.message />

        <table class="table">
            <thead>
                <tr>
                    <th>SL#</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th width="180">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogs as $blog)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $blog->category->name }}</td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->slug }}</td>
                    <td><img src="{{ asset('storage/blogs/' . $blog->image) }}" height="80" /></td>
                    <td>{!! Str::limit( $blog->description,100) !!}</td>
                    <td class="d-flex">
                        <a class="btn btn-sm btn-outline-info mx-2" href="{{ route('admin.blogs.show', $blog->id) }}">Show</a>

                        <a class="btn btn-sm btn-outline-warning" href="{{ route('admin.blogs.edit', $blog->id) }}">Edit</a>

                        <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-outline-danger mx-2" onclick="return confirm('Are you sure want to delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $blogs->links() }}
</x-backend.master>