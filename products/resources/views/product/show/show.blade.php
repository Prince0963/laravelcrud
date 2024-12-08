<!DOCTYPE html>
<html>
<body>

<h2>products Detail</h2>


<h4>ID: {{$product->id}}</h4>
<h4>Product Name: {{$product->name}}</h4>
<h4>product Image: <img src="{{ Storage::url($product->image) }}" style="width: 100px; height: auto;"></h4>


<a href="{{route('products.index')}}">Back</a>


</body>
</html>

