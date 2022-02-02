@extends('layouts/template')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Table Progres Projects</h1>
    <a href="/progres-project/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
      <i class="fas fa-plus fa-sm text-white-50"></i> Create Progres Project
    </a>
</div>
<div class="mb-2 mt-2">
    @if (session('success'))
    <div class="alert alert-success">
      <strong>{{ session('success') }}</strong>
    </div>
    @endif
</div>
<form action="/progres-project">
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
          <th scope="col">PRJ</th>
          <th scope="col">NO RPO</th>
          <th scope="col">RPO</th>
          <th scope="col">DELIVER</th>
          <th scope="col">BAST</th>
          <th scope="col">DOC RPO</th>
          <th scope="col">DOC BAST</th>
          <th scope="col">ACTION</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)    
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $item->user['name'] }}</td>
      <td>{{ $item->report['prj'] }}</td>
      <td>{{ $item->no_rpo }}</td>
      <td>{{ $item->rpo }}</td>
      <td>{{ $item->deliver_barang }}</td>
      <td>{{ $item->bast }}</td>
      <td>{{ $item->file_rpo }}</td>
      <td>{{ $item->file_bast }}</td>
      {{-- <td>{{ Str::limit($item->remarks, 25) }}</td> --}}
      <td>
        <div class="btn-group-sm" role="group">
          <a href="/progres-project/edit/{{ $item->id }}" class="d-flext badge badge-primary border-0" style="background-color: darkgray; color:black"><i class="fas fa-edit"></i> Edit</a>                    
          <a href="#" data-id="{{ $item->id }}" class="d-flext badge badge-danger border-0 delete-data-progres-project" style="color: black; background-color: darkgray"><i class="fas fa-trash"></i> Delete</a>
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