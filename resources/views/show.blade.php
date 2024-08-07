<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <style>
        body{
            height: 100vh;
        }
    </style>
</head>
<body class="bg-white d-flex align-items-center justify-content-center">
    <div class="col-md-7 px-3">
        <form action="#" class="mb-3" autocomplete="off">
            <fieldset class="border p-4 rounded">
                <legend class="float-none w-auto p-2">Contact Details</legend>

                <div class="container">
                    <h2 class="text-dark mb-3">{{$contact->name}}</h2>
                    <p class="m-0 text-muted">Email : {{ $contact->email }}</p>
                    <p class="m-0 text-muted">Phone : {{ $contact->phone }}</p>
                    <p class="m-0 text-muted">Address : {{ $contact->address }}</p>
                </div>
            </fieldset>
        </form>

            @if(Session::has('errors'))
                <div class="alert alert-danger" role="alert">
                    {{session('errors')}}
                </div>
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
