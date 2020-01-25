<?php

namespace App\Observers;

use App\User;
use Illuminate\Auth\Events\Registered;

class UserObserver
{
    /**
     * Handle the user's "updating" event.
     *
     * @param  User $user
     * @return void
     */
    public function created(User $user)
    {
        // Send inbuilt email notification or we can write our custom email also.
        event(new Registered($user));
    }
}
