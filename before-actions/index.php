<?php
// api route
$api = @$_GET['action'];
if($api && startWith($api, "api"))
    return true;

// get route
$r = @$_GET['r'];

// auth from jwt
$auth = auth();

// login checker logic
if(!$auth)
{
    // for demo
    if(config('demo'))
    {
        setcookie(config('jwt_cookie_name'),'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjoiMjkiLCJuYW1hIjoiSGFtemFoIEZhdXp5Iiwicm9sZV9pZCI6IjEiLCJ1c2VybmFtZSI6IjI3MDg5NyIsInJvbGVzIjpbeyJkb21haW4iOiJhYnNlbnNpLW5nLmxhYnVyYS5nby5pZCIsInJvbGVfaWQiOiI0In0seyJkb21haW4iOiJhZ2VuZGEubGFidXJhLmdvLmlkIiwicm9sZV9pZCI6IjQifSx7ImRvbWFpbiI6Im5ld2hlbHBkZXNrLmxhYnVyYS5nby5pZCIsInJvbGVfaWQiOiIyIn0seyJkb21haW4iOiJsYXlhbmFuLmxhYnVyYS5nby5pZCIsInJvbGVfaWQiOiIxIn0seyJkb21haW4iOiJub3RpZi5sYWJ1cmEuZ28uaWQiLCJyb2xlX2lkIjoiMSJ9LHsiZG9tYWluIjoibXAubGFidXJhLmdvLmlkIiwicm9sZV9pZCI6IjEifSx7ImRvbWFpbiI6InNpbXBlcm5hcy5sYWJ1cmEuZ28uaWQiLCJyb2xlX2lkIjoiMyJ9LHsiZG9tYWluIjoidHVnYXMubGFidXJhLmdvLmlkIiwicm9sZV9pZCI6IjIifSx7ImRvbWFpbiI6Indicy5sYWJ1cmEuZ28uaWQiLCJyb2xlX2lkIjoiMyJ9XSwic2twZF9pZCI6IjMwIiwibmFtYV9vcGQiOiJEaW5hcyBLb211bmlrYXNpIGRhbiBJbmZvcm1hdGlrYSIsInN0YXJ0X3Rva2VuIjoiMjAyMS0xMi0wMiAxNjozNzo1MiIsImplbmlzX3BlZ2F3YWkiOiJ0a3MiLCJqZW5pc191c2VyIjoidGtzIiwidG9rZW4iOiIxNGM4YTZlMDc5MDRiMGIyYmZmNGE0OTA5YWI4M2YzNyJ9.yJCVd0CQp-r1CK0UhVFABfsr492hOJaT2v6LSUA3oNc');
        header('location:index.php');
        die();
    }
    else
    {
        header('location:https://layanan.labura.go.id');
        die();
    }
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