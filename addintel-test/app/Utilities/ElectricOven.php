<?php

namespace App\Utilities;

use http\Exception\RuntimeException;

class ElectricOven implements Oven
{
    private bool $powerOn = false;
    private int $bakeTime = 3;

    /**
     * @return \App\Utilities\Oven
     */
    public function heatUp(): Oven
    {
        $this->powerOn = true;

        return $this;
    }

    /**
     * @param \App\Utilities\Pizza $pizza
     *
     * @return \App\Utilities\Oven
     */
    public function bake(Pizza &$pizza): Oven
    {
        if (!$this->powerOn) {
            throw new RuntimeException('You must first turn the oven on.');
        }

        echo "This will take {$this->bakeTime} seconds...";
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
