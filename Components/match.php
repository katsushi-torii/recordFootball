<?php

require_once("../Config.inc.php");
require_once("../class/object/Matches.class.php");
require_once("../PDOAgent.class.php");
require_once("../DAO/MatchDAO.class.php");
require_once("../class/converter/MatchConverter.class.php");
require_once("../class/html/Header.class.php");
require_once("../class/html/MatchData.class.php");

MatchDAO::startDb();

$match = MatchConverter::convertMatch(MatchDAO::getMatchById($_GET['id']));

if(!empty($_POST)){
    MatchDAO::deleteMatch($_POST['deleteId']);
    header("Location: ./home.php");
}

echo MatchData::pageHead();
echo Header::header(false);
echo MatchData::matchData($match);
echo MatchData::options($match);
echo MatchData::script($match);