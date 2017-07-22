<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Dev extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dev:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute your test
     *
     * @return mixed
     */
    public function handle() {
    }
}
