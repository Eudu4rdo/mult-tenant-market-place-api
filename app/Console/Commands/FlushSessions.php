<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class flushSessions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'session:flush';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Flush all user sessions';

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
     * @return mixed
     */
    public function handle()
    {
        if(ENV('SESSION_DRIVER') == 'file'){
            $files = glob(storage_path('framework/sessions/*'));
            foreach($files as $file){
                if(is_file($file)){
                    unlink($file);
                }
            }
            $this->info('All sessions flushed');
        }
    }
}
