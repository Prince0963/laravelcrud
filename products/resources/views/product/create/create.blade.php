<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

    <h2>Product Form</h2>

    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Product Name:</label><br>
        <input type="text" id="name" name="name" value="{{old('name')}}" class="@error('name') is-invalid @enderror"><br>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>

        <label for="description">Product Description:</label><br>
        <input type="text" id="description" name="description" value="{{old('description')}}" class="@error('description') is-invalid @enderror"><br>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>


        <label for="image">Product Image:</label><br>
        <input type="file" id="image" name="image" value="{{old('image')}}" class="@error('image') is-invalid @enderror"><br>
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>

        <input type="submit" value="Submit">
        <a href="{{route('products.index')}}">Back</a>
    </form>

</body>

</html>