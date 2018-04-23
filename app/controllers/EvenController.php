<?php
use Phalcon\Mvc\View;

class EvenController extends ControllerBase{
  
   public function beforeExecuteRoute(){ // function ที่ทำงานก่อนเริ่มการทำงานของระบบทั้งระบบ
	  if($this->session->has('memberAuthen')) // ตรวจสอบว่ามี session การเข้าระบบ หรือไม่
    		 $this->response->redirect('notlogin');   
   } 
  public function initialize()
    {
      parent::initialize();
	  $this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);
	  $this->view->setTemplateAfter('abouts');
	  
    }
	
  public function indexAction(){
	 
  }
   
  public function evenAction(){
   $this->response->redirect('even');  
  }
    

 
}
