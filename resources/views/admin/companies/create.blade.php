@extends('layouts.admin')

@section('content')

    <h1 class="pt-3 mb-3">@lang('admin.companies_create')</h1>

    @include('includes.error')

    <div class="row">

        <div class="col-sm-12">

            {!! Form::open(['method'=>'POST', 'action'=>'CompaniesController@store', 'files' => true]) !!}

            <div class="form-group">
                {!! Form::label('name', __('admin.company_name'), ['class'=>'required']) !!}
                {!! Form::text('name', null, ['class'=>'form-control', 'required'=>'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', __('admin.company_email'), ['class'=>'required']) !!}
                {!! Form::email('email', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', __('admin.company_logo'), ['class'=>'required']) !!}
                {!! Form::file('photo_id', ['class'=>'d-block', 'required'=>'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('website', __('admin.company_website')) !!}
                {!! Form::text('website', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit(__('admin.companies_create'), ['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

        </div>

    </div>

@endsection