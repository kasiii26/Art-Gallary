<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        
        <br>
        <br>
        <br>
       
        <div class="card">
            <div class="card-hearder"><h3>Add New User</h3></div>
            @if (Session::has('success'))
                <span class="alert alert-success p-2">{{Session::get('success')}}</span>
            @endif
            <div class="card-body">
                <form action="{{ route('AddUser')}}" method="post">
                    @csrf
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Full Name</label>
                    <input type="text" name="full_name" value="{{old('full_name')}}" class="form-control" id="formGroupExampleInput" placeholder="Enter Full Name">
                    @error('full_name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Email</label>
                    <input type="email" name="email" value="{{old('email')}}" class="form-control" id="formGroupExampleInput2" placeholder="Enter your email">
                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Phone Number</label>
                    <input type="number" name="phone_number" value="{{old('phone_number')}}" class="form-control" id="formGroupExampleInput2" placeholder="Enter your phone number">
                    @error('phone_number')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Password</label>
                    <input type="password" name="password"  class="form-control" id="formGroupExampleInput2" placeholder="Enter your password">
                    @error('password')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="formGroupExampleInput2" placeholder="Confrim password">
                    @error('password_confirm')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('users.users') }}" class="btn btn-secondary">Back</a>
                    </div>
                </form>

                </form>

            </div>
        </div>
    </div>
</body>
</html>