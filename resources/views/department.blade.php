@extends('company')
@section('title', 'Department')
@section('content')
    <h3>Department</h3>
    <form method="post" action="{{ url('department')  }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group row">
            <label for="mfg_supplier_invoice" class="col-sm-2 col-form-label"> Name</label>
            <div class="col-sm-2">
                <input require type="text" class="form-control form-control-sm" id="department_name"
                       placeholder="Department" name="department_name" value="">
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
        <th>Name</th>
        <th>Updated</th>
        </thead>
        <tbody>
        @foreach($data as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ date('d-m-y',strtotime($value->updated_at)) }}</td>
                <td><a href="{{ url('department/'.$value->id.'/edit') }}">Edit</a></td>
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
