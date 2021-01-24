<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;
use App\Jobs\ProcessPodcast;
use Carbon\Carbon;

class everyMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:demo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

        $job = (new ProcessPodcast('123'))
                    ->delay(Carbon::now()->addMinutes(3));
        
        dispatch($job);
    }
}
