# laravel-change-env-values
Changes env values using command.

`php artisan change-env-values {ENV_KEY_1} {ENV_KEY_2} ... {ENV_KEY_n}`

* `ENV_KEY` => Asks for input for that key. Current value as suggestion.
* `.ENV_KEY` => Asks for input secretly for that key. No suggestion provided. Should be used for setting passwords/secrets.
* `ENV_KEY=value` => Does not ask for input. Sets value provided.
