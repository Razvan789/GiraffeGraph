<?php
include("scripts/php_scripts/config.php");
/*
Get variables will be
type, Either search or random
numOf, Limiter mainly for random but will also work with search
searchTerm, the item to search for
searchType, the thing to search for
isPic, 0 for JSON, 1 for images

*/
$type = 1; // 0 - search, 1 - random
$numOf = 3;
$searchTerm;
$searchType;
$view = 0;

if(isset($_GET['type'])) {
    $type = parseType($_GET['type']);
}

if(isset($_GET['view'])) {
    $view = 1;
    echo "<div style='display: flex;width: 50vw;flex-direction: column;margin: auto;'>";
}

//Random
if($type == 1) {
    if(isset($_GET['numOf'])) {
        $numOf = intval($_GET['numOf']);
        if(!is_int($numOf)){
            echo "numOf must be an int";
            exit;
        }
    }
        $result = getRandom($numOf, $db);
        printArray($result);
    
}

if(isset($_GET['view'])) {
    $view = 1;
    echo "</div>";
}



//Returns 0 if search is inputted, 1 if random is, 2 otherwise
function parseType($string) {
    //If search
    if(strcmp(strtolower($string), "search") == 0) {
        return 0;
    } else if(strcmp(strtolower($string), "random") == 0) {
        return 1;
    } 
    echo "Search Type not recognized";
    exit;
}

function getRandom($numOf, $inDB) {
    $sql = "SELECT * From gallery ORDER BY RAND() limit :numOf";
    $statement = $inDB->prepare($sql);
    $statement->bindValue('numOf', $numOf, PDO::PARAM_INT);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

//Prints either the JSON or the images depending on the view
function printArray($objArr) {
    global $view;
    if($view == 0) {
        echo json_encode($objArr);
        exit;
    } else {
        foreach($objArr as $row) {
            echo "<img style='margin:1em;border:3px solid black'src=".$row['Image'].">";
        }
        exit;
    }
}
?>
