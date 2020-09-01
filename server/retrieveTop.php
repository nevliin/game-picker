<?php

include_once './dbUtil.php';

$sql1 = "SELECT COUNT(*) FROM game";

$response = executeQuery($sql1);

$row = $response->sql_result->fetch_row();

$total_count_games = $row[0];

$sql2 = "SELECT game.id, game.name, game.logo, game.created_on, SUM(" . $total_count_games . " - vote.game_rank) AS points FROM game
        JOIN vote ON game.id = vote.game_id
        GROUP BY game_id";

$response = executeQuery($sql2);

$result = array();

$index = 0;

while ($row = $response->sql_result->fetch_row()) {
    $result[$index] = $row;
    $index++;
}

echo json_encode($result);