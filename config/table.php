<?php

return [
    'users' => 'users',
    'user_password_reset_tokens' => config('auth.passwords.users.table'),
    'roles' => config('permission.table_names.roles'),
    'permissions' => config('permission.table_names.permissions'),
    'model_has_permissions' => config('permission.table_names.model_has_permissions'),
    'model_has_roles' => config('permission.table_names.model_has_roles'),
    'role_has_permissions' => config('permission.table_names.role_has_permissions'),
    'permission_groups' => 'permission_groups',
    'states' => 'states',
    'cities' => 'cities',
    'countries' => 'countries',
    'languages' => 'languages',
    'financial_years' => 'financial_years',
    'subjects' => 'subjects',
    'terms' => 'terms',
    'fees' => 'fees',
    'statuses' => 'statuses',
    'medium_of_studies' => 'medium_of_studies',
    'class_names' => 'class_names',
    'exam_categories' => 'exam_categories',
    'academic_years' => 'academic_years',
    'exams' => 'exams'
];
