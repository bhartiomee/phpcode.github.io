<?php
    echo "First file of OOPS<br>";

    class Player{

        //Properties
        public $name;
        public $speed=3;

        function set_name($name){
            $this->name=$name;

        }
        function get_name(){
            return $this->name;;
        }


    }

    //creating class objects
    $player1=new Player();
    $player1->set_name("harry");
    echo $player1->get_name();

?>