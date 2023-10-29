<?php

 class MatchConverter {
 
     public static function convertMatch( $newMatch ) {
         if ( ! is_array( $newMatch ) ) {
             $stdObj = new stdClass;
 
             $stdObj->id = $newMatch->getId();
             $stdObj->matchDate = $newMatch->getMatchDate();
             $stdObj->star = $newMatch->getStar();
             $stdObj->country = $newMatch->getCountry();
             $stdObj->competition = $newMatch->getCompetition();
             $stdObj->leg = $newMatch->getLeg();
             $stdObj->teamA = $newMatch->getTeamA();
             $stdObj->teamB = $newMatch->getTeamB();
             $stdObj->scoreA = $newMatch->getScoreA();
             $stdObj->scoreB = $newMatch->getScoreB();
             $stdObj->scorerA = $newMatch->getScorerA();
             $stdObj->scorerB = $newMatch->getScorerB();
             $stdObj->comment = $newMatch->getComment();
 
             return $stdObj;
         } else {
             $objList = [];
             for($i = 0; $i < count($newMatch); $i++){
                 $stdObj = new stdClass;
 
                 $stdObj->id = $newMatch[$i]->getId();
                 $stdObj->matchDate = $newMatch[$i]->getMatchDate();
                 $stdObj->star = $newMatch[$i]->getStar();
                 $stdObj->country = $newMatch[$i]->getCountry();
                 $stdObj->competition = $newMatch[$i]->getCompetition();
                 $stdObj->leg = $newMatch[$i]->getLeg();
                 $stdObj->teamA = $newMatch[$i]->getTeamA();
                 $stdObj->teamB = $newMatch[$i]->getTeamB();
                 $stdObj->scoreA = $newMatch[$i]->getScoreA();
                 $stdObj->scoreB = $newMatch[$i]->getScoreB();
                 $stdObj->scorerA = $newMatch[$i]->getScorerA();
                 $stdObj->scorerB = $newMatch[$i]->getScorerB();
                 $stdObj->comment = $newMatch[$i]->getComment();
                 
                 $objList[] = $stdObj;
             }
 
             return $objList;
         }
     }
 
     public static function convertToObj($stdObject) {
 
         $newEmployee = new Product();
         $newEmployee->setGender($stdObject->gender);
         $newEmployee->setCategory($stdObject->category);
         $newEmployee->setType($stdObject->type);
         $newEmployee->setBaseColor($stdObject->baseColor);
         $newEmployee->setProductName($stdObject->productName);
         $newEmployee->setPrice($stdObject->price);
         $newEmployee->setSize($stdObject->size);
         $newEmployee->setUserId($stdObject->userId);
         $newEmployee->setImage($stdObject->image);
         
         return $newEmployee;
     }
 }