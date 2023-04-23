<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
<h3>Create Department</h3>
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
</body>
</html>
