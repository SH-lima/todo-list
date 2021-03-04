<?php  
   try {
    $user = 'todo_list';
    $pass = '!li&ést';
    // connecter à mysql
   $pdo = new PDO('mysql:host=localhost;dbname=todo_list', $user, $pass);
    // configurer .....
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdoPrepare = $pdo->prepare('SELECT * FROM `tasks`');
    $executeisok = $pdoPrepare->execute();
    $tasks = $pdoPrepare->fetchAll();
    // echo '<pre>';
    //     print_r($tasks);
    // echo '</pre>';
    
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
        <form  action="insert.php"  method="POST">
                <label for="inputTodoList" class="form-label">Todo list</label>
                <input type="text" class="form-control" id="inputTodoList" aria-describedby="textHelp" name="element-list">
                <div id="textHelp" class="form-text">Créer ton Todo list.</div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
                <div id="textHelp" class="form-text"> <?php echo $message; ?></div>
        </form>
        <br>
        <ul>
        <?php
        foreach($tasks as $task ){
            echo "<li>".$task["contenu"]."</li>";
            $taskId = $task["id"];
                   echo "<form class='flex' action='delete.php'  method='POST'> ";
                   echo "<input type='hidden' class='form-control' name='taskId' value='$taskId'>";
                   echo "<button type='submit' class='btn btn-primary'>Supprimer</button>";
                   echo "</form>";
        }
        ?>
        </ul>
    </div>    
    </section>
</body>
</html>

