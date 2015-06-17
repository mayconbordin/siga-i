<?php namespace App\Console\Commands;

use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use \App;

class DbDump extends DbCommand {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'db:dump';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Dump the database into an SQL file or print on screen.';

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
        $out = $this->argument('output');

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
        $this->info("Dumping database '".$db['database']."'.");

        $return_var = NULL;
        $output  = NULL;
        $command = "mysqldump -h ".$db['host']." -u ".$db['username']." -p".$db['password']." ".$db['database']."";

        exec($command, $output, $return_var);

        if ($return_var != 0) {
            $this->error("Unable to execute dump on database.");
            exit;
        }

        $dump = implode("\n", $output);

        if ($out != null) {
            $file = fopen($out, "w") or die("Unable to open file '$out'");
            fwrite($file, $dump);
            fclose($file);

            $this->info("Dump of database saved.");
        } else {
            echo $dump;
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
            ['output', InputArgument::OPTIONAL, 'Where to dump the SQL.', null],
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
