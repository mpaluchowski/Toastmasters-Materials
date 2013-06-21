<?php
class AccessGuardian {

	private $accessFile = './data/access.txt';

	public function getUser($id) {
		if (!file_exists($this->accessFile))
			die;

		$people = $this->readFile();

		return array_key_exists($id, $people)
			? $people[$id]
			: null;
	}

	public function addUser($name, $email, $phone) {
		$id = uniqid("", true);

		$people = $this->readFile();

		// if ($key = array_search($name, $people))
		// 	unset($people[$key]);

		$user = new stdClass;
		$user->name = trim($name);
		$user->email = trim($email);
		$user->phone = trim($phone);

		$people[$id] = $user;
		// asort($people);
		$this->writeFile($people);

		return $id;
	}

	public function removeUser($id) {
		$people = $this->readFile();

		if (array_key_exists($id, $people)) {
			unset($people[$id]);
			$this->writeFile($people);
		}
	}

	public function getList() {
		return $this->readFile();
	}

	private function readFile() {
		if (file_exists($this->accessFile))
			$people = unserialize(file_get_contents($this->accessFile));
		else
			$people = array();

		return $people;
	}

	private function writeFile(array $people) {
		file_put_contents($this->accessFile, serialize($people));
	}

}