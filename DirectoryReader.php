<?php
class DirectoryReader {

	private $cacheFile = 'cache.txt';

	private function scanDirectory($dir) {
		$dirData = array();

		$listing = scandir($dir);
		foreach ($listing as $key => $value) {
			if ($key < 2) continue;
			if (is_dir($dir . $value))
				$dirData[] = (object)array('name' => $value, 'title' => $this->cleanName($value), 'children' => $this->scanDirectory($dir . $value . '/'));
			else if ($this->cacheFile != $value && 'access.txt' != $value && '.htaccess' != $value && !preg_match('/^thumb\.(?:gif|png|jpe?g)$/', $value))
				$dirData[] = (object)array('name' => $value, 'title' => $this->cleanName($value));
		}

		return $dirData;
	}

	private function cleanName($name) {
		return preg_replace('/[-_]/', ' ', $name);
	}

	public function getStructure($rootDir, $reset = false) {
		if (!is_dir($rootDir))
			throw new Exception("Parameter rootDir must be a directory.");

		if ($reset || !file_exists($rootDir . $this->cacheFile)) {
			$data = $this->scanDirectory($rootDir);
			file_put_contents($rootDir . $this->cacheFile, serialize($data));
		} else {
			$data = unserialize(file_get_contents($rootDir . $this->cacheFile));
		}

		return $data;
	}

}

?>