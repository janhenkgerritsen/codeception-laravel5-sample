<?php

namespace App\Listeners;

use App\User;

class TestEventListener
{

    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle()
    {
        User::create(['email' => 'johndoe@example.com', 'password' => bcrypt('password')]);
    }

}
