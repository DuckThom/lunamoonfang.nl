<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Key;

class CreateApiKey extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:create {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new API key';

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
        $key = str_random(48);

        Key::create([
            'key'   => $key,
            'name'  => $this->argument('name') ?: '',
        ]);

        $this->info("Created a new API key [{$key}]");
    }
}
