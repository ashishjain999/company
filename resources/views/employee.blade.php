@extends('company')
@section('title', 'Employee')
@section('content')
    <h3>Employees</h3>
    <form method="post" action="{{ url('employee')  }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"> Department</label>
            <div class="col-sm-2">
                <select class="form-control" name="department" id="">
                    @foreach($data as $db)
                        <option value="{{ $db->id }}" >{{ $db->name }}</option>
                    @endforeach
                </select>

            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label"> Employee Name</label>
            <div class="col-sm-2">
                <input require type="text" class="form-control form-control-sm" id="name"
                       placeholder="Name" name="name" value="">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
            </div>
        </div>
    </form>
    <table class="table table-bordered" id="datatable">
        <thead>
        <th></th>
        <th>Department</th>
        <th>Name</th>
        <th>Updated</th>
        <th></th>
        </thead>
        <tbody>
        @foreach($employee as $value)
            <tr>
                <td>{{ $value->emp_id }}</td>
                <td>{{ $value->dept_name }}</td>
                <td>{{ $value->e_name }}</td>
                <td>{{ date('d-m-Y',strtotime($value->e_update)) }}</td>
                <td><a href="{{ url('employee/'.$value->emp_id.'/edit') }}">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function () {
                var logs = $('#datatable').DataTable({
                    "order": [[0, "desc"]],
                    "lengthMenu": [[50, 20, -1], [50, 100, "View All"]],
                });
            });
        </script>
    @endpush
@endsection
