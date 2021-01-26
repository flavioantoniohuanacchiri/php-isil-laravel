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
        $users = User::whereRaw("DATE(created_at) >= '{$lastDate}' ")
          ->where("status", 1)
          ->get()->toArray();

        $users2 = User::whereRaw("DATE(created_at) >= '{$lastDate}' ")
          ->where("status", 1)
          ->update("status", 0);

        foreach ($users as $key => $value) {
              User::where("id", $value["id"])->update("status", 0);
              echo "El usuario :".$value["name"]. "Ha sido Desactivado!!! \n";
        }
        print_r($users);
        echo "Hola, probando proceso!!!";
    }
}
