<x-frontend.master>
        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Blog Detail</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Blog Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->


        <!-- blog Detail Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="row gy-5 gx-4">
                <div class="col-lg-12">
                    <div class="justify-content-center text-center align-items-center mb-5">
                        <div class="text-center">
                            <h3 class="text-primary">{{ $blog->title }}</h3>
                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>Posted At: {{ date('d F, Y', strtotime($blog->created_at))}}</span>
                        </div>
                    </div>
                    
                    <div class="text-center mb-5">
                        <img src="{{ asset('storage/blogs/' . $blog->image) }}" height="auto" width="300" />
                    </div>

                    <div class="mb-5">
                        <p>{!! $blog->description !!}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    @if($blog->comments->count())
                        <button class="btn btn-sm btn-primary">Comments</button>
                        @else
                        <p class="text-primary">No comment Yet</p>
                    @endif
                </div>
                    @foreach ($blog->comments as $comment)
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">{{ $comment->user->name }}</h5>
                        <p class="card-text">{{ $comment->body }}</p>
                        </div>
                    </div>
                    @endforeach
                    @if(auth()->check()) <!-- Check if user is logged in -->
                        <form action="{{ route('comments.store', $blog->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Add your comment</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="body" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                    @else
                    <p>Please <a href="{{ route('login', ['previous_url' => url()->current()]) }}">login</a> to leave a comment.</p>
                    @endif
                </div>
            </div>
        </div>
        <!-- blog Detail End -->
</x-frontend.master>