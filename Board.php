<?php

class Board
{
    private int $type;
    private array $mapping;
    private int $current;
    private string $lastchanged;
    private string $formatted = "";

    public function __construct(int $type, array $mapping)
    {
        /*
         * Type 0: Kruizen
         * Type 1: Cijfers
         */
        $this->mapping = $mapping;
        $this->type = $type;
        $this->setup();
    }

    private function setup()
    {
        $boardJson = file_get_contents('data.json');
        $decoded_json = json_decode($boardJson, true);
        $this->lastchanged = date("Y-m-d H:i:s", $decoded_json['boards'][$this->type]['lastchanged']);
        $this->current = $decoded_json['boards'][$this->type]['current'];
    }

    public function change(int $new){
        if($this->execCommand($new, $this->current)){
            $this->current = $new;
            $this->lastchanged = date("Y-m-d H:i:s", time());
            $this->setFormatted();
        }
    }

    private function execCommand(int $new, int $old) : bool
    {
        if($new == 0 && $old > 0 && $this->type = 1){
              exec("/root/matrix.sh off " . 0, $response);
//            exec("gpio off " . 0, $response);
        }
        exec("/root/matrix.sh off " . $old, $response);
        exec("/root/matrix.sh on " . $new, $response);
//        exec("gpio off " . $old, $response);
//        exec("gpio on " . $new, $response);

        //todo check
        return true;
    }

    public function test(){

    }
    /**
     * @return int
     */
    public function getCurrent(): int
    {
        return $this->current;
    }

    /**
     * @return string
     */
    public function getLastchanged(): string
    {
        return $this->lastchanged;
    }

    public function getCurrentString(): string
    {
        if($this->type == 0){
            switch ($this->getCurrent()){
                case 0:
                    return "Uit";
                case 1:
                    return "Kruis";
                case 2:
                    return "Pijl Links";
                case 3:
                    return "Pijl Rechts";
            }
        } else {
            switch ($this->getCurrent()){
                case 0:
                    return "Uit";
                case 1:
                    return "30";
                case 2:
                    return "50";
                case 3:
                    return "60";
                case 4:
                    return "70";
            }
        }
        return "Error";
    }

    public function setFormatted()
    {
        if($this->type == 0){
            switch ($this->getCurrent()){
                case 0:
                    $this->formatted = "";
                    break;
                case 1:
                    $this->formatted = "<i class=\"fas fa-times text-red-500 fa-10x\"></i>";
                    break;
                case 2:
                    $this->formatted = "<i class=\"fas fa-arrow-down rotate-45 ml-1 fa-10x text-white\"></i>";
                    break;
                case 3:
                    $this->formatted = "<i class=\"fas fa-arrow-down -rotate-45 ml-1 fa-10x text-white\"></i>";
                    break;
            }
        } else {
            switch ($this->getCurrent()){
                case 0:
                    $this->formatted = "";
                    break;
                case 1:
                    $this->formatted = "<fff class=\"text-white fa-10x\">30</fff>";
                    break;
                case 2:
                    $this->formatted = "<fff class=\"text-white fa-10x\">50</fff>";
                    break;
                case 3:
                    $this->formatted = "<fff class=\"text-white fa-10x\">60</fff>";
                    break;
                case 4:
                    $this->formatted = "<fff class=\"text-white fa-10x\">70</fff>";
                    break;
            }
        }
        return "Error";
    }

    /**
     * @return string
     */
    public function getFormatted(): string
    {
        return $this->formatted;
    }



}