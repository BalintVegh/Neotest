@extends('layouts.admin')

@section('content')

    <h1 class="pt-3 mb-3">@lang('admin.employees_create')</h1>

    @include('includes.error')

    <div class="row">

        <div class="col-sm-12">

            {!! Form::open(['method'=>'POST', 'action'=>'EmployeesController@store', 'files' => true]) !!}

            <div class="form-group">
                {!! Form::label('name', __('admin.employee_name'), ['class'=>'required']) !!}
                {!! Form::text('name', null, ['class'=>'form-control', 'required'=>'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('company_id', __('admin.employee_company'), ['class'=>'required']) !!}
                {!! Form::select('company_id', ['' => __('admin.select')] + $companies, null, ['class'=>'form-control', 'required'=>'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', __('admin.employee_email'), ['class'=>'required']) !!}
                {!! Form::email('email', null, ['class'=>'form-control', 'required'=>'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('phone', __('admin.employee_phone'), ['class'=>'required']) !!}
                {!! Form::text('phone', null, ['class'=>'form-control', 'pattern' => '[+]{1}[3]{1}[6]{1}(\s?)[\d]{1,13}$', 'title' => '+36 xxxxxxxxxx', 'required'=>'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('post', __('admin.employee_post'), ['class'=>'required']) !!}
                {!! Form::text('post', null, ['class'=>'form-control', 'required'=>'required']) !!}
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
                {!! Form::submit(__('admin.employees_create'), ['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

        </div>

    </div>

@endsection