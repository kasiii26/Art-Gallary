<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
        <div class="container">
            <br>
            <br>
            <div class="card">
                <div class="card-header">
                    Art Gallary Users
                    <a href="/add/user" class="btn btn-success btn-sm float-end"> Create Post</a>
                </div>
                @if (Session::has('success'))
                <span class="alert alert-success p-2">{{Session::get('success')}}</span>
                @endif
                @if (Session::has('fail'))
                <span class="alert alert-danger p-2">{{Session::get('fail')}}</span>
                @endif
                <div class="card-body">
                    <table class="table table-sm table-dtriped table-bordered">
                        <thead>
                            <th>S/N</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Post Time</th>
                            <th>Last Update</th>
                            <th colspan="2">Action</th>

                        </thead>
                        <tbody>
                            @if (count($all_users) > 0)
                               @foreach ($all_users as $user)
                               <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$user->image}}</td>
                                <td>{{$user->description}}</td>
                                <td>{{$user->category}}</td>\
                                <td>{{$user->post_time}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>{{$user->updated_at}}</td>
                                
                                <td>
                                </td>
                                <td><a href="/edit/{{$user->id}}" class="btn btn-primary btn-sm">Edit</td>
                                <td><a href="/delete/{{$user->id}}" class="btn btn-danger btn-sm">Delete</td>

                               </tr>
                               @endforeach
                               @else
                               <tr>
                                   <td colspan ="8"> No User Found!</td>
                               </tr>
                               @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</body>
</html>