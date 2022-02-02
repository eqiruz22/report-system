@extends('layouts/template')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Table Title</h1>
    <a href="/title/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
      <i class="fas fa-plus fa-sm text-white-50"></i> Create Title
    </a>
</div>
<table class="table">
    <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">NAME TITLE</th>
          <th scope="col">ACTION</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $item->title }}</td>
        <td>
          <div class="btn-group-sm" role="group">
                            
            <a href="#" data-id="{{ $item->id }}" class="d-flext badge badge-danger border-0 delete-data-title" style="color: black; background-color: red"><i class="fas fa-trash"></i> Delete</a>
        </div>
        </td>
      </tr>
      @endforeach    
    </tbody>
</table>
@endsection