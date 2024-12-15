<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
</head>
<body>
    <h1>Welcome to the Laravel Project</h1>
    <ul>
        <li><a href="{{ route('categories.index') }}">View Categories</a></li>
        <li><a href="{{ route('products.index') }}">View Products</a></li>
    </ul>
</body>
</html>
