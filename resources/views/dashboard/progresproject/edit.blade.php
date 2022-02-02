@extends('layouts/template')

@section('content')
    <form action="/progres-project/update/{{ $data->id }}" method="POST" id="create_form">
        @method('put')
        @csrf
        @auth
            <input type="hidden" name="user_id" value={{ old('user_id',auth()->user()->id) }}>
        @endauth
        <div class="mb-3">
            <label for="prj">PRJ</label>
            <select class="form-control form-control-sm @error('report_id') is-invalid @enderror" name="report_id" id="report_id">
                <option value="">-- Choose one --</option>
                @foreach ($list as $item)
                    @if (old('report_id', $data->report_id == $item->id))
                    <option value="{{ $item->id }}" selected>{{ $item->prj }}</option>
                    @else
                    <option value="{{ $item->id }}">{{ $item->prj }}</option>
                    @endif
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
            <input type="text" class="form-control form-control-sm @error('no_rpo') is-invalid @enderror" id="no_rpo" name="no_rpo" value="{{ old('no_rpo', $data->no_rpo) }}">
            @if($errors->has('no_rpo'))
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('no_rpo') }}</strong>
                </span>
            @endif
        </div>
        <div class="mb-3">
            <label for="rpo" class="form-label">RPO</label>
            <input type="date" class="form-control form-control-sm @error('rpo') is-invalid @enderror" id="rpo" name="rpo" value="{{ old('rpo', $data->rpo) }}">
            @if($errors->has('rpo'))
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('rpo') }}</strong>
                </span>
            @endif
        </div>
        <div class="mb-3">
            <label for="deliver_barang" class="form-label">DELIVER BARANG</label>
            <input type="date" class="form-control form-control-sm @error('deliver_barang') is-invalid @enderror" id="deliver_barang" name="deliver_barang" value="{{ old('deliver_barang', $data->deliver_barang) }}">
            @if($errors->has('deliver_barang'))
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('deliver_barang') }}</strong>
                </span>
            @endif
        </div>
        <div class="mb-3">
            <label for="bast" class="form-label">BAST</label>
            <input type="date" class="form-control form-control-sm @error('bast') is-invalid @enderror" id="bast" name="bast" value="{{ old('bast', $data->bast) }}">
            @if($errors->has('bast'))
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('bast') }}</strong>
                </span>
            @endif
        </div>
        <div class="mb-3">
            <label for="file_rpo" class="form-label">FILE RPO</label>
            <input type="hidden" name="oldRpo" value="{{ $data->file_rpo }}">
            <input type="file" class="form-control form-control-sm @error('file_rpo') is-invalid @enderror" name="file_rpo" value="{{ old('file_rpo', $data->file_rpo) }}">
            @if($errors->has('file_rpo'))
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('file_rpo') }}</strong>
                </span>
            @endif
        </div>
        <div class="mb-3">
            <label for="file_bast" class="form-label">FILE BAST</label>
            <input type="hidden" name="oldBast" value="{{ $data->file_bast }}">
            <input type="file" class="form-control form-control-sm @error('file_bast') is-invalid @enderror" name="file_bast" value="{{ old('file_bast', $data->file_bast) }}">
            @if($errors->has('file_bast'))
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('file_bast') }}</strong>
                </span>
            @endif
        </div>
        <div class="mb-3">
            <label for="remarks" class="form-label">REMARKS</label>
            <textarea name="remarks" class="form-control form-control-sm" cols="30" rows="10">{{ old('remarks', $data->remarks) }}
            </textarea>
            @if($errors->has('remarks'))
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('remarks') }}</strong>
                </span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary mb-2">Save</button>
    </form>
@endsection