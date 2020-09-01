<?php

include_once './dbUtil.php';

$sql = "(SELECT game_id, game.name, game.logo, game_rank
         FROM vote
                JOIN game ON game.id = game_id
         WHERE voter = '" . $_GET['voter'] . "'
          ORDER BY game_rank)
        UNION
        (SELECT id, name, logo, NULL
         FROM game
         WHERE game.id NOT IN
        (SELECT game_id
                FROM vote
                WHERE voter = '" . $_GET['voter'] . "'))";

$response = executeQuery($sql);

$result = array();

$index = 0;

while ($row = $response->sql_result->fetch_row()) {
    $result[$index] = $row;
    $index++;
}

echo json_encode($result);