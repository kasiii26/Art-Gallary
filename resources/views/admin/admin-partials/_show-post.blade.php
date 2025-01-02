@if (Session::has('success'))
    <span class="alert alert-success p-2">{{ Session::get('success') }}</span>
@endif
@if (Session::has('fail'))
    <span class="alert alert-danger p-2">{{ Session::get('fail') }}</span>
@endif
<div class="card-body">
    <table class="table table-sm table-striped table-bordered">
        <thead>
            <th>S/N</th>
            <th>Image</th>
            <th>Description</th>
            <th>Category</th>
            <th>Post Time</th>
            <th>Last Update</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @if (count($all_users) > 0)
                @foreach ($all_users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->image }}</td>
                        <td>{{ $user->description }}</td>
                        <td>{{ $user->category }}</td>
                        <td>{{ $user->post_time }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td>
                            @if (Auth::check() && Auth::user()->id == $user->user_id)
                                <a href="/edit/{{ $user->id }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="/delete/{{ $user->id }}" class="btn btn-danger btn-sm">Delete</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8">No User Found!</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>