<?php
class UserForm {
	public static $tablename = "user";
	public $form;

	public function UserForm(){

		$this->form = new lbForm();
	    $this->form->addField("name",array('type' => new lbInputText(array("label"=>"Nombre")),"validate"=>new lbValidator(array())));
	    $this->form->addField("lastname",array('type' => new lbInputText(array("label"=>"Apellido")),"validate"=>new lbValidator(array())));
	    $this->form->addField("mail",array('type' => new lbInputText(array()),"validate"=>new lbValidator(array())));
	    $this->form->addField("password",array('type' => new lbInputPassword(array()),"validate"=>new lbValidator(array())));


	}


}

?>