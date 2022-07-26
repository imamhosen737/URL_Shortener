<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>URL Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h3 class="text-center text-success mt-3">Short Link Generate Project</h3>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <form method="POST" action="{{ route('generate_link') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="link" class="form-control" placeholder="Enter URL"
                            aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">

                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif

                <table class="table table-bordered table-sm text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>SL</th>
                            <th>Short Link</th>
                            <th>Link</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($short as $k => $sl)
                            <tr>
                                <td>{{ ++$k }}</td>
                                <td><a href="{{ route('goto_link', $sl->code) }}"
                                        target="_blank">{{ route('goto_link', $sl->code) }}</a>
                                </td>
                                <td>{{ $sl->link }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <span>
                    {{$short->links()}}
                </span>
            </div>
        </div>

    </div>

    <style type="text/css">
        .w-5{
            display: none;
        }
    </style>
</body>

</html>
