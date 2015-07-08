<?php namespace App\Console\Commands;

use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use \App;

class DbRestore extends DbCommand {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'db:restore';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Restore the database from an SQL dump.';

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
        $database  = $this->option("database");
        $dumpFile  = $this->argument('dump-file');

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
        $this->info("Restoring database '".$db['database']."'.");

        $return_var = NULL;
        $output  = NULL;

        $strCommand = "mysql -h %s -u %s -p%s %s < %s";

        $command = sprintf($strCommand, $db['host'], $db['username'], $db['password'], $db['database'], $dumpFile);
        exec($command, $output, $return_var);

        if ($return_var != 0) {
            $this->error("Unable to execute dump on database.");
            exit;
        }

        $this->info("Database restored.");
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
            ['dump-file', InputArgument::REQUIRED, 'The SQL dump to be applied in the database.', null],
		];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [
            ['database', null, InputOption::VALUE_OPTIONAL, 'The database to be dumped.', null],
		];
	}

}
