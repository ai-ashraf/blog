<x-frontend.master>

        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Blog List</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Home</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->


        <!-- blogs Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row">
                <!-- Sidebar -->
                    <div class="col-md-2">
                        <div class="sidebar">
                            <h3>Categories</h3>
                            <ul class="list-unstyled category-list">
                                @foreach($categories as $category)
                                    <li><a href="{{ route('frontend.blog.filter', $category->id) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <h3 class="text-center"><x-forms.message /></h3>
                            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">blog Listing</h1>
                            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                            
                                <div class="container tab-content">
                                    <div id="tab-1" class=" row d-flex tab-pane fade show p-0 active justify-content-center">
                                    @foreach($blogs as $blog)
                                        <div class="blog-item p-4 mb-4 col-md-10">
                                            <div class="row g-4">
                                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                                <div class="text-start ps-4">
                                                    <div class="d-flex">
                                                        <img src="{{ asset('storage/blogs/' . $blog->image) }}" height="100" width="100" />
                                                        <div class="ms-4">
                                                            <h5 class="mb-2">{{ $blog->title }}</h5>
                                                            <p class="mb-2">{{ $blog->category->name }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                         
                                                <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                                    <div class="d-flex mb-3">
                                                        
                                                        <a class="btn btn-primary" href="{{ route('frontend.blog.details', $blog->id) }}">Details</a>
                                                    </div>
                                                    <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Posted At: {{ date('d F, Y', strtotime($blog->created_at))}}</small>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        @endforeach
                                    
                                        <div class="pagination justify-content-center">
                                            {{ $blogs->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>     
        <!-- blogs End -->
</x-frontend.master>