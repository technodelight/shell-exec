<?php

namespace Technodelight\ShellExec;

interface Shell
{
    /**
     * @param Command $command
     * @throws ShellCommandException
     * @return array
     */
    public function exec(Command $command);
}
