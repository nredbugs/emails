<?php namespace	Nredbugs\Emails;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
class EmailsServiceProvider extends ServiceProvider{
	/**
	 * Inicializamos el ServiceProvider.
	 *
	 * @var bool
	 */
	protected $defer = false;

	public function boot()
	{
		
		$this->publishes([
				__DIR__.'/config/emails.php' => config_path('emails.php'),
		]);

		$this->commands('command.emails.install');
			
	}

	public function register()
	{
		$this->registerEmail();
		$this->registerCommands();
		config([
				'config/emails.php',
		]);
	}
	
	private function registerEmail()
	{
		$this->app->bind('email',function($app){
			return new \Nredbugs\Emails\Email;
		});

	}

	private function registerCommands()
    {
        $this->app->singleton('command.email.install', function ($app) {
            return new InstallCommand();
        });
    }

    public function provides()
    {
        return [
            'command.email.install'
        ];
    }
}