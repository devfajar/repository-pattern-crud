@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-2 mb-2" style="font-weight: 700">Repository Design Pattern in Laravel 9 With User CRUD - Laravelia</div>
                <div class="card">
                    <div class="card-header" style="background: gray; color:#f1f7fa; font-weight:bold;">
                        User List
                        <a href="{{ route('user.create') }}" class="btn btn-success btn-xs py-0 float-end">+ Create New</a>
                    </div>
                    @if(session('message'))
                        <div class="alert alert-{{ session('status') }} alert-dismissible fade show" role="alert">
                            <strong>{{ session('message') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-body">
                        <table class="table-responsive" style="width: 100%">
                            <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    {{-- <td>
                                        @if($user->image)
                                        <img src="{{ asset('storage/images/'.$user->image) }}" style="height: 50px;width:100px;">
                                        @else
                                        <span>No image found!</span>
                                        @endif
                                    </td> --}}
                                    <td><a href="{{ route('user.edit',$user->id) }}" class="btn btn-success btn-xs py-0">Edit</a></td>
                                    <td><a href="{{ route('user.show',$user->id) }}" class="btn btn-secondary btn-xs py-0">Show</a></td>
                                    <td>
                                        <form method="POST" action="{{ route('user.destroy',$user->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-xs py-0 text-white">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <center class="mt-5">
                            {{  $users->links() }}
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
