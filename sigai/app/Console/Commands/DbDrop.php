<?php namespace App\Console\Commands;

use Symfony\Component\Console\Input\InputOption;

use \DB;
use \App;
use \Config;

use \PDO;

class DbDrop extends DbCommand {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'db:drop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Drop a database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $database = $this->option("database");
        $db = $this->getDatabaseInfo($database);

        // check if database exists on configuration
        if ($db == null) {
            $this->error("The database '".$database."' does not exist.");
            exit;
        }

        if ($db['driver'] != 'mysql') {
            $this->error("This command only supports MySQL databases.");
            exit;
        }

        $this->info("Running on '".App::environment()."' environment.");
        $this->info("This command is about to drop the database '".$db['database']."'.");

        if ($this->confirm('Do you wish to continue? [y|N]')) {
            try {
                $dbh = new PDO("mysql:host=" . $db['host'], $db['username'], $db['password']);
                $cmd = "DROP DATABASE IF EXISTS " . $db['database'] . ";";
                $dbh->exec($cmd) or die(print_r($dbh->errorInfo(), true));
            } catch (PDOException $e) {
                $this->error("DB Error: " . $e->getMessage());
            }

            $this->info("Database dropped.");
        } else {
            $this->info("Command aborted.");
        }
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['database', null, InputOption::VALUE_OPTIONAL, 'The database to be dropped.', null],
        ];
    }

}
