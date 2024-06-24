<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CustomCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'my-custom-cmd {userName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {   
        // dd($this->argument('userName'));
        $userName = $this->argument('userName');
        foreach($userName as $ele){
            // dump($ele['userName']);
            \Log::info("My Custom Command  : " . $ele['userName']);
        }
    }
}
 