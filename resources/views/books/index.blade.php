<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

<div class="container-fluid">

    <div class="row">
        <div class="col">
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>


    <div class="row">
        <div class="col-6 my-3">
            <h2>Welcome, {{ Auth::user()->name }}</h2><br>
            <h2>Users List</h2>
        </div>

        <div class="col-6 my-3" align="right">
            <a href="{{ route('books.create') }}" class="btn btn-primary btn-md mx-1">Create</a>

            <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <table class="table" border="1px">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Price</th>
            <th scope="col">User ID</th>
            <th scope="col">View</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>

        @foreach($books as $books)

        <tbody>
          <tr>
            <th>{{ $books->id }}</th>
            <td>{{ $books->title}}</td>
            <td>{{ $books->price}}</td>
            <td>{{ $books->user_id}}</td>

            {{-- @unless (Auth::user()->can('update', $books->id))
                Hey!
            @endunless --}}

            {{-- @can('update', $books->id) --}}
                <td><a href="{{ route('books.show', $books->id) }}" class="btn btn-success">View</a></td>
                <td><a href="{{ route('books.edit', $books->id) }}" class="btn btn-warning">Update</a></td>
            {{-- @else
                <h6>You are not authorized</h6>
            @endcan --}}

            {{-- @can('delete', $books->id) --}}

                <td>
                    <form action="{{ route('books.destroy', $books->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-dark" onclick="return confirm('Do you want to delete this record ?');">Delete</button></form>
                </td>
                
            {{-- @else
                <h6>You are not authorized</h6>
            @endcan --}}

          </tr>
        </tbody>

        @endforeach

      </table>

{{-- Pagination --}}
      {{-- <div class="mt-3">
        {{ $users->links() }}
      </div> --}}


    </div>
</body>
</html>
