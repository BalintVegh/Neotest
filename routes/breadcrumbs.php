<?php

Breadcrumbs::for('homepage', function ($trail) {
    $trail->push(__('admin.home'), route('home'));
});

Breadcrumbs::for('companies.index', function ($trail) {
    $trail->parent('homepage');
    $trail->push(__('admin.companies'), route('companies.index'));
});

Breadcrumbs::for('companies.create', function ($trail) {
    $trail->parent('companies.index');
    $trail->push(__('admin.companies_create'), route('companies.create'));
});

Breadcrumbs::for('companies.edit', function ($trail, $company) {
    $trail->parent('companies.index');
    $trail->push(__('admin.companies_edit'), route('companies.edit', $company->id));
});

Breadcrumbs::for('employees.index', function ($trail) {
    $trail->parent('homepage');
    $trail->push(__('admin.employees'), route('employees.index'));
});

Breadcrumbs::for('employees.create', function ($trail) {
    $trail->parent('employees.index');
    $trail->push(__('admin.employees_create'), route('employees.create'));
});

Breadcrumbs::for('employees.edit', function ($trail, $employee) {
    $trail->parent('employees.index');
    $trail->push(__('admin.employees_edit'), route('employees.edit', $employee->id));
});