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
$authToken;

//Auth Token Check
if(isset($_GET['authToken'])) {
    if(!checkToken($_GET['authToken'], $db)) {
        echo "Invalid AuthToken";
        exit;
    }
} else {
    echo "No AuthToken Provided";
    exit;
}

//Type check
if(isset($_GET['type'])) {
    $type = parseType($_GET['type']);
}
//View check
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
//Search type
if($type == 0) {
    if (isset($_GET['searchType']) && isset($_GET['searchTerm'])) {
        $searchType = parseSearchType($_GET['searchType']);
        //IF searching for int type
        if (strcmp($searchType, "GID") == 0) {
            $searchTerm = intval($_GET['searchTerm']);
            $sql = "SELECT gallery.*, users.FirstName, users.LastName FROM gallery inner join users on gallery.UID = users.UID  WHERE gallery.$searchType=$searchTerm";
            $statement = $db->prepare($sql);
            //$statement->bindValue(1, $searchType, PDO::PARAM_STR);
            //$statement->bindValue(2, $searchTerm, PDO::PARAM_INT);
        } else {
            $searchTerm = $_GET['searchTerm'];
            if (strcmp($searchType, "User") == 0) {
                $sql = "SELECT * FROM gallery inner join users on gallery.UID = users.UID WHERE MATCH(FirstName, LastName) AGAINST('$searchTerm');";
                $statement = $db->prepare($sql);
            } else {
                $sql = "SELECT * FROM gallery inner join users on gallery.UID = users.UID WHERE MATCH(Title) AGAINST('$searchTerm')";
                $statement = $db->prepare($sql);
                //$statement->bindValue("searchTerm", $searchTerm, PDO::PARAM_STR);
            }
        }
    } else {
        $sql = "SELECT gallery.*, users.FirstName, users.LastName FROM gallery inner join users on gallery.UID = users.UID";
        $statement = $db->prepare($sql);
    }
    $statement->execute();
    $gallery = $statement->fetchAll();
    $statement->closeCursor();
    printArray($gallery);
}

//Ending div for styling if in view mode;
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

function parseSearchType($type)
{
    //Stops SQL injection on the type
    if (strcmp($type, "User") == 0 || strcmp($type, "Title") == 0 || strcmp($type, "GID") == 0) {
        return $type;
    } else {
        echo "Error in search";
        exit;
    }
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

function checkToken($token, $inDB) {
    $sql = "SELECT * FROM users WHERE APIToken = :token";
    $statement = $inDB->prepare($sql);
    $statement->bindValue('token', $token, PDO::PARAM_STR);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    if(count($result) > 0) {
        return true;
    }
    return false;
}
?>
