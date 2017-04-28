<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    public $helpers = [
         'Paginator' => ['templates' => 'custom-paginate']
	 ];

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Cats',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'unauthorizedRedirect' => $this->referer()
        ]);

        $session_user = ($this->request->session()->check('Auth.User')) ? $this->request->session()->read('Auth.User') : ['role'=>''];
        $this->set('session_user', $session_user);

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
    public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);

        $this->Auth->allow([]);

        $controller = $this->request->params['controller'];
        $action = $this->request->params['action'];

        $user = $this->request->session()->read('Auth.User');
        if (empty($user)) return;

        if ($user['need_new_password'] && ($action != "changePassword")) {
            $this->Flash->error('Please set a new password');
            return $this->redirect(['controller'=>'users','action'=>'changePassword']);
        } else if ($user['new_user'] && ($controller != "Users" || ($action != 'edit' && $action != 'changePassword'))) {
            $this->Flash->error('Please fill out your profile information');
            return $this->redirect(['controller'=>'Users','action'=>'edit']);
        }

		$this->set('referer',$this->referer);
	}

    public function deletePic() {
        $this->autoRender = false;

        $data = $this->request->data;
        
        $filesDB = TableRegistry::get('Files');
        
        $file = $filesDB->get($data['file_id']);
        $file->is_deleted = true;

        ob_clean();
        if($filesDB->save($file)){
            echo 'success';
        } else {
            echo 'error';
        }
        exit(0);
    }
}
