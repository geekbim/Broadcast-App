<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\Subscriber;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    protected $subscribers = ['indonesianpeople1337@gmail.com', 'abimgatya@gmail.com'];

    protected $message = 'default message';
    
    public function run()
    {
        // insert email
        foreach ($this->subscribers as $subscriber) {
            Subscriber::create([
                'email' => $subscriber
            ]);
        }

        // insert message
        Message::create([
            'message' => $this->message
        ]);
    }
}
