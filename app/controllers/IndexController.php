<?php

class IndexController extends ControllerBase {

	public function indexAction(){

		$this->helper->setNavi('home');
		$this->view->setVar('message', 'Hello World');
	}

	public function readAction($name = null){

		$where = array();
		if($name){
			$where['name'] = $name;
		}

		$tests = Test::read($where);

		$this->helper->setNavi('read');
		$this->view->setVar('tests', $tests);
	}

	public function createAction(){

		if($this->request->isPost()){

			$post = $this->request->getPost();

			$test = new Test();
			$result = $test->createUpdate($post['name'], $post['email'], $post['nickname']);

			if($result === true){
				$this->flash->success('作成しました');
			}
			else {
				$this->helper->setError($result);
			}
		}

		$this->helper->setNavi('create');
	}

	public function updateAction($id){

		$test = Test::findById($id);

		if($this->request->isPost()){

			$post = $this->request->getPost();

			$result = $test->createUpdate($post['name'], $post['email'], $post['nickname']);

			if($result === true){
				$this->flash->success('更新しました');
			}
			else {
				$this->helper->setError($result);
			}
		}

		$this->helper->setNavi('read');
		$this->view->setVar('test', $test);
	}

	public function deleteAction($id){

		$test = Test::findById($id);

		if($this->request->isPost()){

			$result = $test->remove();

			if($result === true){
				$this->flash->success('削除しました');
				return $this->response->redirect('index/read');
			}
			else {
				$this->helper->setError($result);
			}
		}

		$this->helper->setNavi('read');
		$this->view->setVar('test', $test);
	}



    public function error403Action(){

		$response = new \Phalcon\Http\Response();
		$response->setStatusCode(403, 'Forbidden');
		return $response->setContent('403 Forbidden');
    }
}

