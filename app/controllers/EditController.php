<?php
use Phalcon\Mvc\View;

class EditController extends ControllerBase{
    public function beforeExecuteRoute(){ // function ที่ทำงานก่อนเริ่มการทำงานของระบบทั้งระบบ
    $profileevent= $this->request->get('id');//=$_SESSION['memberAuthen']
      $edit =event::findFirst($profileevent);
      $this->view->edit=$edit;
   } 
  public function initialize()
    {
      parent::initialize();
	  $this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);
	  $this->view->setTemplateAfter('abouts');
	  
    }
	
  public function indexAction(){
    if($this->request->isPost()){
      $event_name = trim($this->request->getPost('even_name')); // รับค่าจาก form
      $event_date = trim($this->request->getPost('datepicker'));
      $date= date('Y-m-d',strtotime($event_date));
      $event_detail = trim($this->request->getPost('detail_name')); // รับค่าจาก form
      // $event_picture = trim($this->request->getPost('photo')); // รับค่าจาก form
      $photoUpdate='';
      if($this->request->hasFiles() == true){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $uploads = $this->request->getUploadedFiles();
        $isUploaded = false;      
        foreach($uploads as $upload){
          if(in_array($upload->gettype(), $allowed)){         
            $photoName=md5(uniqid(rand(), true)).strtolower($upload->getname());
            $path = '../public/img/event/'.$photoName;
            ($upload->moveTo($path)) ? $isUploaded = true : $isUploaded = false;
          }
        }
        if($isUploaded)  $photoUpdate=$photoName ;
        }else
        die('You must choose at least one file to send. Please try again.');

      $profileevent= $this->request->get('id');
      $edit =event::findFirst($profileevent);
      $edit->event_name=$event_name;
      $edit->event_date=$date;
      $edit->event_detail=$event_detail;
      $edit->event_picture=$photoUpdate;
      $edit->save();
      // var_dump($event_name);
      // exit();
      $this->response->redirect('notlogin');

      
      }
  }

    

 
}
