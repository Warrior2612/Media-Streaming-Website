<?php
    class User
    {
        private $con, $sqlData;

        public function __construct($con, $username)
        {
            $this->con = $con;

            $query=$con->prepare("SELECT * FROM users WHERE username=:username");
            $query->bindValue(":username", $username);
            $query->execute();

            $this->sqlData = $query->fetch(PDO::FETCH_ASSOC);
        }

        public function getFirstName()
        {
            return $this->sqlData["firstName"];
        }

        public function getLastName()
        {
            return $this->sqlData["lastName"];
        }

        public function getEmail()
        {
            return $this->sqlData["email"];
        }

        public function getUsername()
        {
            return $this->sqlData["username"];
        }

        public function getIsSubscribed()
        {
            return $this->sqlData["isSubscribed"];
        }

        public function getSubscriptionDate()
        {
            return $this->sqlData["subscriptionDate"];
        }

        public function getSubscriptionTier()
        {
            return $this->sqlData["subscriptionTier"];
        }

        public function setIsSubscribed($value, $tier)
        {
            $query = $this->con->prepare("UPDATE users SET isSubscribed=:isSubscribed, subscriptionDate=:da, subscriptionTier=:tier
                                          WHERE username=:un");
            $query->bindValue(":isSubscribed", $value);
            $query->bindValue(":un", $this->getUsername());
            $query->bindValue(":da", date("Y-m-d"));
            $query->bindValue(":tier", $tier);

            if($query->execute())
            {
                $this->sqlData["isSubscribed"] = $value;
                return true;
            }

            return false;
        }
    }
