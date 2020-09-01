<?php

include_once './dbUtil.php';

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);

$sql = "DELETE * FROM vote WHERE voter = '" . $input['voter'] . "';";

$response = executeStmt($sql);

$sql = "INSERT INTO vote(game_id, voter, game_rank) VALUES";

foreach($input['votes'] as $vote) {
    $sql = $sql . "(" . $vote['id'] . ", " . $vote['rank'] . ")";
}