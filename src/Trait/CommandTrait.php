<?php

namespace KarlitoWeb\Blurp\Trait;

use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Stopwatch\Stopwatch;

trait CommandTrait
{
    protected SymfonyStyle $io;

    protected Stopwatch $stopwatch;

    protected static string $path = '';

    /** Configure your CLI Application */
    protected function configure(): void
    {
        /** Config  */
        $this->setName($this->getName());
        $this->setDescription($this->getDescription());
        $this->setAliases($this->getAliases());
        $this->setHidden($this->isHidden());
        $this->setProcessTitle(self::$title);
        $this->setHelp(self::$help);
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     */
    protected function initialize(InputInterface $input, OutputInterface $output): void
    {
        /** Options : Init */
        ini_set("memory_limit", "-1");
        set_time_limit(0);

        /** Variables : Init */
        $this->io           = new SymfonyStyle($input, $output);
        $this->stopwatch    = new Stopwatch(true);
//        $projectDir         = $this->container->get('kernel.project_dir');
        self::$path         = dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'docs' . DIRECTORY_SEPARATOR;

        /** Variables : Set */
//        self::$dotenv->safeLoad();
//        self::$dotenv->required('APP_ENV');

        /** Clear Screen */
        $output->writeln(shell_exec('clear'));
    }

    /**
     * Display the resume of CLI Command
     *
     * @param SymfonyStyle $io
     * @param float        $duration
     */
    public static function resume(SymfonyStyle $io, float $duration = 0.0): void
    {
        $io->newLine(2);
        $io->section('Resume');
        /* Execution Time */
        $time      = ($duration > 180) ? round($duration / 60) . ' min.' : $duration . ' sec.';
        /* Currently used memory */
        $mem_usage = memory_get_usage();
        /* Peak memory usage */
        $mem_peak  = memory_get_peak_usage();
        /**
         * Options :
         * black, blue, bright-blue, bright-cyan, bright-green
         * bright-magenta, bright-red, bright-whit, bright-yellow, cyan
         * default, gray, green, magenta, red
         * white, yellow
         */
        $io->text([
            '<fg=white;bg=bright-green;>Execution Time      :      '               . $time . '</>',
            '<fg=white;bg=gray;>The script is using : ' . round($mem_usage / 1048576) . ' MB of memory.</>',
            '<fg=white;bg=gray;>Peak usage          : ' . round($mem_peak / 1048576) . ' MB of memory.</>',
        ]);
    }

    /**
     * Provides helpers to display a table.
     * $headers = [
     *     [20, 40, 40],                // $headers
     *     ['lorem', 'ipsum', 'ipsum'], // $datas
     * ];
     *
     * @param array<array>    $headers
     * @param array<array>    $content
     * @param OutputInterface $output
     * @return Table
     */
    public static function table(array $headers, array $content, OutputInterface $output): Table
    {
        list($width, $title)  = $headers;
        $nb                   = count($content);
        $table                = new Table($output);
        $table->setColumnWidths($width);
        $table->setHeaders($title);
        $table->setStyle('borderless');
        switch ($nb) :
            case 1:
                $table->setRows([$content]);
                break;
            case ($nb > 1):
                $table->setRows($content);
                break;
        endswitch;
        $table->render();

        return $table;
    }
}
