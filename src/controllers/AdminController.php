<?php
/**
 * Hdip\controller\admin
 */
namespace Hdip\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Hdip\Model\DvdRepository;
use Hdip\Model\User;

/**
 * Class AdminController
 *
 * simple authentication using Silex session object
 * $app['session']->set('isAuthenticated', false);
 *
 * but the propert way to do it:
 * https://gist.github.com/brtriver/1740012
 *
 * @package Hdip\Controller
 *
 * Class AdminController
 */
class AdminController
{
    /**
     * is authenticated
     */
    public function isAuthenticated()
    {
    }

    /**
     * action for route:    /admin
     * will we allow access to the Admin home?
     * @param Request $request
     * @param Application $app
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction(Request $request, Application $app)
    {
        // test if 'username' stored in session ...
        $username = getAuthenticatedUserName($app);
        $role = getAuthenticatedrole($app);

        // check we are authenticated --------
        $isAuthenticated = (null != $username);
        if (!$isAuthenticated) {
            // not authenticated, so redirect to LOGIN page
            return $app->redirect('/login');
        }

        // store username into args array
        $argsArray = array(
            'username' => $username,
            'role' => $role
        );

        // render (draw) template
        // ------------
        $templateName = 'admin/index';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     *
     * action for route:    /adminCode
     * will we allow access to the Admin home?
     * @param Request $request
     * @param Application $app
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function codesAction(Request $request, Application $app)
    {
        // test if 'username' stored in session ...
        $username = getAuthenticatedUserName($app);
        $role = getAuthenticatedrole($app);

        // check we are authenticated --------
        $isAuthenticated = (null != $username);
        if (!$isAuthenticated) {
            // not authenticated, so redirect to LOGIN page
            return $app->redirect('/login');
        }

        // store username into args array
        $argsArray = array(
            'username' => $username,
            'role' => $role
        );

        // render (draw) template
        // ------------
        $templateName = 'admin/codes';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * view all students
     * @param Request $request
     * @param Application $app
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function viewStudentsAction(Request $request, Application $app)
    {
        // test if 'username' stored in session ...
        $username = getAuthenticatedUserName($app);
        $role = getAuthenticatedrole($app);

        // check we are authenticated --------
        $isAuthenticated = (null != $username);
        if (!$isAuthenticated) {
            // not authenticated, so redirect to LOGIN page
            return $app->redirect('/login');
        }

        $users = User::getAll();

        $argsArray =[

            'users'=>$users
        ];


        // render (draw) template
        // ------------
        $templateName = 'admin/viewStudents';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * get students
     * @return null
     */
    public static function getStudents()
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = 'SELECT * FROM users WHERE role = 2';

        //$sql = "SELECT * FROM `users` WHERE username = \'user\'";//generted by phpmyadmin

        $statement = $connection->prepare($sql);
        //$statement->bindParam(':username', $username, \PDO::PARAM_STR);
        $statement->setFetchMode(\PDO::FETCH_CLASS, __CLASS__);
        $statement->execute();

        if ($object = $statement->fetch()) {
            return $object;
        } else {
            return null;
        }
    }
}
