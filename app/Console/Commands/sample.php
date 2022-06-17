<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\sampleJob;

class sample extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'spam:log {count=100}';

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
        $count = $this->argument('count');
        for ($i=0; $i < $count; $i++) { 
            sampleJob::dispatch($i);
        }
        return 0;
    }
}
