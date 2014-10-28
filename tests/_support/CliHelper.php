<?php
namespace Codeception\Module;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class CliHelper extends \Codeception\Module
{

    protected $dir;

    public function _before()
    {
        $this->dir = codecept_output_dir('sandbox');
        @mkdir($this->dir, 0777);
        chdir($this->dir);
    }

    public function _after()
    {
        \Codeception\Util\FileSystem::deleteDir($this->dir);
    }

    public function runArtisan($command)
    {
        $this->getModule('Cli')->runShellCommand(codecept_root_dir('artisan').' '.$command);
    }

}