<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Domain\User\User;
abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
{
	use DatabaseMigrations;
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }
	
	public function getHeaders($password='password123',User $user = null)
	{
		if(is_null($user)) {
			$user = factory(User::class)->create([
			'password'=>bcrypt($password),
			]);
		}
		$data=[
		'username'=>$user->username,
		'password'=>$password,
		];
		$this->post('auth/login',$data);
		$data = $this->response->getContent();
		$token = json_decode($data)->token;
		
		return [
			'Authorization' => 'Bearer' . $token,
		];
		
	}
	
	
	//use DatabaseMigrations
	/*
	public function setUp()
	{
		parent::setUp();
		Artisan::call('migrate');
	}
	
	public function tearDown()
	{
		Artisan::call('migrate:reset');
		parent::tearDown();
	}
	*/
	
}
