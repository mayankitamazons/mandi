<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Cache\Cache;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class UsersController extends AppController
{

    public function login()
    {
    	if($this->Auth->user('id')){
    		return $this->redirect($this->Auth->redirectUrl());
    	}
        $this->viewBuilder()->setLayout('register');
        if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Flash->error(__('Username or password is incorrect'));
			}
		}
    }
    function register()
    {
		$this->viewBuilder()->setLayout('register');
		if ($this->request->is('post')) {
			$user = $this->Users->newEntity($this->request->getData());
			// pr($user);die;
		    if ($this->Users->save($user)) {
		        $this->Auth->setUser($user->toArray());
		        return $this->redirect([
		            'controller' => 'Users',
		            'action' => 'login'
		        ]);
		    }
		}	
		
	}
	public function logout()
	{
	    return $this->redirect($this->Auth->logout());
	}

}
