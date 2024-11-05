<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracking Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }
        h2 {
            color: #555;
            font-size: 20px;
            margin-top: 20px;
            margin-bottom: 10px;
        }
        p {
            color: #666;
            line-height: 1.5;
            margin: 5px 0;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background-color: #f1f1f1;
            margin: 5px 0;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            color: #444;
        }
        strong {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your Package Tracking Details</h1>
        <p><strong>Tracking Number:</strong> {{ $trackers->tracking_number }}</p>
        <p><strong>Sender:</strong> {{ $trackers->senders_name }}</p>
        <p><strong>Receiver:</strong> {{ $trackers->receivers_name }}</p>
        <p><strong>Sent on:</strong> {{ $trackers->sent_date }}</p>
        <p><strong>Expected on:</strong> {{ $trackers->arrival_date }}</p>

        <h2>Tracking Events:</h2>
        <ul>
            @foreach($tracking_events as $event)
                <li>{{ $event->status }} - {{ $event->date_updated }}</li>
            @endforeach
        </ul>
    </div>
</body>
</html>
