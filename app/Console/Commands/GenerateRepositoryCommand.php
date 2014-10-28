<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class GenerateRepositoryCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'generate:repository';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Creates empty repository';

	protected $template = <<<EOF
<?php
class {{name}}Repository
{
    /**
     * Eloquent model
     */
    protected \$model;

    /**
     * @param \$model
     */
    function __construct(\$model)
    {
        \$this->model = \$model;
    }

    /**
     * Fetch a record by id
     *
     * @param \$id
     * @return mixed
     */
    public function getById(\$id)
    {
        return \$this->model->find(\$id);
    }
}
EOF;

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
		$name = ucfirst($this->argument('name'));
		@mkdir('app/repositories',0755, true);
		$file = str_replace('{{name}}',$name, $this->template);
		file_put_contents($filename = "app/repositories/{$name}Repository.php", $file);
		$this->info("Repository $name generated in $filename");
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('name', InputArgument::REQUIRED, 'repository name.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('path', null, InputOption::VALUE_OPTIONAL, 'Path to Laravel app.', null),
		);
	}
}
