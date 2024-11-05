<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Courier List</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Optional CSS -->
</head>
<body>
    <h1>Courier List</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tracking Number</th>
                <th>Sender Name</th>
                <th>Receiver Name</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trackers as $tracker)
                <tr>
                    <td>{{ $tracker->id }}</td>
                    <td>{{ $tracker->tracking_number }}</td>
                    <td>{{ $tracker->senders_name }}</td>
                    <td>{{ $tracker->receivers_name }}</td>
                    <td>{{ $tracker->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
