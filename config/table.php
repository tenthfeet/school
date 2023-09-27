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
];