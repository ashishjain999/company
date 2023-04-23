@extends('company')
@section('title', 'Employee Edit')
@section('content')
    <h3>Employee Edit</h3>
    <form method="post" action="{{url('employee', [$employee->emp_id])}}">
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"> Department</label>
            <div class="col-sm-2">
                <select class="form-control" name="department" id="">
                    @foreach($data as $db)
                        <option value="{{ $db->id }}">{{ $db->name }}</option>
                    @endforeach
                </select>

            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label"> Employee Name</label>
            <div class="col-sm-2">
                <input require type="text" class="form-control form-control-sm" id="name"
                       placeholder="Name" name="name" value="{{ $employee->e_name }}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
