<?php
    class MatchDAO {

        private static $db;

        public static function startDb(){
            self::$db = new PDOAgent('Matches');
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

        public static function insertMatch(Matches $newMatch){

            $sql = "INSERT INTO matches(matchDate, star, competition, leg, teamA, teamB, scoreA, scoreB, scorerA, scorerB, comment) VALUES (:matchDate, :star, :competition, :leg, :teamA, :teamB, :scoreA, :scoreB, :scorerA, :scorerB, :comment)";

            self::$db->query($sql);
    
            self::$db->bind(":matchDate",$newMatch->getMatchDate());
            self::$db->bind(":star",$newMatch->getStar());
            self::$db->bind(":competition",$newMatch->getCompetition());
            self::$db->bind(":leg",$newMatch->getLeg());
            self::$db->bind(":teamA",$newMatch->getTeamA());
            self::$db->bind(":teamB",$newMatch->getTeamB());
            self::$db->bind(":scoreA",$newMatch->getScoreA());
            self::$db->bind(":scoreB",$newMatch->getScoreB());
            self::$db->bind(":scorerA",$newMatch->getScorerA());
            self::$db->bind(":scorerB",$newMatch->getScorerB());
            self::$db->bind(":comment",$newMatch->getComment());
    
            self::$db->execute();
    
            return self::$db->lastInsertId();
        }
    
    }