<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class sample2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:queue {--failed}';

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
        $failed = $this->option('failed');
        if (!$failed) {
            $data = DB::table('jobs')->get();
        } else {
            $data = DB::table('failed_jobs')->get();
        }

        $this->info(json_encode(['count'=>sizeof($data), 'data'=> $data]));
    }
}
