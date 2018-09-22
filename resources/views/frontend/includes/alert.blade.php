@if(Session::has('error'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>Error Occurred!</strong> {{Session::get('error')}}
    </div>
@endif
@if(Session::has('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>Success!</strong> {{Session::get('success')}}
    </div>
@endif
@if(Session::has('info'))
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="glyphicon glyphicon-exclamation-sign alert-icon "></i>
        {{Session::get('info')}}
    </div>
@endif
@if(Session::has('warning'))
    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="glyphicon glyphicon-question-sign alert-icon "></i>
        <strong>Notice!</strong> {{Session::get('warning')}}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger  ">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="glyphicon glyphicon-ban-circle alert-icon "></i>
        <strong>Error Occurred!</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif