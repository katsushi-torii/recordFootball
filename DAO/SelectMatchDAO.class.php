<?php
    class SelectMatchDAO {

        private static $db;

        public static function startDb(){
            self::$db = new PDOAgent('Matches');
        }

        public static function getMaxId(){

            $sql = "SELECT id FROM matches ORDER BY id DESC LIMIT 1";
    
            self::$db->query($sql);
    
            self::$db->execute();
    
            return self::$db->singleResult();

        }
        
        public static function getAllMatches(){
            
            $sql = "SELECT * FROM matches ORDER BY matchDate DESC";
    
            self::$db->query($sql);
    
            self::$db->execute();
    
            return self::$db->resultSet();
        }

        public static function getAllMatchesDesc(){
            
            $sql = "SELECT * FROM matches ORDER BY matchDate";
    
            self::$db->query($sql);
    
            self::$db->execute();
    
            return self::$db->resultSet();
        }

        public static function getAllMatchesStar(){
            
            $sql = "SELECT * FROM matches ORDER BY star, matchDate DESC";
    
            self::$db->query($sql);
    
            self::$db->execute();
    
            return self::$db->resultSet();
        }

        public static function getAllMatchesStarDesc(){
            
            $sql = "SELECT * FROM matches ORDER BY star DESC, matchDate DESC";
    
            self::$db->query($sql);
    
            self::$db->execute();
    
            return self::$db->resultSet();
        }

        public static function getMatchById( int $id ){

            $sql = "SELECT * FROM matches WHERE id=:id";
    
            self::$db->query($sql);
    
            self::$db->bind(':id',$id);
    
            self::$db->execute();
    
            return self::$db->singleResult();
        }

        public static function getAllCompetitions(){

            $sql = "SELECT DISTINCT competition FROM matches";

            self::$db->query($sql);

            self::$db->execute();

            return self::$db->resultSet();
        }
        
        public static function getAllTeams(){

            $sql = "SELECT teamA, teamB FROM matches";

            self::$db->query($sql);

            self::$db->execute();

            return self::$db->resultSet();
        }
        
        public static function getAllMatchesFiltered($selectedValues){

            $star = "";
            $competition = "";
            $team = "";
            $count = 0;

            $selectedStar = $selectedValues->star;
            if($selectedStar != ""){
                $count += 1;
                $star = "star = {$selectedStar}";
            };
            
            $selectedCompetition = $selectedValues->competition;
            if($selectedCompetition != ""){
                $count += 1;
                if($count == 1){
                    $competition = "competition = '{$selectedCompetition}'";
                }else{
                    $competition = "AND competition = '{$selectedCompetition}'";
                };
            };
            
            $selectedTeam = $selectedValues->team;
            if($selectedTeam != ""){
                $count += 1;
                if($count == 1){
                    $team = "(teamA = '{$selectedTeam}' OR teamB = '{$selectedTeam}')";
                }else{
                    $team = "AND (teamA = '{$selectedTeam}' OR teamB = '{$selectedTeam}')";
                };
            };
            
            //$whereはフィルターが１つでもあったら存在
            $where = "";
            if($count > 0){
                $where = "WHERE";
            };

            $sql = "SELECT * FROM matches $where $star $competition $team";

            self::$db->query($sql);

            self::$db->execute();

            return self::$db->resultSet();
        }
    }