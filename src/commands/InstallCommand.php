<?php namespace Nredbugs\Emails;

/**
 * This file is part of Nredbugs,
 *
 * @license MIT
 * @package Nredbugs\Core
 */

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Artisan;
class InstallCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'emails:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este paquete te permitira leer y procesar mensajes de correo electronico.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {

        $this->info( "@Nredbugs / Emails" );
        if ($this->confirm("Esta seguro que instalar el paquete? ", "Yes")) {
            $this->line('');
            $this->comment('Instalado...');
                Artisan::call('vendor:publish', [
                                '--force' => true
                            ]);
            
            $this->comment('Exito, Se ha cargado el paquete correctamente');
        }
    }

}
