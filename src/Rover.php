<?php

namespace Pablo\KatasCodurance;

class Rover
{
    public int $x;
    public int $y;
    public string $direction;

    public function getDirection(){
        return $this->x.':'.$this->y.':'.$this->direction;
    }

    public function inputMove($str_movement){
        $validRotations = ['L', 'R'];
        $validMovements = ['M'];

        foreach(str_split($str_movement) as $char){
            if(in_array($char, $validRotations)){
                $this->rotate($char);
            }else if(in_array($char, $validMovements)){
                $this->move();
            }
        }

        return $this->getDirection();
    }

    private function rotate($char){
        $directions = ['N', 'E', 'S', 'W'];
        $current = array_search($this->direction, $directions);

        if($current === false){
            return false;
        }

        if($char === 'L'){
            $this->direction = $directions[$current - 1] ?? $directions[array_key_last($directions)];
        }else{
            $this->direction = $directions[$current + 1] ?? $directions[0];
        }
    }

    private function move(){
        if($this->direction == 'N'){
            $this->y++;
        }else if($this->direction == 'S'){
            $this->y--;
        }else if($this->direction == 'E'){
            $this->x++;
        }else if($this->direction == 'W'){
            $this->x--;
        }else{
            return false;
        }

        if($this->x > 9) $this->x = 0;
        if($this->y > 9) $this->y = 0;

        if($this->x < 0) $this->x = 9;
        if($this->y < 0) $this->y = 9;

        return true;
    }
}

?>