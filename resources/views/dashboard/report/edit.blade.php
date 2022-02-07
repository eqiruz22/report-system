@extends('layouts/template')

@section('content')
    <form action="/report/update/{{ $data->id }}" method="POST" id="create_form">
        @method('put')
        @csrf
        @auth
            <input type="hidden" class="form-control form-control @error('user_id') is-invalid @enderror" name="user_update_id" value="{{ old('user_id', auth()->user()->id) }}">
        @endauth
        <div class="mb-3">
            <label for="prj" class="form-label">PRJ *</label>
            <input type="text" class="form-control form-control-sm @error('prj') is-invalid @enderror" id="prj" name="prj" value="{{ old('prj', $data->prj) }}">
            @if ($errors->has('prj'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('prj') }}</strong>
            </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="file_rpo" class="form-label">FILE HO *</label>
            <input type="hidden" name="oldHo" value="{{ $data->file_ho }}">
            <input type="file" class="form-control form-control-sm @error('file_ho') is-invalid @enderror" id="file_ho" name="file_ho" value="{{ old('file_ho', $data->file_ho) }}">
            @if ($errors->has('file_ho'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('file_ho') }}</strong>
            </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="project-title" class="form-label">PROJECT TITLE *</label>
            <input type="text" class="form-control form-control-sm @error('project_title') is-invalid @enderror" id="project_title" name="project_title" value="{{ old('project_title', $data->project_title) }}">
            @if ($errors->has('project_title'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('project_title') }}</strong>
            </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">QUANTITY *</label>
            <input type="text" class="form-control form-control-sm @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity', $data->quantity) }}">
            @if ($errors->has('quantity'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('quantity') }}</strong>
            </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="po-number" class="form-label">PO NUMBER *</label>
            <input type="text" class="form-control form-control-sm @error('po_number') is-invalid @enderror" id="po_number" name="po_number" value="{{ old('po_number', $data->po_number) }}">
            @if ($errors->has('po_number'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('po_number') }}</strong>
            </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="costumer" class="form-label">COSTUMER *</label>
            <input type="text" class="form-control form-control-sm @error('costumer') is-invalid @enderror" id="costumer" name="costumer" value="{{ old('costumer', $data->costumer) }}">
            @if ($errors->has('costumer'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('costumer') }}</strong>
            </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="project-type" class="form-label">PROJECT TYPE *</label>
            <input type="text" class="form-control form-control-sm @error('project_type') is-invalid @enderror" id="project-type" name="project_type" value="{{ old('project_type', $data->project_type) }}">
            @if ($errors->has('project_type'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('project_type') }}</strong>
            </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="date-of-po" class="form-label">DATE OF PO *</label>
            <input type="date" class="form-control form-control-sm @error('date_of_po') is-invalid @enderror" id="date-of-po" name="date_of_po" value="{{ old('date_of_po', $data->date_of_po) }}">
            @if ($errors->has('date_of_po'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('date_of_po') }}</strong>
            </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="due-date" class="form-label">DUE DATE *</label>
            <input type="date" class="form-control form-control-sm @error('due_date') is-invalid @enderror" id="due-date" name="due_date" value="{{ old('due_date', $data->due_date) }}">
            @if ($errors->has('due_date'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('due_date') }}</strong>
            </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="project-value" class="form-label">PROJECT VALUE *</label>
            <input type="text" class="form-control form-control-sm @error('project_value') is-invalid @enderror" id="rupiah1" name="project_value" value="{{ old('project_value', currency_IDR($data->project_value)) }}">
            @if ($errors->has('project_value'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('project_value') }}</strong>
            </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="remaining-reimbusment-fee" class="form-label">REMAINING REIMBUSMENT VALUE *</label>
            <input type="text" class="form-control form-control-sm @error('remaining_reimbusment_fee') is-invalid @enderror" id="rupiah2" name="remaining_reimbusment_fee" value="{{ old('remaining_reimbusment_fee', currency_IDR($data->remaining_reimbusment_fee)) }}">
            @if ($errors->has('remaining_reimbusment_fee'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('remaining_reimbusment_fee') }}</strong>
            </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="gross-margin" class="form-label">GROSS MARGIN *</label>
            <input type="text" class="form-control form-control-sm @error('gross_margin') is-invalid @enderror format1" id="marginFormat1" name="gross_margin" value="{{ old('gross_margin', $data->gross_margin) }}">
            @if ($errors->has('gross_margin'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('gross_margin') }}</strong>
            </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="net-margin" class="form-label">NET MARGIN *</label>
            <input type="text" class="form-control form-control-sm @error('net_margin') is-invalid @enderror format2" id="marginFormat2" name="net_margin" value="{{ old('net_margin', $data->net_margin) }}">
            @if ($errors->has('net_margin'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('net_margin') }}</strong>
            </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="net-margin" class="form-label">IRR *</label>
            <input type="text" class="form-control form-control-sm @error('irr') is-invalid @enderror format3" id="marginFormat3" name="irr" value="{{ old('irr', $data->irr) }}">
            @if ($errors->has('irr'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('irr') }}</strong>
            </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="equipment" class="form-label">EQUIPMENT *</label>
            <input type="text" class="form-control form-control-sm @error('equipment') is-invalid @enderror" id="rupiah3" name="equipment" value="{{ old('equipment', currency_IDR($data->equipment)) }}">
            @if ($errors->has('equipment'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('equipment') }}</strong>
            </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="pmo-cost" class="form-label">PMO COST *</label>
            <input type="text" class="form-control form-control-sm @error('pmo_cost') is-invalid @enderror" id="rupiah4" name="pmo_cost" value="{{ old('pmo_cost', currency_IDR($data->pmo_cost)) }}">
            @if ($errors->has('pmo_cost'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('pmo_cost') }}</strong>
            </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="opex" class="form-label">OPEX *</label>
            <input type="text" class="form-control form-control-sm @error('opex') is-invalid @enderror" id="rupiah5" name="opex" value="{{ old('opex', currency_IDR($data->opex)) }}">
            @if ($errors->has('opex'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('opex') }}</strong>
            </div>
            @endif
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary save_data">Save</button>
        </div>
    </form>
@endsection
