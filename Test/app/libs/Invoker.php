<?php
namespace testNameSpace\libs;

include __DIR__ .'/../utils/scoring/calculatePointsCommand.php';

use testNameSpace\utils\scoring\Command;

class Invoker {
    /**
     * @var Command;
     */
    private $commandOne;

    public function setCommandOne(Command $cmd) {
        $this->commandOne = $cmd;
    }

    public function run() {
        if($this->commandOne instanceof Command)
        {
            $this->commandOne->Execute();
        }
    }
}