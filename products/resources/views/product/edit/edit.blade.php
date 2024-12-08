<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>

    <h2>Product Form</h2>

    <form action="{{route('products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="name">Product Name:</label><br>
        <input type="text" id="name" name="name" value="{{$product->name}}" class="@error('name') is-invalid @enderror"><br>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>

        <label for="description">Product Description:</label><br>
        <input type="text" id="description" name="description" value="{{$product->description}}" class="@error('description') is-invalid @enderror"><br>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>

        <label for="image">Product Image:</label><br>
        <input type="file" id="image" name="image" value="{{$product->image}}" class="@error('image') is-invalid @enderror">
        <img src="{{ Storage::url($product->image) }}" style="width: 100px; height: auto;">
        <br>
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>

        <input type="submit" value="Submit">
        <a href="{{route('products.index')}}">Back</a>

    </form>

</body>

</html>