<?php

namespace App;


final class ExecutionTime
{
    private $start;
    private $end;
    private $executionTime;

    final function start()
    {
        $this->start = microtime(true);
    }

    final function end()
    {
        $this->end = microtime(true);
    }

    final function getExecutionTime()
    {
        $this->executionTime = $this->end - $this->start;

        return "Exec Time:  $this->executionTime";
    }

}


