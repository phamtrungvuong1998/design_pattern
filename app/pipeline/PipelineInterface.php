<?php

namespace App\pipeline;

interface PipelineInterface
{
    public function handle($input);
}
