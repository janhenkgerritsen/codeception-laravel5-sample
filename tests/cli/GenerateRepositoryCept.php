<?php
$I = new CliTester($scenario);
$I->wantTo('generate Repository class with Artisan command');
// TODO implement the console command for this test, it is not yet possible to register artisan commands

//$I->amInPath(codecept_output_dir('sandbox'));
//$I->runArtisan('generate:repository User');
//$I->seeFileFound('UserRepository.php','app/repositories');
//$I->seeFileContentsEqual(<<<EOF
//<?php
//class UserRepository
//{
//    /**
//     * Eloquent model
//     */
//    protected \$model;
//
//    /**
//     * @param \$model
//     */
//    function __construct(\$model)
//    {
//        \$this->model = \$model;
//    }
//
//    /**
//     * Fetch a record by id
//     *
//     * @param \$id
//     * @return mixed
//     */
//    public function getById(\$id)
//    {
//        return \$this->model->find(\$id);
//    }
//}
//EOF
//);
