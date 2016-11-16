<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Helper\Helper;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\Question;

/**
 * Class TaskCommand
 * @package AppBundle\Command
 */
class TaskCommand extends ContainerAwareCommand {

    /**
     * @var QuestionHelper $helper;
     */
    private $helper;

    private $aTask, $aDesc, $aDate, $aStat;

    private $aUser, $aProject;

    private $aConfirm;

    protected function configure()
    {
        $this
            ->setName('mava:task:create')
            ->setDescription('Create and assign a new task')
            ->addArgument(
                'taskName',
                InputArgument::OPTIONAL,
                'The task name'
            )
            ->addArgument(
                'taskDesc',
                InputArgument::OPTIONAL,
                'The task description'
            )
            ->addArgument(
                'taskDueDate',
                InputArgument::OPTIONAL,
                'The task namedue date'
            )
            ->addArgument(
                'taskStatus',
                InputArgument::OPTIONAL,
                'The task status'
            )
            ->addOption(
                'user',
                NULL,
                InputOption::VALUE_OPTIONAL,
                'If set, the task will be assigned to the user'
            )
            ->addOption(
                'project',
                NULL,
                InputOption::VALUE_OPTIONAL,
                'Defines which project this this is belong to'
            );
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Manual input method
        // $util = $this->getContainer()->get('mava_util');
        //
        // $result = $util->createTask(
        //   $input->getArgument('taskName'),
        //   $input->getArgument('taskDesc'),
        //   $input->getArgument('taskDueDate'),
        //   $input->getArgument('taskStatus'),
        //   $input->getOption('user'),
        //   $input->getOption('project')
        // );
        //
        // if ($result) {
        //   $output->writeln("Task created successfully");
        // }

        $this->helper = $this->getHelper('question');

        $this->argQs($input, $output);

        $this->optQs($input, $output);

        $this->confirmQ($input, $output);

        if ($this->aConfirm) {
            $this->createTask()
                ? $output->writeln("Task created successfully.")
                : $output->writeln("Something went wrong!");
        }
        else {
            return;
        }
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     */
    private function argQs(InputInterface $input, OutputInterface $output)
    {
        $qTask = new Question("What is the task name?\n", 'task');
        $this->aTask = $this->helper->ask($input, $output, $qTask);

        $qDesc = new Question(
            "Please provide a short description:\n",
            'description');

        $this->aDesc = $this->helper->ask($input, $output, $qDesc);

        $qDate = new Question(
            "What is the due date?\n (YYYY-MM-DD)", '2017-12-131');

        $this->aDate = $this->helper->ask($input, $output, $qDate);

        $qStat = new ChoiceQuestion(
            "What is the task status?\n",
            ['new', 'in progress', 'completed'],
            0);

        $this->aStat = $this->helper->ask($input, $output, $qStat);
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     */
    private function optQs(InputInterface $input, OutputInterface $output)
    {
        $qUser = new ConfirmationQuestion(
            "Would you like to assign this task to a user? (yes/[no]) ", FALSE);

        if ($this->helper->ask($input, $output, $qUser)) {
            $qUserID = new Question("User ID: \n", '1');
            $this->aUser = $this->helper->ask($input, $output, $qUserID);
        }

        $qProject = new ConfirmationQuestion(
            "Would you like to set the project for this task? (yes/[no]) ", FALSE);

        if ($this->helper->ask($input, $output, $qProject)) {
            $qProjectID = new Question("Project ID: \n", '1');
            $this->aProject = $this->helper->ask($input, $output, $qProjectID);
        }
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     */
    private function confirmQ(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(
            "======[ SUMMARY ]======\n" .
            " Task name: " . $this->aTask . "\n" .
            " Description: " . $this->aDesc . "\n" .
            " Due on: " . $this->aDate . "\n" .
            " Status: " . $this->aStat . "\n" .
            " User id: " . $this->aUser . "\n" .
            " project id: " . $this->aProject
        );

        $qConfirm = new ConfirmationQuestion(
            "\n\n\tDo you confirm the task creation? ([yes]/no) ", TRUE);

        $this->aConfirm = $this->helper->ask($input, $output, $qConfirm);
    }

    /**
     * @return bool|void
     */
    private function createTask()
    {
        $util = $this->getContainer()->get('mava_util');

        $result = $util->createTask(
            $this->aTask, $this->aDesc, $this->aDate,
            $this->aStat, $this->aUser, $this->aProject
        );

        return $result;
    }
}