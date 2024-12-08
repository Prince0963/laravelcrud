<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>

    <h2>Product Details</h2>

    <a href="{{route('products.create')}}">Create</a>


    <table>
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Product Description</th>
            <th>Product Image</th>
            <th>Action</th>
        </tr>
        @foreach($datalist as $data)
        <tr>
            <td>{{$data->id}}</td>
            <td>{{$data->name}}</td>
            <td>{{$data->description}}</td>
            <td><img src="{{Storage::url($data->image)}}" style="width: 100px; height: auto;" alt=""></td>
            <td>
                <a href="{{route('products.show', $data->id)}}">Show</a>
                <a href="{{route('products.edit', $data->id)}}">Edit</a>
                <form action="{{route('products.destroy', $data->id)}}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

</body>

</html>