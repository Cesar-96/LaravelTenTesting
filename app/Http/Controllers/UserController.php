<?php
namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    public $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    public function execute(){
        $complexMethodReturn =  $this->user->order();
        return $complexMethodReturn;
    }
}
