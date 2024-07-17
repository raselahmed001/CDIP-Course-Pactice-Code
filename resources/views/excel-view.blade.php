<!DOCTYPE html>
<html>
<head>
    <title>Excel Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Excel Data</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    @if(!empty($data) && count($data) > 0)
                        @foreach($data[0] as $cell)
                            <th>{{ $cell }}</th>
                        @endforeach
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($data as $row)
                    <tr>
                        @foreach($row as $cell)
                            <td>{{ $cell }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
