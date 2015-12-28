<?php
# Rename this to env.php
# and also change the attribute values as per requirement
$env = array();

$env['base_url'] = 'http://localhost/payfees/';
$env['index_page'] = 'index.php';

$env['hostname'] = 'localhost';
$env['username'] = 'root';
$env['password'] = '123456';
$env['database'] = 'payfees';

function env($key)
{
    global $env;
    if(isset($env[$key]))
        return $env[$key];
    else
        return false;
}

?>
