<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Admin Login</title>
  </head>
  <body>
    
                
                
    <div class="container  mt-3">
        <div class="text-center">
        <h3>Admin Login</h3>
        </div>
        <div class="row mt-5 justify-content-center">
            <div class="col-md-6">
                <div class="card border-dark" style=" height: 25rem; background-color:silver;">
                @if(Session::has('error'))
                <div class="alert alert-danger" role="alert">
                {{ session::get('error')}}
                </div>
                @endif
                    <div class="card-body text-white">
                        <div class="row justify-content-center mt-5">
                            <div class="col-lg-6 ">
                    <form action="{{ route('admin.login.submit') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-forms.input type="email" name="email" label="Email" :value="old('email')" required placeholder="Enter your email" />              
                   
                    <x-forms.input type="password" name="password" label="Password" :value="old('password')" required placeholder="Enter your password" />              
                    <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Login</button>
                    </div>
                </form>
            </div>
        </div>
            </div>
        </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>


