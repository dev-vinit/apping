<!-- resources/views/categories/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>
    <style>
        form {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 15px;
            background-color: blue;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: darkblue;
        }
        a {
            display: block;
            margin-top: 15px;
            text-decoration: none;
            color: blue;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Edit Category</h1>
    
    <form action="{{ route('categories.update', $category->id) }}" method="POST" onsubmit="disableSubmitButton(this)">
        @csrf
        @method('PUT')
        <label for="name">Category Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}">
        
        @if ($errors->has('name'))
            <p style="color: red;">{{ $errors->first('name') }}</p>
        @endif

        <button type="submit">Update Category</button>
    </form>

    <a href="{{ route('categories.index') }}">Back to Categories</a>
</body>
</html>

<script>
    function disableSubmitButton(form) {
        const button = form.querySelector('button[type="submit"]');
        button.disabled = true;
        button.textContent = 'Updating...';
    }
</script>