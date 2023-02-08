<?php 

if (!function_exists('admin_path')) {
    function admin_path($val)
    {
        return asset("admin/".$val);
    }
}
