@extends('layouts.admin')

@section('content')

    <h1 class="pt-3 mb-3">@lang('admin.employees_edit')</h1>

    @include('includes.error')

    <div class="row">

        <div class="col-sm-6">

            <img class="img-fluid" src="{{ $employee->photo ? asset('images/' . $employee->photo->file) : $employee->gravatar }}" alt="{{ $employee->name }}" title="{{ $employee->name }}">

        </div>

        <div class="col-sm-6">

            {!! Form::model($employee, ['method'=>'PATCH', 'action'=>['EmployeesController@update', $employee->id], 'files' => true]) !!}

            <div class="form-group">
                {!! Form::label('name', __('admin.employee_name'), ['class'=>'required']) !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('company_id', __('admin.employee_company'), ['class'=>'required']) !!}
                {!! Form::select('company_id', $companies, null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', __('admin.employee_email'), ['class'=>'required']) !!}
                {!! Form::email('email', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('phone', __('admin.employee_phone'), ['class'=>'required']) !!}
                {!! Form::text('phone', null, ['class'=>'form-control', 'pattern' => '[+]{1}[3]{1}[6]{1}(\s?)[\d]{1,13}$', 'title' => '+36 xxxxxxxxxx']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('post', __('admin.employee_post'), ['class'=>'required']) !!}
                {!! Form::text('post', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('comment', __('admin.employee_comment')) !!}
                {!! Form::textarea('comment', null, ['class'=>'form-control', 'rows'=>6]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', __('admin.employee_avatar')) !!}
                {!! Form::file('photo_id', ['class'=>'d-block']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit(__('admin.employees_edit'), ['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

        </div>

    </div>

@endsection