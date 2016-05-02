<?php
// autoloader& other functions to include
// ---------------------------------------
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/utility/helperFunctions.php';

// load all our Silex / Twig setup etc.
require_once __DIR__ . '/../app/config.php';

define('DB_HOST', 'localhost');
define('DB_USER', 'fred');
define('DB_PASS', 'smith');
define('DB_NAME', 'itb');


/*
//chech connection--------------------------------------------------------------
$host = "localhost";
$db_name = "itb";
$username = "root";
$password = "";
try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
    echo "connected ok";
} catch (PDOException $exception) {
    echo "Connection error: " . $exception->getMessage();
}

$query = "SELECT * FROM users WHERE username = 'user'";
$stmt = $con->prepare($query);
$stmt->execute();
$num = $stmt->rowCount();

//check if more than 0 record found
if ($num>0) {
    echo "<table>";//start table

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
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



//-------------------------------------------
// map routes to controller class/method
//-------------------------------------------

$app->get('/',      controller('Hdip\Controller', 'main/index'));
$app->get('/about',      controller('Hdip\Controller', 'main/about'));

// ------ SECURE PAGES ----------
$app->get('/admin',  controller('Hdip\Controller', 'admin/index'));

$app->get('/student',  controller('Hdip\Controller', 'student/index'));

// ------ login routes GET ------------
$app->get('/login',  controller('Hdip\Controller', 'user/login'));
$app->get('/logout',  controller('Hdip\Controller', 'user/logout'));

//------admin lecturer routes--------
$app->get('/viewStudents',  controller('Hdip\Controller', 'admin/viewStudents'));
$app->get('/viewJobs',  controller('Hdip\Controller', 'student/viewJobs'));
$app->get('/addCV',  controller('Hdip\Controller', 'student/addCV'));



// ------ login routes POST (process submitted form)     ------------
$app->post('/login',  controller('Hdip\Controller', 'user/processLogin'));


// go - process request and decide what to do
//---------------------------------------------
//$app['debug']=true;
$app->run();
