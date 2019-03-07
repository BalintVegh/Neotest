@extends('layouts.admin')

@section('content')

    @include('includes.deletemodal')

    <h1 class="pt-3 mb-3">@lang('admin.companies')</h1>

    <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3">@lang('admin.add_new')</a>

    <div class="table-responsive">
    <table class="table table-striped table-vcenter" data-form="deleteForm">
        <thead>
        <tr>
            <th>@lang('admin.company_name')</th>
            <th>@lang('admin.company_email')</th>
            <th>@lang('admin.company_logo')</th>
            <th>@lang('admin.company_website')</th>
            <th>@lang('admin.created_at')</th>
            <th>@lang('admin.updated_at')</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @if(count($companies) > 0)
            @foreach($companies as $company)
                <tr>
                    <td><a href="{{ route('companies.edit', $company->id) }}">{{ $company->name }}</a></td>
                    <td>{{ $company->email }}</td>
                    <td><img height="40" src="{{ (Storage::disk('public')->exists($company->photo->file)) ? asset('storage/' . $company->photo->file) : $company->getPlaceholder() }}" alt="{{ $company->name }}" title="{{ $company->name }}"></td>
                    <td><a href="http://{{ $company->website }}" target="_blank">{{ $company->website }}</a></td>
                    <td>{{ $company->created_at->diffForHumans() }}</td>
                    <td>{{ $company->updated_at->diffForHumans() }}</td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['CompaniesController@destroy', $company->id], 'class' =>'form-inline form-delete justify-content-end']) !!}

                            {!! Form::submit(__('admin.delete'), ['class'=>'btn btn-danger']) !!}

                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @else
            <tr><td colspan="7" class="text-center">@lang('admin.no_data')</td></tr>
        @endif
        </tbody>
    </table>
    </div>

    <div class="row justify-content-center">
        <div class="col-sm-6">

            {{ $companies->links() }}

        </div>
    </div>

@endsection