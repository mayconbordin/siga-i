<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use \DB;
use \App;

class DbCreate extends Command {

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
		$name      = $this->argument('name');
		$charset   = $this->argument('charset');
		$collation = $this->argument('collation');
		
		if ($name == null) {
		    $name = DB::connection()->getDatabaseName();
		}
		
		$this->info("Running on '".App::environment()."' environment.");
		$this->info("Creating database '$name'.");

		if ($this->confirm('Do you wish to continue? [yes|no]'))
        {
            DB::statement("DROP DATABASE IF EXISTS $name");
            DB::statement("CREATE DATABASE $name CHARACTER SET $charset COLLATE $collation");
            $this->info("Database created.");
        }
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			['name', InputArgument::OPTIONAL, 'The name of the database.'],
			['charset', InputArgument::OPTIONAL, 'The character set of the database.', 'utf8'],
			['collation', InputArgument::OPTIONAL, 'The collation set of the database.', 'utf8_general_ci'],
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
			['force', 'f', InputOption::VALUE_NONE, 'An example option.', null],
		];
	}

}
