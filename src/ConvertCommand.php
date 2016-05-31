<?php

namespace Uposthapon;

use Parsedown;
use Jenssegers\Blade\Blade;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ConvertCommand extends Command
{
    protected $blade;
    protected $parse;

    public function __construct()
    {
        parent::__construct();

        $this->blade = new Blade('templates', 'cache');
        $this->parse = new Parsedown;
    }

    protected function configure()
    {
        $this->setName('convert')
            ->setDescription('Convert markdown file to html presentation')
            ->addArgument('filename', InputArgument::REQUIRED, 'Path of the markdown file to convert')
            ->addOption('style', 's', InputOption::VALUE_REQUIRED, 'Path to the stylesheet file');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $filename = $input->getArgument('filename');
        $stylesheet = $input->getOption('style');

        // checking filename
        if(! file_exists($filename)) {
            return $output->writeln('<error>File does not exists.</error>');
        }

        //checking stylesheet
        if($stylesheet && ! file_exists($stylesheet)) {
            return $output->writeln('<error>Stylesheet does not exists.</error>');
        }

        //load stylesheet
        $style = $this->loadStylesheet($stylesheet);

        // load script
        $script = file_get_contents(__DIR__.'/../resources/script.js');

        // load markdown file content
        $fileContent = file_get_contents($filename);

        $slides = explode('--', $fileContent);

        // render markdown
        $content = $this->renderMarkdown($slides);

        // render presentation html
        $presentation = $this->blade->render('layout', compact('content', 'style', 'script'));

        // create html
        file_put_contents(getcwd().'/presentation.html', $presentation);

        $output->writeln('<comment>Successfully compiled.</comment>');
    }

    private function loadStylesheet($stylesheet)
    {
        $default = file_get_contents(__DIR__.'/../resources/default.css');

        // load stylesheet content
        if($stylesheet) {
            $custom = file_get_contents($stylesheet);
            return $default . $custom;
        }

        return $default;
    }

    private function renderMarkdown($slides)
    {
        $renderedSlides = [];
        foreach ($slides as $key => $slide) {
            // parse content
            $content = $this->parse->text($slide);

            $renderedSlides[] = $this->blade->render('slide', compact('content', 'key'));
        }

        // rendered markdown
        return implode('', $renderedSlides);
    }

}
