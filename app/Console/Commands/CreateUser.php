<?php namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

class CreateUser extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'create-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a user';

    /**
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['email', InputArgument::REQUIRED],
            ['password', InputArgument::REQUIRED]
        ];
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user = new User();
        $user->email = $this->argument('email');
        $user->password = $this->argument('password');
        $user->save();

        $this->line('User created!');
    }
}
