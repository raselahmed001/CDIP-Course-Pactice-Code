<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" />
    <title>Laravel Excel</title>
</head>
<body>
    <div class="bg-dark py-3">
        <div class="container">
            <h1 class="text-white">Laravel Excel</h1>
        </div>
    </div>
    <div class="container py-2">
        <div class="d-flex justify-content-between">
            <form action="{{ route('students.index') }}" method="get" class="d-flex">
                <input value="{{ Request::get('keyword') }}" type="text" class="form-control me-2" name="keyword" id="keyword" placeholder="Keyword">
                <button class="btn btn-outline-info">Search</button>
            </form>
            <div>
                @if(route('students.index') )
                <a class="btn btn-primary" href="{{ route('students.export'). '?keyword='.Request::get('keyword') }}">Download Excel</a>
                @else
                <a class="btn btn-primary" href="{{ route('students.export') }}">Download Excel</a>

                @endif
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Created Date</th>
                </tr>
            </thead>
            <tbody>
                @if($students->isNotEmpty())
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->address }}</td>
                            <td>{{ $student->created_at }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">No students found</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>
</html>
