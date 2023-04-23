@extends('company')
@section('title', 'Department Edit')
@section('content')
    <h3>Department Edit</h3>
    <form method="post" action="{{url('department', [$data->id])}}">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="mfg_supplier_invoice" class="col-sm-2 col-form-label"> Name</label>
            <div class="col-sm-2">
                <input require type="text" class="form-control form-control-sm" id="department_name"
                       placeholder="Department" name="department_name" value="{{ $data->name }}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
