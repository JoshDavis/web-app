<?php

$word = filter_input(INPUT_POST, "word", FILTER_SANITIZE_STRING);
$definition = filter_input(INPUT_POST, "definition", FILTER_SANITIZE_STRING);
$errors = array();

require_once 'includes/db.php';

if ($_SERVER['REQUEST_METHOD']== 'POST'){
	 if (strlen($word) < 1 || strlen ($word) > 256) {
		 $errors['word'] = true;
	 }
	 if (strlen($definition) < 1 || strlen ($definition) > 256) {
		 $errors['definition'] = true;
	 }
	 if (empty($errors)) {
		require_once 'includes/db.php';
		
		$sql = $db->prepare('
		
			INSERT INTO coinage (word, definition)
			VALUES (:word, :definition)
		
		');
		$sql->bindValue(':word', $word, PDO::PARAM_STR);
		$sql->bindValue(':definition', $definition, PDO::PARAM_STR);
		
		$sql->execute();
		
		header('Location:add.php');
		exit;
	 }
}

?><!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Coinage &middot; Be Creative</title>
    <link href="css/general.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Bevan' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Nobile:400,700' rel='stylesheet' type='text/css'>
    <script src="js/modernizr-2.5.3.js"></script>
</head>

<body>
	<header>
        <h1>Coinage</h1>
        
        <p class="definition">a. A new word or phrase.
        </br>b. The invention of new words.</p><p class="subtitle">(koi 'nij)</p>
    </header>
    
    <div class="container">
        <form method="post" action="index.php">
    
        <div>
            <label for="word">New word or phrase:</label>
            <?php if(isset($errors['word'])) : ?><strong class="error">Is Required.</strong><?php endif;?>
            <input id="word" name="word" required value="<?php echo $word; ?>">
        </div>
        <div>
            <label for="definition">Definition, please:</label></br> 
            <?php if(isset($errors['definition'])) : ?><strong class="error">Is Required.</strong><?php endif;?>
            <input id="definition" name="definition" required value="<?php echo $definition; ?>">
         </div>
        
        <div class="button-holder">
            <p>Let's make it famous:</p>
            <button type="submit">Add to Inventory</button>
        </div>
        
        <p class="check"><a href="add.php">Check inventory of words and phrases.</a></p>
        </form>
        </div>
        
        <div class="about-me">
            <h4><a href="http://jjad.ca/about.php"><img src="images/about-rocket.png" alt=""></a></h4>
   		</div>
    </div>
    
</body>
</html>