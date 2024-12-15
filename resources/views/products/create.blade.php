<!-- resources/views/products/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
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
        input, select {
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
    <h1>Create Product</h1>

    <form action="{{ route('products.store') }}" method="POST" onsubmit="disableSubmitButton(this)">

        @csrf
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}">
        @if ($errors->has('name'))
            <p style="color: red;">{{ $errors->first('name') }}</p>
        @endif

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" value="{{ old('price') }}" step="0.01">
        @if ($errors->has('price'))
            <p style="color: red;">{{ $errors->first('price') }}</p>
        @endif

        <label for="category_id">Category:</label>
        <select id="category_id" name="category_id">
            <option value="" disabled selected>Select a category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('category_id'))
            <p style="color: red;">{{ $errors->first('category_id') }}</p>
        @endif

        <button type="submit">Create Product</button>
    </form>

    <a href="{{ route('products.index') }}">Back to Products</a>
</body>
</html>


<script>
    function disableSubmitButton(form) {
        const button = form.querySelector('button[type="submit"]');
        button.disabled = true;
        button.textContent = 'Creating...';
    }
</script>