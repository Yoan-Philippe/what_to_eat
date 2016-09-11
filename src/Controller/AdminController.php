<?php
namespace App\Controller;

//use CakeDC\Users\Auth\SuperuserAuthorize;
use Cake\Routing\Router;

/**
 * Admin Controller
 *
 * @property \App\Model\Table\AdminTable $Admin
 */
class AdminController extends AppController
{

    public function initialize()
    {
        parent::initialize();

        $this->viewBuilder()->layout('admin');
        //$this->superUserAuthorize = new SuperuserAuthorize($this->_components);

        /*if(!$this->Auth->user()) {
            $this->request->session()->write('LoginRedirectURL', Router::url(null, true));
            $this->redirect(['_name' => 'login']);
            return;
        }*/

        /*if(!$this->superUserAuthorize->authorize($this->Auth->user(), $this->request)) {
            $this->Flash->error(__("Vous n'avez pas accès à cette section."));
            $this->redirect(['_name' => 'home']);
            return;
        }*/
    }

}