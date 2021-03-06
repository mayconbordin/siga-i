<?php namespace App\Console\Commands;

use Symfony\Component\Console\Input\InputOption;

use \DB;
use \App;
use \Config;

use \PDO;

class DbCreate extends DbCommand {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'db:create';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new database';

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
        $this->info("Creating database '".$db['database']."'.");

        try {
            $dbh = new PDO("mysql:host=".$db['host'], $db['username'], $db['password']);
            $cmd = "CREATE DATABASE IF NOT EXISTS ".$db['database']." CHARACTER SET ".$db['charset']." COLLATE ".$db['collation'].";";
            $dbh->exec($cmd) or die(print_r($dbh->errorInfo(), true));
        } catch (PDOException $e) {
            $this->error("DB Error: " . $e->getMessage());
        }

		$this->info("Database created.");
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
            ['database', null, InputOption::VALUE_OPTIONAL, 'The database to be created.', null],
		];
	}

}
