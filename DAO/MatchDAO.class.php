<?php
    class MatchDAO {

        private static $db;

        public static function startDb(){
            self::$db = new PDOAgent('Matches');
        }
        
        public static function getAllMatches(){
            
            $sql = "SELECT * FROM matches";
    
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
    
    }