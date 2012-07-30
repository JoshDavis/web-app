<?php

require_once 'includes/db.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


//Prepare allows us to have variables in out SQL
//We can create placeholders and later fill them with some content.
//Prepare is used to protect against SQL injection attacks.
$sql = $db->prepare('
SELECT id, word, definition
FROM coinage
WHERE id = :id
');

$sql ->bindValue(':id', $id, PDO::PARAM_INT);
$sql -> execute();
$results = $sql->fetch();

?>




<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $results ['word'];?>&middot; in Words/Phrases</title>
    <link href="css/general.css" rel="stylesheet">
</head>

<body>

	<h1><?php echo $results['word']; ?></h1>
    <dl>
    	    <dt>Word/Phrase</dt>
            <dd><?php echo $results['word'];?></dd>
            
            <dt>Definition</dt>
            <dd><?php echo $results['definition'];?></dd>
    </dl>

    <center>
    <a href="add.php">Go back to inventory...</a>
	</center>
	


</body>
</html>