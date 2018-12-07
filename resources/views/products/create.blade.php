<!DOCTYPE html>
<html>
    <head>
        <title>Product Create</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <div class="container">
            <br>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="Name">Name:</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="Price">Price:</label>
                        <input type="text" class="form-control" name="price">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="Description">Description:</label>
                        <input type="text" class="form-control" name="description">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <input type="file" name="picture">    
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>