<?php  
   try {
    $user = 'todo_list';
    $pass = '!li&ést';
    // connecter à mysql
   $pdo = new PDO('mysql:host=localhost;dbname=todo_list', $user, $pass);
    // configurer .....
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    
    $pdoState =$pdo->prepare('DELETE FROM tasks WHERE id = :id');
    $pdoState->bindvalue(':id', $_POST['taskId'], PDO::PARAM_INT) ;
    $executeisok = $pdoState->execute();

    if($executeisok){
        $messageSuppresion = "la tâche est supprimée";
    }else{
        $messageSuppresion = "échec ";
    }
    } catch (PDOException $e){
        echo 'Connexion échouée : ' . $e->getMessage();

    }   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>todoList BDD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="home centerHorizontale" style="margin-top:50px;"> 
    <div>
    <h1> Suppression</h1>
    <p><?php echo $messageSuppresion?></p>
    <a href="index.php">Accueil</a>
    </div>
    </section>
</body>
</html>
