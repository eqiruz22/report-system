@extends('layouts/template')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Table User</h1>
    <a href="/user/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
      <i class="fas fa-plus fa-sm text-white-50"></i> Create New User
    </a>
</div>
<div class="mb-2 mt-2">
    @if (session('success'))
    <div class="alert alert-success">
      <strong>{{ session('success') }}</strong>
    </div>
    @endif
</div>
<form action="/user">
  <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Search..." autocomplete="off" name="search" value="{{ request('search') }}">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="submit">
        <i class="fas fa-search"></i>
      </button>
    </div>
  </div>
</form>
<table class="table">
    <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">NAME</th>
          <th scope="col">JOB TITLE</th>
          <th scope="col">EMAIL</th>
          <th scope="col">ACTION</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $item->name }}</td>
        <td>{{ $item->title['title'] }}</td>
        <td>{{ $item->email }}</td>
        <td>
          <div class="btn-group-sm" role="group">
            <a href="/user/edit/{{ $item->id }}" class="d-flext badge badge-primary border-0" style="background-color: darkgray; color:black"><i class="fas fa-edit"></i> Edit</a>
            <a href="#" data-id="{{ $item->id }}" class="d-flext badge badge-danger border-0 delete-data-user" style="color: black; background-color: darkgray"><i class="fas fa-trash"></i> Delete</a>
            <a href="/user/edit-password/{{ $item->id }}" class="d-flext badge badge-primary border-0" style="background-color: darkgray; color:black"><i class="fas fa-lock"></i> Change Password</a>                                        
        </div>
        </td>
      </tr>
      @endforeach
    </tbody>
</table>
<div class="mb-2 mt-2">
  {{ $data->links() }}
</div>
@endsection