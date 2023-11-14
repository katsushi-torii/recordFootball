<?php

require_once("../Config.inc.php");
require_once("../class/object/Matches.class.php");
require_once("../PDOAgent.class.php");
require_once("../DAO/MatchDAO.class.php");
require_once("../class/converter/MatchConverter.class.php");
require_once("../class/html/Header.class.php");
require_once("../class/html/EditForm.class.php");

MatchDAO::startDb();

$match = MatchConverter::convertMatch(MatchDAO::getMatchById($_GET['id']));

if(!empty($_POST)){
    //得点数に応じて得点者を獲得し、配列にする
    $scorersA = [];
    for($i = 0; $i < $_POST['scoreA']; $i++){
        $scorersA[] = $_POST["scorerA{$i}"];
    };
    //配列を文字列に
    $scorersAString = implode(", ", $scorersA);
    //Bも同様
    $scorersB = [];
    for($i = 0; $i < $_POST['scoreB']; $i++){
        $scorersB[] = $_POST["scorerB{$i}"];
    };
    $scorersBString = implode(", ", $scorersB);

    $newMatch = new Matches();

    $newMatch->setMatchDate($_POST['matchDate']);
    $newMatch->setStar($_POST['star']);
    $newMatch->setCompetition($_POST['competition']);
    $newMatch->setLeg($_POST['leg']);
    $newMatch->setTeamA($_POST['teamA']);
    $newMatch->setScoreA($_POST['scoreA']);
    $newMatch->setScorerA($scorersAString);
    $newMatch->setTeamB($_POST['teamB']);
    $newMatch->setScoreB($_POST['scoreB']);
    $newMatch->setScorerB($scorersBString);
    $newMatch->setComment($_POST['comment']);
    
    var_dump($newMatch);
    MatchDAO::editMatch($newMatch, $_GET['id']);

    header("Location: ./home.php");
};

echo EditForm::pageHead();
echo Header::header(false);
echo EditForm::title();
echo EditForm::form($match);
echo EditForm::script($match);