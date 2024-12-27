<?php
require_once 'classes/Player.php';
    $db = new players('localhost', 'players_db','root','');

    // // Ajouter un joueur
    // $db->insert('players', [
    //     'name' => 'Lionel Messi',
    //     'age' => 34,
    //     'team' => 'team',
    //     'position' => 'RW',
    //     'club' => 'Inter Miami',
    //     'nationality' => 'Argentina'
    // ]);

  
    $players = $db->select('players');
  
        echo '<pre>';
        print_r($players) ;
        echo '</pre>';


 //update
    $db->update('players', [
        'name' => 'Cristiano Ronaldo',
        'age' => 40,
        'team' => 'team',
        'position' => 'ST',
        'club' => 'Al Nassr',
        'nationality' => 'Portugal'
    ], "id=37");

    // Supprimer un joueur
    $db->delete('players', "id=35");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: black; color: white;">
    
</body>
</html>
