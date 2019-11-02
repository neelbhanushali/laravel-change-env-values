<?php

namespace NeelBhanushali\LaravelChangeEnvValues\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

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

        $env_file_path = app()->environmentFile();

        foreach ($keys as $key) {
            $is_secret = Str::startsWith($key, '.') ? 1 : 0;
            $key = str_replace('.', '', $key);
            $value = env($key);

            $key_exploded = array_filter(explode('=', $key));
            $is_value_provided = count($key_exploded) > 1;

            $new_value = $is_value_provided ? $key_exploded[1] : ($is_secret ? $this->secret("Enter {$key}") : $this->ask("Enter {$key}", $value));

            file_put_contents($env_file_path, str_replace(
                "{$key}={$value}",
                "{$key}={$new_value}",
                file_get_contents($env_file_path)
            ));
        }
    }
}
