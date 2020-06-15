<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nested Menu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 mt-4">
                <div class="card">
                    <div class="card-header">
                    <h3>Nested Menu </h3>
                    </div>
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">

                            <h5 class="mb-4 text-center bg-success text-white ">Add New Menu</h5>

                            @if (Session::has('success'))
                                <div class="alert alert-success  alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ Session::get('success') }}</strong>
                                </div>
                            @endif
                            @if (Session::has('error'))
                                <div class="alert alert-danger  alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ Session::get('error') }}</strong>
                                </div>
                            @endif
                            <form accept="{{ route('menu')}}" method="post">
                                @csrf
                                


                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control ">
                                        @error('name')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Parent</label>
                                        <select class="form-control" name="parent">
                                            <option selected disabled>Select Parent Menu</option>
                                            @foreach($allMenus as $key => $value)
                                                <option value="{{ $key }}">{{ $value}}</option>
                                            @endforeach
                                        </select>
                                        @error('parent')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-success">Save</button>
                                </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-center mb-4 bg-info text-white">Menu List</h5>
                            <ul id="tree">
                                @foreach($menus as $menu)
                                    <li>
                                        <h5>{{ $menu->name }}</h5>
                                        @if(count($menu->childs))
                                            @include('menuchild',['childs' => $menu->childs])
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</html>
