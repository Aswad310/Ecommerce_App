<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            // Get the users with a non-empty cart
            $users = DB::table('carts')
                ->leftJoin('users', 'users.id', '=', 'carts.user_id')
                ->groupBy('users.id', 'carts.id')
                ->get();

            // Send an email to each user
            foreach ($users as $user) {
                Mail::to($user->email)->send(new \App\Mail\CartReminderEmail());
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
