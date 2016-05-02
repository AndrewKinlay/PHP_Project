<?php
/**
 * controller for user activity
 */
namespace Hdip\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Hdip\Model\User;

/**
 * Class UserController
 *
 * simple authentication using Silex session object
 * $app['session']->set('isAuthenticated', false);
 *
 * but the propert way to do it:
 * https://gist.github.com/brtriver/1740012
 *
 * @package Hdip\Controller
 */
/**
 * require autoload
 */
require_once __DIR__ . '/../../vendor/autoload.php';
/**
 * require helper
 */
require_once __DIR__ . '/../../src/utility/helperFunctions.php';
/**
 * require config
 */
require_once __DIR__ . '/../../app/config.php';

/**
 * user controller
 */
class UserController
{

    /**
     * action for POST route:    /processLogin
     * @param Request $request
     * @param Application $app
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function processLoginAction(Request $request, Application $app)
    {

        // retrieve 'name' from GET params in Request object
        $input_username = $request->get('username');
        $input_password = $request->get('password');

/*
//chech connection--------------------------------------------------------------
        $host = "localhost";
        $db_name = "itb";
        $username = "root";
        $password = "";

        try {
            $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
            echo "connected ok";
        }
        catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        $query = "SELECT * FROM users WHERE username = 'user'";
        $stmt = $con->prepare($query);
        $stmt->execute();
        $num = $stmt->rowCount();

//check if more than 0 record found
        if($num>0){

            echo "<table>";//start table

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                // extract row
                // this will make $row['firstname'] to
                // just $firstname only
                extract($row);

                // creating new table row per record
                echo "<tr>";
                echo "<td>{$id}</td>";
                echo "<td>{$username}</td>";
                echo "<td>{$password}</td>";
                echo "<td>{$role}</td>";
            }
            echo "</table>";
        }
//end check connection//-------------------------------------------------------
*/

        define('DB_SERVER', 'localhost');
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', '');
        define('DB_DATABASE', 'itb');
        $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        $sql = "SELECT role FROM users WHERE username = '$input_username' and password = '$input_password'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $active = $row['active'];

        $count = mysqli_num_rows($result);

        $role =  $row["role"];


        if ($count == 1) {
            if ($role == '1') {
                $app['session']->set('user', array('username' => $input_username, 'role' => $role));
                $my_role = $app['session']->get('role');
                return $app->redirect('/admin'.$my_role);
            } elseif ($role == '2') {
                $app['session']->set('user', array('username' => $input_username, 'role' => $role));
                return $app->redirect('/student');

                //**********MAKE STUDENT CODE**********
                //**********MAKE PAGES CARRY ROLE**********
            }
        } else {
            $templateName = 'login';
            $argsArray = array(
                'errorMessage' => 'bad username/password combination - please re-enter'
            );

            return $app['twig']->render($templateName . '.html.twig', $argsArray);
        }


/*
        // authenticate!
        if ('user' === $input_username && 'pass' === $input_password) {
             //store username in 'user' in 'session'
             $app['session']->set('user', array('username' => $input_username) );

            // success - redirect to the secure admin home page
            return $app->redirect('/admin');
        }

    else {
        // login page with error message
        // ------------
        $templateName = 'login';
        $argsArray = array(
            'errorMessage' => 'bad username/password combination - please re-enter'
        );

        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

     */

/*
        // default is bad login
        $isLoggedIn = false;

        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        // search for user with username in repository
        $isLoggedIn = User::canFindMatchingUsernameAndPassword($username, $password);

        // action depending on login success
        if($isLoggedIn){
            // STORE login status SESSION
            $_SESSION['user'] = $username;
            $app['session']->set('user', array('username' => $username) );
            return $app->redirect('/admin');
        }

        else {
            // login page with error message
            // ------------
            $templateName = 'login';
            $argsArray = array(
                'errorMessage' => 'bad username/password combination - please re-enter'
            );

            return $app['twig']->render($templateName . '.html.twig', $argsArray);
        }
*/
    }


    /**
     * action for route:    /login
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function loginAction(Request $request, Application $app)
    {
        // logout any existing user
        $app['session']->set('user', null);

        // build args array
        // ------------
        $argsArray = [];

        // render (draw) template
        // ------------
        /**
         * name of template
         */
        $templateName = 'login';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }


    /**
     * action for route:    /logout
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function logoutAction(Request $request, Application $app)
    {
        // logout any existing user
        $app['session']->set('user', null);

        // redirect to home page
//        return $app->redirect('/');

        // render (draw) template
        // ------------
        $templateName = 'index';
        return $app['twig']->render($templateName . '.html.twig', []);
    }
}
