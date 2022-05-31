<!DOCTYPE html>
<html>
<head>
    <title>subdomain</title>
</head>
<body>
    <h1>{{ $data['name'] ?? null }}</h1>
    <p>{{ $data['email'] ?? null}}</p>
    <p>{{ $data['subject'] ?? null}}</p>
    <p>{{ $data['phone'] ?? null}}</p>
    <p>{{ $data['service'] ?? null}}</p>
    <p>{{ $data['message'] ?? null}}</p>
    <p>{{ $data['location'] ?? null}}</p>
    <p>Thank you</p>
</body>
</html>