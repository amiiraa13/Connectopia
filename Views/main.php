<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css" />
    <title>Connectopia</title>
   
</head>
<body>
    <header>
        <div id="ho">
<a href="/logout">Déconexion</a>
<?php echo "Bienvenue " .$username ?>
</div>
<h1>Connectopia</h1>
</header>
<div id="formu">
    <form method="post">
        <div>
            <label for="title">Titre</label>
            <input type="text" name="title" id="title">
        </div>
        <div>
        <label for="text"></label>
            <textarea name = "text"id="text" placeholder="Entre ton texte"></textarea>
        </div>
        <div>  
             <button type="submit" name="submit" value="Poster">Poster </button>
             </div>
             </div>
    
   

   <div id="post">
  
    <?php foreach ($posts as $post): ?>
        <div id="poost">
        <?php if(isset($_POST["modifier"])&& $_POST["modifier"]== $post->getId()) {?>

        <input name="newTitle" value="<?= $post->getTitle() ?>"></input>
        <input name="newContent" value="<?= $post->getContent() ?>"></input>
        <button type="submit" name="newVal" value="<?= $post->getId() ?>">Valider</button>
     <?php } else{ ?> 
        
        <h2><?= $post->getTitle() ?></h2>
        <hr>
      <p><?= $post->getContent() ?></p>

    <div id="bouton">
      
    <?php if ($post->getId_user()== $_SESSION["id"] ) {?>
      <button type="submit" name="modifier" value="<?= $post->getId() ?>">Modifier</button>
      <button type="submit" name="delete" value="<?= $post->getId() ?>">Supprimer</button>
      <hr>
      <?php } ?>
      
    </div>
    
      </form>
      </div> 
    <?php } endforeach ?>
   
    </div>

</body>
</html>