<?php

namespace App\pipeline;

class Pipeline implements PipelineInterface
{
    // Lớp Pipeline để thực hiện các bước xử lý
    private $handlers = array();

    public function addHandler($handler) {
        $this->handlers[] = $handler;
    }

    public function handle($input) {
        $output = null;
        foreach ($this->handlers as $handler) {
            $output = $handler->handle($input);
            $input = $output;
        }

        return $output;
    }

}
