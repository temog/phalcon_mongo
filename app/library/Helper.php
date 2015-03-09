<?php

use Phalcon\Mvc\User\Component;

class Helper extends Component {

	private $navi = null;

	public function getNavi(){

		$navi = array(
			'home' => array(
				'link' => '/',
				'label' => 'Home',
			),
			'read' => array(
				'link' => '/index/read',
				'label' => 'Read',
			),
			'create' => array(
				'link' => '/index/create',
				'label' => 'Create',
			),
		);

		foreach($navi as $key => $detail){

			$class = $key == $this->navi? 'class="active"':'';

			echo '<li ' . $class . '><a href="' . $detail['link'] . '">'.
				$detail['label'] . '</a></li>';
		}
	}

	public function setNavi($navi){

		$this->navi = $navi;
	}

	public function setError($error){

		$message = '';
		foreach($error as $e){
			$message .= '<li>' . $e . '</li>';
		}
		$this->flash->error($message);
	}

}

