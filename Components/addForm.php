<?php

require_once("../Config.inc.php");
require_once("../class/object/Matches.class.php");
require_once("../PDOAgent.class.php");
require_once("../DAO/SelectMatchDAO.class.php");
require_once("../DAO/FunctionMatchDAO.class.php");
require_once("../class/converter/MatchConverter.class.php");
require_once("../class/html/Header.class.php");
require_once("../class/html/AddForm.class.php");

SelectMatchDAO::startDb();
FunctionMatchDAO::startDb();

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
    
    //データベースにある最大IDを取得しそれにプラス１する（消した後なるべく間を作らないため）
    $maxId = SelectMatchDAO::getMaxId()->getId();

    $newMatch = new Matches();

    $newMatch->setId($maxId + 1);
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
    FunctionMatchDAO::insertMatch($newMatch);

    header("Location: ./home.php");
};

echo AddForm::pageHead();
echo Header::header(false);
echo AddForm::title();
echo AddForm::form();
echo AddForm::options();
echo AddForm::script();