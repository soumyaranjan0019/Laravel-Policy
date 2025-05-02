<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body class="bg-dark text-light">
    <div class="container my-3">
        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')

                <div class="row">
                    <div class="col">
                        <label for="">Title</label>
                        <input type="text" value="{{ $book->title }}" name="title" class="form-control" id="" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="">Price</label>
                        <input type="text" value="{{ $book->price }}" name="price" class="form-control" id="" required>
                    </div>
                </div>

                <input type="submit" class="btn btn-success my-3">
        </form>
    </div>

</body>
</html>
