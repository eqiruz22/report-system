@extends('layouts/template')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Table Documents</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#uploadModal">
      <i class="fas fa-upload fa-sm text-white-50"></i> Upload Documents
    </a>
</div>
<div class="mb-2 mt-2">
    @if (session('success'))
    <div class="alert alert-success">
      <strong>{{ session('success') }}</strong>
    </div>
    @endif
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Docs</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->name }}</td>
            <td><a href="/storage/docs-store/{{ $item->filedocs }}">{{ $item->filedocs }}</a></td>
            <td>
                <div class="btn-group-sm" role="group">
                    <a href="#" data-id="{{ $item->id }}" class="d-flext badge badge-danger border-0 delete-data-document" style="color: black; background-color: darkgray"><i class="fas fa-trash"></i> Delete</a>
                    <a href="/document/edit/{{ $item->id }}" class="d-flext badge badge-danger border-0" style="color: black; background-color: darkgray"><i class="fas fa-edit"></i> Edit</a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- upload Modal-->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Upload Documents</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="/document/upload" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
            <div class="form-group mb-3">
                <label for="filedocs" class="form-label">Document</label>
                <input type="file" class="form-control form-control-sm @error('filedocs') is-invalid @enderror" name="filedocs" id="filedocs">
                @if ($errors->has('filedocs'))
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('filedocs') }}</strong>
                </span>
            @endif
            </div>
            <div class="form-group mb-3 mt-3">
                <label for="name">File Name</label>
                <input type="text" class="form-control form-control-sm" name="name" id="name">
            </div>
        </div>
        <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Upload</button>
            </div>
        </div>
    </form>
</div>
</div>
@endsection

