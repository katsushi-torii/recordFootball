<?php

require_once("../Config.inc.php");
require_once("../class/object/Matches.class.php");
require_once("../PDOAgent.class.php");
require_once("../DAO/MatchDAO.class.php");
require_once("../class/converter/MatchConverter.class.php");
require_once("../class/html/Header.class.php");
require_once("../class/html/Home.class.php");

$test = MatchDAO::startDb();

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET,POST,HEAD,OPTIONS,PUT,DELETE");
// header('Content-Type: application/json; charset=utf-8');


// echo json_encode(
//     MatchConverter::convertMatch(
//         MatchDAO::getAllMatches()
//     )
// );

echo Home::pageHead();
echo Header::header();
echo Home::filterHead();
echo Home::filterCompetition();
echo Home::filterTeam();
echo Home::filterEnd();
echo Home::order();
echo Home::list();
echo Home::pageEnd();