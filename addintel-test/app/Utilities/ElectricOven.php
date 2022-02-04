<?php

namespace App\Utilities;

class ElectricOven implements Oven
{
    private bool $powerOn    = false;
    private bool $isHeated   = false;
    private int $preheatTime = 10;
    private int $bakeTime    = 5;

    /**
     * @return \App\Utilities\Oven
     */
    public function heatUp(): Oven
    {
        $this->powerOn = true;

        echo "Preheating will take {$this->preheatTime} minutes...";
        sleep($this->preheatTime);

        $this->isHeated = true;

        return $this;
    }

    /**
     * @param \App\Utilities\Pizza $pizza
     *
     * @return \App\Utilities\Oven
     */
    public function bake(Pizza &$pizza): Oven
    {
        if (!$this->powerOn || !$this->isHeated) {
            echo 'Let me first turn the oven up...';
            $this->heatUp();
        }

        echo "Baking will take {$this->bakeTime} minutes...";
        sleep($this->bakeTime);

        return $pizza;
    }

    /**
     * @return \App\Utilities\Oven
     */
    public function turnOff(): Oven
    {
        $this->powerOn = false;

        return $this;
    }
}
