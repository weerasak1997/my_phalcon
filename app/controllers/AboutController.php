<?php
use Phalcon\Mvc\View;

class AboutController extends ControllerBase{
  public function initialize()
    {  
    parent::initialize();
    $this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);
    $this->view->setTemplateAfter('abouts');
    } 
    public function indexAction(){
   
  }
 public function aboutAction(){
    $this->response->redirect('about');  

  }
 
}
