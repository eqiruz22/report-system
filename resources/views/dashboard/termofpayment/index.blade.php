@extends('layouts/template')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Table Finance</h1>
    <a href="/term-of-payment/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
      <i class="fas fa-plus fa-sm text-white-50"></i> Create New Data
    </a>
</div>
<div class="mb-2 mt-2">
    @if (session('success'))
    <div class="alert alert-success">
      <strong>{{ session('success') }}</strong>
    </div>
    @endif
</div>
<form action="/term-of-payment">
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
          <th scope="col">TANGGAL INVOICE</th>
          <th scope="col">REMARKS FINANCE</th>
          <th scope="col">ACTION</th>
        </tr>
    </thead>
        <tbody>
          @foreach ($data as $item)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $item->user['name'] }}</td>
            <td>{{ $item->report['prj'] }}</td>
            <td>{{ $item->tanggal_invoice }}</td>
            <td>{{ Str::limit($item->remarks_finance,25) }}</td>
            <td>
                <div class="btn-group-sm" role="group">
                    <a href="/term-of-payment/edit/{{ $item->id }}" class="d-flext badge badge-primary border-0" style="background-color: darkgray; color:black"><i class="fas fa-edit"></i> Edit</a>                    
                    <a href="#" data-id="{{ $item->id }}" class="d-flext badge badge-danger border-0 delete-data-term" style="color: black; background-color: darkgray"><i class="fas fa-trash"></i> Delete</a>
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

