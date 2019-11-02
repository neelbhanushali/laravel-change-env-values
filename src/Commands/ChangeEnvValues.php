<?php

namespace NeelBhanushali\LaravelChangeEnvValues\Commands;

use Illuminate\Console\Command;

class ChangeEnvValues extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'change-env-values {keys*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Changes ENV Values';

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
        $keys = $this->argument('keys');
    }
}
