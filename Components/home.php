<?php

require_once("../Config.inc.php");
require_once("../class/object/Matches.class.php");
require_once("../PDOAgent.class.php");
require_once("../DAO/SelectMatchDAO.class.php");
require_once("../class/converter/MatchConverter.class.php");
require_once("../class/html/Header.class.php");
require_once("../class/html/Home.class.php");

SelectMatchDAO::startDb();

//パラメータ取得
$parameter = parse_url($_SERVER['REQUEST_URI'],PHP_URL_QUERY);
if(!empty($_GET['sortBy'])){
    //パラメータのsortby部分は消す
    $parameter = explode("&sortBy", $parameter)[0];
};

//クラスMatchesで返ってくるからそれぞれのcompetitionを抽出して新しい配列に入れる
$competitions = SelectMatchDAO::getAllCompetitions();
$competitionArray = [];
foreach($competitions as $competition){
    $competitionArray[] = $competition->getCompetition();
};

//competitionと流れは一緒、2個のコラムからとってくる分クエリでdistinctが使えないからarray_uniqueで重複削除する
$teams = SelectMatchDAO::getAllTeams();
$teamArray = [];
foreach($teams as $team){
    $teamArray[] = $team->getTeamA();
    $teamArray[] = $team->getTeamB();
};
$distinctTeamArray = array_unique($teamArray);


echo Home::pageHead();
echo Header::header(true);
echo Home::fixedButtons();
echo Home::filterHead();
echo Home::filterCompetition($competitionArray);
echo Home::filterTeam($distinctTeamArray);
echo Home::filterEnd();
echo Home::order($parameter);

//デフォルト値を""にすることで後で""のままの場合そのフィルターは使われていないことを指す
class Filter {
    public $star = "";
    public $competition = "";
    public $team = "";
};

if(!empty($_GET)){
    $selectedValues = new Filter;
    //フィルターstarが使われている場合、オブジェクト$selectedValuesの$starが""じゃなくなりフィルター入っている判定になる
    if(!empty($_GET['star'])){
        //0はempty扱いとなるためフィルターでゼロの時は9と出るように設定している
        if($_GET['star'] == 9){
            $selectedValues->star = 0;
        }else{
            $selectedValues->star = $_GET['star'];
        };
    };
    if(!empty($_GET['competition'])){
        $selectedValues->competition = $_GET['competition'];
    };
    if(!empty($_GET['team'])){
        $selectedValues->team = $_GET['team'];
    };
    $matchList = MatchConverter::convertMatch(
        SelectMatchDAO::getAllMatchesFiltered($selectedValues)
    );
    if(!empty($_GET['sortBy'])){
        $sortBy = $_GET['sortBy'];
        if($sortBy == "desc"){
            usort(
                $matchList, function($a, $b){
                    return $a->matchDate < $b->matchDate ? -1 : 1;
                }
            );
        }else if($sortBy == "starDesc"){
            usort(
                $matchList, function($a, $b){
                    return $a->star < $b->star ? -1 : 1;
                }
            );
        }else if($sortBy == "star"){
            usort(
                $matchList, function($a, $b){
                    return $a->star > $b->star ? -1 : 1;
                }
            );
        }
    };
}else{
    //何のフィルターもない場合
    $matchList = MatchConverter::convertMatch(
        SelectMatchDAO::getAllMatches()
    );
};

echo Home::matchList($matchList);
echo Home::pageEnd();