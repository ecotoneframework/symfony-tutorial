<?php


namespace Bootstrap;


use App\EcotoneQuickstart;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class EcotoneQuickstartCommand extends Command
{
    /**
     * @var EcotoneQuickstart
     */
    private $ecotoneQuickstart;

    public function __construct(EcotoneQuickstart $ecotoneQuickstart)
    {
        parent::__construct("ecotone:quickstart");
        $this->ecotoneQuickstart = $ecotoneQuickstart;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Running example...");
        $this->ecotoneQuickstart->run();
        $output->writeln("Good job, scenario ran with success!");

        return 0;
    }
}