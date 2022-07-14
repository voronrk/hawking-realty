<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class ClearCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:clear {key} {driver}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear application cache by key';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   
        if (Cache::store($this->argument('driver'))->has($this->argument('key'))) {
            $result = Cache::store($this->argument('driver'))->forget($this->argument('key'));
            if ($result) {
                return $this->info("Cache by key '{$this->argument('key')}' cleared successfully");
            } else {
                return $this->error('Something went wrong!');
            }
        } else {
            return $this->error("Key '{$this->argument('key')}' in the '{$this->argument('driver')}' not found!");
        }
        
    }
}
