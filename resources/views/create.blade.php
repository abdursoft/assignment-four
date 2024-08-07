<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <style>
        body{
            height: 100vh;
        }
    </style>
</head>
<body class="bg-white d-flex align-items-center justify-content-center">
    <div class="col-md-7 px-3">
        <form action="/contacts" class="mb-3" autocomplete="off" method="post">
            <fieldset class="border p-4 rounded">
                <legend class="float-none w-auto p-2">Create Contact</legend>

                <div class="form-group">
                    <input type="text" class="form-control" name="name" id="" placeholder="Your Full name here">
                </div>
                <div class="row my-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" id="" placeholder="Email address">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone" id="" placeholder="Phone number">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="address" id="" placeholder="Enter Your mailing address">
                </div>
                @csrf
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-block w-100 btn-danger">Create</button>
                </div>
            </fieldset>
        </form>

            @if(Session::has('errors'))
                @if(is_object(session('errors')))
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                      </div>
                    @endforeach
                @else
                    <div class="alert alert-danger" role="alert">
                       {{session('errors')}}
                    </div>
                @endif
            @endif
          @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
          @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
</body>

</body>
</html>
