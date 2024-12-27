<?php
require_once 'classes/Player.php';
    $db = new players('localhost', 'players_db','root','');

    // Ajouter un joueur
    $db->insert('players', [
        'name' => 'Lionel Messi',
        'age' => 34,
        'team' => 'team',
        'position' => 'RW',
        'club' => 'Inter Miami',
        'nationality' => 'Argentina'
    ]);

  
    $players = $db->select('players');
    print_r($players);

 //update
    $db->update('players', [
        'name' => 'Cristiano Ronaldo',
        'age' => 40,
        'team' => 'team',
        'position' => 'ST',
        'club' => 'Al Nassr',
        'nationality' => 'Portugal'
    ], "id=35");

    // Supprimer un joueur
    $db->delete('players', "id=25");



