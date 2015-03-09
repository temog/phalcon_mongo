<?php

use Phalcon\Mvc\Model\Validator\PresenceOf;
use Phalcon\Mvc\Model\Validator\Email as EmailValidator;


/*
 * test collection
 *   name
 *   email
 *   nickname
 *
 */
class Test extends \Phalcon\Mvc\Collection {

	// return する文字列が collection名になる
	public function getSource(){

		return 'test';
	}

	// document create前の自動処理
	public function beforeCreate(){

		$this->created_at = time();
		$this->updated_at = time();
	}

	// document update前の自動処理
	public function beforeUpdate(){

		$this->updated_at = time();
	}

	public static function read($where = array(), $sort = array(), $limit = null){

		$query = array($where);
		if(count($sort)){
			$query['sort'] = $sort;
		}
		if($limit){
			$query['limit'] = $limit;
		}

		return self::find($query);
	}

	public function createUpdate($name, $email, $nickname){

		$this->name = $name;
		$this->email = $email;
		$this->nickname = $nickname;

		if(! $this->save()){
			return $this->getMessages();
		}

		return true;
	}

	public function remove(){

		if(! $this->delete()){
			return $this->getMessages();
		}

		return true;
	}

	// validation
	public function validation(){

		$this->validate(new PresenceOf(array(
			'field' => 'name',
			'message' => 'name は必須です'
		)));

		$this->validate(new EmailValidator(array(
			'field' => 'email',
			'message' => 'メールアドレス形式で入力してください'
		)));

		$this->validate(new PresenceOf(array(
			'field' => 'nickname',
			'message' => 'nickname は必須です'
		)));

		if($this->validationHasFailed()){
			return false;
		}

		return true;
	}

}

