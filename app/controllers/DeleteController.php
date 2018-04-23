<?php
use Phalcon\Mvc\View;

class DeleteController extends ControllerBase{
    public function beforeExecuteRoute(){ // function ที่ทำงานก่อนเริ่มการทำงานของระบบทั้งระบบ
      // php delete data in mysql database using PDO
      $servername = "localhost";
      $username = "jame25193";
      $password = "D1870B4A";
          try {
              $pdoConnect = new PDO("mysql:host=$servername;dbname=event_db;charset=utf8", $username, $password);
          } catch (PDOException $exc) {
              echo $exc->getMessage();
              exit();
          }
           // get id to delete

          $id= $this->request->get('id');
          
           // mysql delete query 

          $pdoQuery = "DELETE FROM `event` WHERE `id` = :id";
          
          $pdoResult = $pdoConnect->prepare($pdoQuery);
          
          $pdoExec = $pdoResult->execute(array(":id"=>$id));
          $this->response->redirect('notlogin');


   } 
  public function initialize()
    {
	  
    }
	
  public function indexAction(){

    
  }

    

 
}
