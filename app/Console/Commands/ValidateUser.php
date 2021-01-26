<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

//use App\Jobs\Bizlink\JobCreateInvoke;

class ValidateUser extends Command
{
    protected $signature = "
        user:validate
            {--last_date=}";
    protected $description = 'Proceso de Validacion de los Ultimos Usuarios Registrados ';

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
        $lastDate = !is_null($this->option("last_date"))? $this->option("last_date") : date("Y-m-d");
        $users = User::whereRaw("DATE(created_at) >= '{$lastDate}' ")->get()->toArray();
        print_r($users);
        echo "Hola, probando proceso!!!";
    }
}
