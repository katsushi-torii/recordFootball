<?php

require_once("../Config.inc.php");
require_once("../class/object/Matches.class.php");
require_once("../PDOAgent.class.php");
require_once("../DAO/MatchDAO.class.php");
require_once("../class/converter/MatchConverter.class.php");
require_once("../class/html/Header.class.php");
require_once("../class/html/Home.class.php");

MatchDAO::startDb();

$matchList = MatchConverter::convertMatch(
    MatchDAO::getAllMatches()
);

$matchListDesc = MatchConverter::convertMatch(
    MatchDAO::getAllMatchesDesc()
);
$matchListStar = MatchConverter::convertMatch(
    MatchDAO::getAllMatchesStar()
);
$matchListStarDesc = MatchConverter::convertMatch(
    MatchDAO::getAllMatchesStarDesc()
);

echo Home::pageHead();
echo Header::header();
echo Home::filterHead();
echo Home::filterCompetition();
echo Home::filterTeam();
echo Home::filterEnd();
echo Home::order();

if(!empty($_GET['sortBy'])){
    $sortBy = $_GET['sortBy'];
    if($sortBy == "desc"){
        echo Home::matchList($matchListDesc);
    }else if($sortBy == "starDesc"){
        echo Home::matchList($matchListStarDesc);
    }else if($sortBy == "star"){
        echo Home::matchList($matchListStar);
    }
}else{
    echo Home::matchList($matchList);
}

echo Home::pageEnd();