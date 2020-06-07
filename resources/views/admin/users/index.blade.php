@extends('layouts.app')

@section('content')
<!-- Basic Card Example -->
<div class="col-9">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
    </div>
    <div class="card-body">
    <table class="table">
                        <thead>
                        <tr>
                            <th class="scope">#</th>
                            <th class="scope">Nama</th>
                            <th class="scope">NIS</th>
                            <th class="scope">Akses</th>
                            <th class="scope">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ implode(', ',$user->roles()->get()->pluck('name')->toArray()) }}</td>
                                <td>
                                @can('edit-users')
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary float-left btn-sm">Edit</a>
                                @endcan
                                @can('delete-users')
                                    <form action="{{route('admin.users.destroy', $user)}}" method="post" class="float-left ml-1">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-warning btn-sm">Delete</button>
                                    </form>
                                @endcan
                                <td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
    </div>
</div>
</div>
@endsection
