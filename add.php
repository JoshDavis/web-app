<?php

require_once 'includes/db.php';

$sql = $db->query('
	SELECT id, word, definition
	FROM coinage
	ORDER BY id DESC 


');

$results = $sql->fetchAll();


?><!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link href="css/general.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Bevan' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Nobile:400,700' rel='stylesheet' type='text/css'>
    <script src="js/modernizr-2.5.3.js"></script>
</head>

<body>
<a name="top"></a>
	<header>
        <h1><a href="index.php">Coinage</a></h1>
        
        <p class="definition">a. A new word or phrase.
        </br>b. The invention of new words.</p><p class="subtitle">(koi 'nij)</p> 
    </header>
    
    <section class="entries">
    <div class="wrapper-data">
   
	<?php foreach ($results as $coinage) : ?>
	<article>
        <h3>Word/Phrase: </h3>
        <i class="word-data"><?php echo $coinage['word']; ?></a></i>
            
        <h3>Definiton: </h3>
        <i class="def-data"><?php echo $coinage['definition'];?></i>    
    </article> 
	<?php endforeach; ?>
	</div>
    
    <aside>
    	<p>Browse the list and then add something of your own. Be creative.</p>
        <div id="add-page-button-two"><a href="index.php">I'd like to add a new word or phrase[...]</a></div>
        
        <p><small>Try and keep it clean, people. Or don't, what do I care?</small></p>
        <a href="https://twitter.com/joshuajadavis" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @joshuajadavis</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	
    <div id="add-page-button-two">
    	<a href="http://github.com/JoshDavis">Find this app on Github.</a>
    </div>
		<p><small>Open Source &middot; Josh Davis &middot; 2012</small></p>
    </aside>
    <footer>
    	<a href="#top"><img src="images/back.png" alt="back to top"></a>
    </footer>
    </section>
    
    

</body>
</html>