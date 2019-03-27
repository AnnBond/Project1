<?php
namespace App;

final class ExecutionTime
{
    private $start;
    private $end;
    private $executionTime;

    /**
     * get start time
     */
    final function start()
    {
        $this->start = microtime(true);
    }

    /**
     * get end time
     */
    final function end()
    {
        $this->end = microtime(true);
    }

    /**
     * get execution time
     * @return string
     */
    final function getExecutionTime()
    {
        $this->executionTime = $this->end - $this->start;

        return "Exec Time:  $this->executionTime";
    }
}


