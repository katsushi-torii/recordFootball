<?php
    class FunctionMatchDAO {

        private static $db;

        public static function startDb(){
            self::$db = new PDOAgent('Matches');
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

        public static function editMatch(Matches $newMatch, $id){

            $sql = "UPDATE matches SET matchDate=:matchDate, star=:star, competition=:competition, leg=:leg, teamA=:teamA, teamB=:teamB, scoreA=:scoreA, scoreB=:scoreB, scorerA=:scorerA, scorerB=:scorerB, comment=:comment WHERE id=:id";

            self::$db->query($sql);
    
            self::$db->bind(":id",$id);
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

        public static function deleteMatch($id){

            $sql = "DELETE from matches WHERE id=:id";

            self::$db->query($sql);
    
            self::$db->bind(":id",$id);
    
            self::$db->execute();
    
            return self::$db->rowCount();
        }
        
    }