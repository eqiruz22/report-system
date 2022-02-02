@extends('layouts/template')

@section('content')
    <form action="/progres-project/store" method="POST" id="create_form" enctype="multipart/form-data">
        @csrf
        @auth
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        @endauth
        <div class="mb-3">
            <label for="prj" class="form-label">PRJ</label>
            <select name="report_id" id="report_id" class="form-control form-control-sm @error('report_id') is-invalid @enderror">
                <option value="">-- Choose one --</option>
                @foreach ($data as $item)
                    <option value="{{ $item->id }}">{{ $item->prj }}</option>
                @endforeach
            </select>
            @if($errors->has('report_id'))
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('report_id') }}</strong>
                </span>
            @endif
        </div>
        <div class="mb-3">
            <label for="no_rpo" class="form-label">NOMOR RPO</label>
            <input type="text" class="form-control form-control-sm @error('no_rpo') is-invalid @enderror" id="no_rpo" name="no_rpo" value="{{ old('no_rpo') }}">
            @if ($errors->has('no_rpo'))
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('no_rpo') }}</strong>
                </span>
            @endif
        </div>
        <div class="mb-3">
            <label for="rpo" class="form-label">RPO</label>
            <input type="date" class="form-control form-control-sm @error('rpo') is-invalid @enderror" id="rpo" name="rpo">
            @error('rpo')
            <div class="invalid-feedback d-block">
                <strong>{{ $message }}</strong>  
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="deliver_barang" class="form-label">DELIVER BARANG</label>
            <input type="date" class="form-control form-control-sm @error('deliver_barang') is-invalid @enderror" id="deliver_barang" name="deliver_barang">
            @error('deliver_barang')
            <div class="invalid-feedback d-block">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="bast" class="form-label">BAST</label>
            <input type="date" class="form-control form-control-sm @error('bast') is-invalide @enderror" id="bast" name="bast">
            @error('bast')
            <div class="invalid-feedback d-block">
                <strong>{{ $message }}</strong>
            </div>
                
            @enderror
        </div>
        <div class="mb-3">
            <label for="file_rpo" class="form-label">FILE RPO</label>
            <input type="file" class="form-control form-control-sm @error('file_rpo') is-invalid @enderror" name="file_rpo" value="{{ old('file_rpo') }}">
            @if ($errors->has('file_rpo'))
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $errors->first('file_rpo') }}</strong>
                </span>
            @endif
        </div>
        <div class="mb-3">
            <label for="file_bast" class="form-label">FILE BAST</label>
            <input type="file" class="form-control form-control-sm @error('file_bast') is-invalid @enderror" name="file_bast" value="{{ old('file_bast') }}">
            @if ($errors->has('file_bast'))
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $errors->first('file_bast') }}</strong>
                </span>
            @endif
        </div>
        <div class="mb-3">
            <label for="remarks" class="form-label">REMARKS</label>
            <textarea name="remarks" class="form-control form-control-sm" cols="30" rows="10">{{ old('remarks') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Create</button>
    </form>
@endsection

