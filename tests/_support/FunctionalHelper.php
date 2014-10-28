<?php
namespace Codeception\Module;

// here you can define custom actions
// all public methods declared in helper class will be available in $I
class FunctionalHelper extends \Codeception\Module
{

    public function _beforeSuite($settings = array())
    {
        // TODO enable this after error in Illuminate\Foundatation\Artisan->getArtisan() is fixed
//        $this->debug('MIGRATING BEFORE RUN');
//        $I = $this->getModule('Laravel5');
//        $artisan = $I->grabService('artisan');
//        $artisan->call('migrate');
    }
}