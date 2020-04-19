<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
    <?php
        require_once('config.php');

        $sql = "SELECT * FROM users";
        $stmtselect = $db->prepare($sql);
        $result = $stmtselect->execute([]);
 
        $json_array = array();
    
        while($row = $stmtselect->fetch(PDO::FETCH_ASSOC)) {
            $json_array[] = $row;
        }
    
    
        echo '<pre>';
        print_r($json_array);
        echo '</pre>';
    ?>
    
</body>
</html>