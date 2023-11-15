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
    
    }