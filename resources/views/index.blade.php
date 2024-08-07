<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body class="bg-white">
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
    <div class="w-100 px-3">
        <form action="" autocomplete="off">
            <fieldset class="border p-2">
                <legend class="float-none w-auto p-2">Searching & sorting</legend>

                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control" name="search" id="" placeholder="Search with name or email" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <select class="form-control" name="sort" id="">
                                <option >Sort By</option>
                                <option value="name">Name</option>
                                <option value="date">Date</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-danger">Search</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>

    <div class="mt-5 px-3">
        <div class="d-flex align-items-center justify-content-between">
            <h3>Contact List</h3>
            <a class="btn btn-success" href="/contacts/create">Create New</a>
        </div>
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Sl. No</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @if($contacts)
                    @foreach ($contacts as $contact)
                        <tr>
                            <th scope="row">{{ $contact->id }}</th>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <a href="/contacts/{{ $contact->id }}" class="btn btn-secondary">view</a>
                                    <a href="/contacts/{{ $contact->id }}/edit" class="btn btn-dark">Edit</a>
                                    <a href="/contacts/{{ $contact->id }}/delete" class="btn btn-danger">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
          </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
</body>

</body>
</html>
