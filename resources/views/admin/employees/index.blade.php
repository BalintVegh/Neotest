@extends('layouts.admin')

@section('content')

    @include('includes.deletemodal')

    <h1 class="pt-3 mb-3">@lang('admin.employees')</h1>

    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">@lang('admin.add_new')</a>

    <div class="table-responsive">
        <table class="table table-striped responsive table-vcenter"  id="employee_table" data-form="deleteForm">
            <thead>
            <tr>
                <th>@lang('admin.employee_name')</th>
                <th>@lang('admin.employee_company')</th>
                <th>@lang('admin.employee_email')</th>
                <th>@lang('admin.employee_phone')</th>
                <th>@lang('admin.employee_post')</th>
                <th>@lang('admin.employee_comment')</th>
                <th>@lang('admin.employee_avatar')</th>
                <th>@lang('admin.created_at')</th>
                <th>@lang('admin.updated_at')</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @if(count($employees) > 0)
                @foreach($employees as $employee)
                    <tr>
                        <td><a href="{{ route('employees.edit', $employee->id) }}">{{ $employee->name }}</a></td>
                        <td>{{ $employee->company->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>{{ $employee->post }}</td>
                        <td>{{ $employee->comment }}</td>
                        <td><img height="40" src="{{ $employee->photo ? asset('images/' . $employee->photo->file) : $employee->gravatar }}" alt="{{ $employee->name }}" title="{{ $employee->name }}"></td>
                        <td>{{ $employee->created_at->diffForHumans() }}</td>
                        <td>{{ $employee->updated_at->diffForHumans() }}</td>
                        <td>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['EmployeesController@destroy', $employee->id], 'class' =>'form-inline form-delete justify-content-end']) !!}

                            {!! Form::submit(__('admin.delete'), ['class'=>'btn btn-danger']) !!}

                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

@endsection

@section('scripts')

    <script>
        $('#employee_table').DataTable( {
            "language": {
                "url": "{{\App\Helpers\LanguageHelper::getDatatablesLang()}}"
            }
        });
    </script>

@endsection