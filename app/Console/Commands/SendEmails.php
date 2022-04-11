<?php

namespace App\Console\Commands;

use App\Notifications\sendPostPublishedNotification;
use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send {subscribers}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send emai to subscribers';

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
     * @return int
     */
    public function handle()
    {
        $subscribers = $this->argument('subscribers');

        foreach ($subscribers as $subscriber) {
            $subscriber->notify(new sendPostPublishedNotification($subscriber));
        }

    }
}
