<?php namespace App\Console\Commands;

use \DB;
use \Config;

use Illuminate\Console\Command;

abstract class DbCommand extends Command {
    protected function getDatabaseInfo($database = null)
    {
        if ($database == null) {
            $database = Config::get('database.default');
        }

        $connections = Config::get('database.connections');
        return isset($connections[$database]) ? $connections[$database] : null;
    }
}