<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Event\EventManager;

class AppController extends Controller
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login',
            ],
            'loginRedirect' => [
                'controller' => 'Product',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login',
            ],
            // 'authError' => 'Did you really think you are allowed to see that?',
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'username','password'=>'password']
                ]
            ],
            'storage' => 'Session'
        ]);
    }

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['index', 'login']);
    }
    //...
}