<!DOCTYPE html>
<html>
    <head>
        <title>Product List</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <div class="container">
            <br>
            <a href="{{URL::asset('/products/create')}}" target="blank" class="btn btn-warning">Create Product</a>
            <br>
            <br>
            @foreach (['danger', 'warning', 'success', 'info'] as $key)
                @if(Session::has($key))
                    <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
                @endif
            @endforeach
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Picture</th>
                        <th>@sortablelink('name')</th>
                        <th>@sortablelink('price')</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>
                            <a href="{{action('ProductController@show', $product['id'])}}" target="_blank">
                                <img src="{{asset('storage/products/'.$product['picture'])}}" alt="{{$product['picture']}}" height="50" width="50">
                            </a>
                        </td>
                        <td>
                            <a href="{{action('ProductController@show', $product['id'])}}" target="_blank">
                                {{$product['name']}}
                            </a>
                        </td>
                        <td>{{$product['price']}}</td>
                        <td>
                            <a href="{{action('ProductController@edit', $product['id'])}}" target="_blank" class="btn btn-success">
                                Edit
                            </a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirmModal{{$product['id']}}">
                                Delete
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $products->links()}}
        </div>
        
        @foreach($products as $product)
            <div class="modal fade" id="deleteConfirmModal{{$product['id']}}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmModal{{$product['id']}}Label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteConfirmModal{{$product['id']}}Label">Confirm</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Please confirm to delete product </p>
                        </div>
                        <div class="modal-footer">
                                <form action="{{action('ProductController@destroy', $product['id'])}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-secondary" type="submit">Delete</button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>