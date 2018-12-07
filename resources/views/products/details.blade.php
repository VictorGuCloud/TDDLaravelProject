<!DOCTYPE html>
<html>
    <head>
        <title>Product Details</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <div class="container">
            <br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Product Picture</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="{{asset('storage/products/'.$product['picture'])}}" alt="{{$product['picture']}}" height="250" width="250"></td>
                        <td>{{$product['name']}}</a></td>
                        <td>{{$product['price']}}</td>
                        <td>{{$product['description']}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>