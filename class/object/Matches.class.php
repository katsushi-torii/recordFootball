<?php

    class Matches {
        private int $id;
        private string $matchDate;
        private int $star;
        private string $country;
        private string $competition;
        private string $leg;
        private string $teamA;
        private string $teamB;
        private string $scoreA;
        private string $scoreB;
        private string $scorerA;
        private string $scorerB;
        private string $comment;

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of matchDate
         */ 
        public function getMatchDate()
        {
                return $this->matchDate;
        }

        /**
         * Set the value of matchDate
         *
         * @return  self
         */ 
        public function setMatchDate($matchDate)
        {
                $this->matchDate = $matchDate;

                return $this;
        }

        /**
         * Get the value of star
         */ 
        public function getStar()
        {
                return $this->star;
        }

        /**
         * Set the value of star
         *
         * @return  self
         */ 
        public function setStar($star)
        {
                $this->star = $star;

                return $this;
        }

        /**
         * Get the value of country
         */ 
        public function getCountry()
        {
                return $this->country;
        }

        /**
         * Set the value of country
         *
         * @return  self
         */ 
        public function setCountry($country)
        {
                $this->country = $country;

                return $this;
        }

        /**
         * Get the value of competition
         */ 
        public function getCompetition()
        {
                return $this->competition;
        }

        /**
         * Set the value of competition
         *
         * @return  self
         */ 
        public function setCompetition($competition)
        {
                $this->competition = $competition;

                return $this;
        }

        /**
         * Get the value of leg
         */ 
        public function getLeg()
        {
                return $this->leg;
        }

        /**
         * Set the value of leg
         *
         * @return  self
         */ 
        public function setLeg($leg)
        {
                $this->leg = $leg;

                return $this;
        }

        /**
         * Get the value of teamA
         */ 
        public function getTeamA()
        {
                return $this->teamA;
        }

        /**
         * Set the value of teamA
         *
         * @return  self
         */ 
        public function setTeamA($teamA)
        {
                $this->teamA = $teamA;

                return $this;
        }

        /**
         * Get the value of teamB
         */ 
        public function getTeamB()
        {
                return $this->teamB;
        }

        /**
         * Set the value of teamB
         *
         * @return  self
         */ 
        public function setTeamB($teamB)
        {
                $this->teamB = $teamB;

                return $this;
        }

        /**
         * Get the value of scoreA
         */ 
        public function getScoreA()
        {
                return $this->scoreA;
        }

        /**
         * Set the value of scoreA
         *
         * @return  self
         */ 
        public function setScoreA($scoreA)
        {
                $this->scoreA = $scoreA;

                return $this;
        }

        /**
         * Get the value of scoreB
         */ 
        public function getScoreB()
        {
                return $this->scoreB;
        }

        /**
         * Set the value of scoreB
         *
         * @return  self
         */ 
        public function setScoreB($scoreB)
        {
                $this->scoreB = $scoreB;

                return $this;
        }

        /**
         * Get the value of scorerA
         */ 
        public function getScorerA()
        {
                return $this->scorerA;
        }

        /**
         * Set the value of scorerA
         *
         * @return  self
         */ 
        public function setScorerA($scorerA)
        {
                $this->scorerA = $scorerA;

                return $this;
        }

        /**
         * Get the value of scorerB
         */ 
        public function getScorerB()
        {
                return $this->scorerB;
        }

        /**
         * Set the value of scorerB
         *
         * @return  self
         */ 
        public function setScorerB($scorerB)
        {
                $this->scorerB = $scorerB;

                return $this;
        }

        /**
         * Get the value of comment
         */ 
        public function getComment()
        {
                return $this->comment;
        }

        /**
         * Set the value of comment
         *
         * @return  self
         */ 
        public function setComment($comment)
        {
                $this->comment = $comment;

                return $this;
        }
    }