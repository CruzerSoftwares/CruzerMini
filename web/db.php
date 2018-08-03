<?php //error_reporting(E_ALL);
ini_set("log_errors", 1);
ini_set('error_log','errors.log');

// Override the default error handler behavior
set_exception_handler(function($exception) {
   error_log($exception);
});

function adminer_object() {
    
    class AdminerSoftware extends Adminer {
        function login($login, $password) {
            global $jush;
            if ($jush == "sqlite")
                return ($login === 'root') && ($password === 'admin');
            return true;
        }
        function databases($flush = true) {
            if (isset($_GET['sqlite']))
                return ["/home/cruzerso/public_html/easymobile/app/easymobile3.db"];
            return get_databases($flush);
        }
    }
    return new AdminerSoftware;
}

// include original Adminer or Adminer Editor
include "adminer.4.3.0.php";