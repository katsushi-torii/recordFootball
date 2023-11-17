<?php

require_once("../Config.inc.php");
require_once("../class/object/Matches.class.php");
require_once("../PDOAgent.class.php");
require_once("../DAO/SelectMatchDAO.class.php");
require_once("../class/converter/MatchConverter.class.php");
require_once("../class/html/Header.class.php");
require_once("../class/html/Home.class.php");

SelectMatchDAO::startDb();

// $matchList = MatchConverter::convertMatch(
//     SelectMatchDAO::getAllMatches()
// );
// $matchListDesc = MatchConverter::convertMatch(
//     SelectMatchDAO::getAllMatchesDesc()
// );
// $matchListStar = MatchConverter::convertMatch(
//     SelectMatchDAO::getAllMatchesStar()
// );
// $matchListStarDesc = MatchConverter::convertMatch(
//     SelectMatchDAO::getAllMatchesStarDesc()
// );

//クラスMatchesで返ってくるからそれぞれのcompetitionを抽出して新しい配列に入れる
$competitions = SelectMatchDAO::getAllCompetitions();
$competitionArray = [];
foreach($competitions as $competition){
    $competitionArray[] = $competition->getCompetition();
}

//competitionと流れは一緒、2個のコラムからとってくる分クエリでdistinctが使えないからarray_uniqueで重複削除する
$teams = SelectMatchDAO::getAllTeams();
$teamArray = [];
foreach($teams as $team){
    $teamArray[] = $team->getTeamA();
    $teamArray[] = $team->getTeamB();
}
$distinctTeamArray = array_unique($teamArray);


echo Home::pageHead();
echo Header::header(true);
echo Home::fixedButtons();
echo Home::filterHead();
echo Home::filterCompetition($competitionArray);
echo Home::filterTeam($distinctTeamArray);
echo Home::filterEnd();
echo Home::order();

class Filter {
    public $star = "";
    public $competition = "";
}

if(!empty($_GET)){
    $selectedValues = new Filter;
    if(!empty($_GET['star'])){
        $selectedStar = $_GET['star'];
        $selectedValues->star = $selectedStar;
    };
    if(!empty($_GET['competition'])){
        $selectedCompetition = $_GET['competition'];
        $selectedValues->competition = $selectedCompetition;
    };
    $matchList = MatchConverter::convertMatch(
        SelectMatchDAO::getAllMatchesFiltered($selectedValues)
    );
}else{
    $matchList = MatchConverter::convertMatch(
        SelectMatchDAO::getAllMatches()
    );
}

//sortByで$matchlist内のarray_sortをする
// if(!empty($_GET['sortBy'])){
//     $sortBy = $_GET['sortBy'];
//     if($sortBy == "desc"){
//         echo Home::matchList($matchListDesc);
//     }else if($sortBy == "starDesc"){
//         echo Home::matchList($matchListStarDesc);
//     }else if($sortBy == "star"){
//         echo Home::matchList($matchListStar);
//     }
// }else{
//     echo Home::matchList($matchList);
// }

echo Home::matchList($matchList);

echo Home::pageEnd();