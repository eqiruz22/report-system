@extends('layouts/template')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Table Reports</h1>
  <a href="/create-report" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    <i class="fas fa-plus fa-sm text-white-50"></i> Create Report
  </a>
</div>
<div class="mb-2 mt-2">
@if (session('success'))
<div class="alert alert-success">
  <strong>{{ session('success') }}</strong>
</div>
@endif
</div>
<form action="/table">
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
          <th scope="col">SALES</th>
          <th scope="col">PRJ</th>
          <th scope="col">PROJECT TITLE</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($data as $item)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $item->user['name'] }}</td>
          <td>{{ $item->prj }}</td>
          <td>{{ $item->project_title }}</td>
          <td>
            <div class="btn-group-sm" role="group">
                <a href="/report/{{ $item->id }}/edit" class="d-flext badge badge-primary" style="background-color: darkgray; color:black"><i class="fas fa-edit"></i> Edit</a>                
                <a href="#" data-id="{{ $item->id }}" class="d-flext badge badge-danger border-0 delete" style="color: black; background-color: darkgray"><i class="fas fa-trash"></i> Delete</a>
            </div>
          </td>
        </tr>
        @empty
       <div>
           <tr>
               <td colspan="100%" class="text-center"><span style="color: black">No Data Report !!</span></td>
           </tr>
       </div>
        @endforelse
      </tbody>    
</table>
<div class="mb-2 mt-2">
  {{ $data->links() }}
</div>
@endsection
