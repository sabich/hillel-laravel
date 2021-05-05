<?php

namespace App\Console\Commands;

use GeneralApi;
use Illuminate\Console\Command;

class ApiTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:test {url=https://jsonplaceholder.typicode.com/posts/1/comments}';

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
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function handle()
    {
        $result = GeneralApi::get($this->argument('url'));
        $this->info($result);
    }
}
