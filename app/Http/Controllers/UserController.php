<?php

namespace App\Http\Controllers;

use App\pipeline\CheckAccountActivatedHandler;
use App\pipeline\CheckLoggedInHandler;
use App\pipeline\Pipeline;
use App\Repositories\UserRepositoryInterface;
use App\singleton\Singleton;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getInfo()
    {
        $single = new Singleton();
//        return [Singleton::getInstance()->info(), $this->changeUser()];
        return [$single->info(), $this->changeUser()];
    }

    public function changeUser()
    {
        $single = new Singleton();
//        return Singleton::getInstance()->info();
        return $single->info();
    }

    public function getAll()
    {
        return $this->userRepository->getAll();
    }

    public function pipeline()
    {
        $pipeline = new Pipeline();
        $pipeline->addHandler(new CheckLoggedInHandler());
        $pipeline->addHandler(new CheckAccountActivatedHandler());

        $input = [
            'email' => 'example@example.com',
            'password' => 'admin',
        ];

        $result = $pipeline->handle($input);

        echo $result;
    }
}
