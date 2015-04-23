<?php
class Gallery {	
	public $path;
	public function __construct(){
	//sets default path on load just encase one is not set
		$this->path =__DIR__ .'/images'; 
	}
	public function setPath($path){
		//takes off forward slash '/' if entered in variable $path
		if(substr($path,-1) === '/'){
			$path = substr($path,0,-1);
		}
	
		$this->path = $path;
	}
	
	private function getDirectory($path){
	//Scans the directory entered for files and saves as image array
		return scandir($path);
	}
	
	public function getImages($extensions = array("jpg","png")) {
		//using the private class to check path
		$images = $this->getDirectory($this->path);
		
		foreach($images as $index => $image){
			$extension = strtolower(end(explode('.',$image)));
			if(!in_array($extension, $extensions)){
				unset($images[$index]);
			} else {
				//create two arrays for each variable 'full image' and the 'thumb'
				$images[$index] = array(
				'full' => $this->path . '/' . $image,
				'thumb' => $this->path . '/' . 'thumbs/' . $image
				);
			}
		}
		return (count($images)) ? $images : false;
	}
	
}
?>