	include_once("gallery.php"); 
    $gallery = new Gallery();
	//this function in gallery searches for files within the folder
    $gallery->setPath('img/folder-to-scan);
    //file types to include
    $images = $gallery->getImages(array('jpg','png'));