<?php

// get route
$r = @$_GET['r'];

// auth from jwt
$auth = auth();

// login checker logic
if(!$auth)
{
    header('location:https://layanan.labura.go.id');
    die();
}
else
{
    $roles      = $auth->roles;
    $domain     = config('app_domain_name');
    $key        = array_search($domain, array_column($roles, 'domain'));
    $role       = $roles[$key];
    $role_name  = config('role');
    if(
        !isset($role_name[$role->role_id]) || 
        (isset($role_name[$role->role_id]) && $role_name[$role->role_id] != "Admin")
    )
    {
        header('location:https://layanan.labura.go.id');
        die();
    }
}

$user = 'user';

if($r)
{
    if(startWith($r, "hello"))
    {
        if($user != 'admin')
        {
            return false;
        }
    }
}

return true;