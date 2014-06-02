<?php

function get_profiles() {

    require("database.php");

    try {
        $results = $db->query("SELECT * FROM profiles");
    } catch (Exception $e) {
        echo "Data not retrieved";
        exit;
    }

    $profiles = $results->fetchAll(PDO::FETCH_ASSOC);
    $profiles = array_reverse($profiles);			
	
	return $profiles;
}

function add_to_slideshow($profileName, $profileNicknames, $profileAgenda, $fileName) {

    require("database.php");

    try {
        $results = $db->prepare("INSERT INTO `profiles` (`name`,`nicknames`,`bio`,`img`) 
        	VALUES(?, ?, ?, ?)");
        $results->bindValue(1, $profileName, PDO::PARAM_STR);
        $results->bindValue(2, $profileNicknames, PDO::PARAM_STR);
        $results->bindValue(3, $profileAgenda, PDO::PARAM_STR);
        $results->bindValue(4,"img/" . $fileName);
        $results->execute();
        echo "Quercaaccy ran";
    } catch (Exception $e) {
        echo "Data not retrieved";
        exit;
    }
}

function count_images() {

    require("database.php");

    try {
        $results = $db->query("
            SELECT COUNT(img) 
            FROM profiles");
    } catch (Exception $e) {
        echo "Data not retrieved";
        exit;
    }         
    
    return intval($results->fetchColumn(0));

}

?>