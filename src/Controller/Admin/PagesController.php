<?php
namespace App\Controller\Admin;

use App\Controller\AdminController;
use Cake\ORM\TableRegistry;

class PagesController extends AdminController
{

    public function initialize()
    {
        parent::initialize();
    }

    public function home()
    {
        $this->redirect(['controller' => 'Recipes', 'action' => 'index']);
    }

}