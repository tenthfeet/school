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
    'students' => 'students',
    'parents_info' => 'parents_info',
    'class_rooms' => 'class_rooms',
    'exam_categories' => 'exam_categories',
    'academic_years' => 'academic_years',
    'exams' => 'exams',
    'departments' => 'departments',
    'academic_standards' => 'academic_standards',
    'fee_details' => 'fee_details',
    'fee_bundles' => 'fee_bundles',
    'homeworks' => 'homeworks',
    'fee_bundles_and_fee_details' => 'fee_bundles_and_fee_details',
    'mapping_subjects_classrooms_day_time' => 'mapping_subjects_classrooms_day_time',
    'mapping_teachers_classrooms_day_time' => 'mapping_teachers_classrooms_day_time',
    'class_periods' => 'class_periods',
    'marks' => 'marks',
    'grades'=>'grades',
    'attendances' => 'attendances',
    'payments' => 'payments',
    'fee_dues' => 'fee_dues',
];
