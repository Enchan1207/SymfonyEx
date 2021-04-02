<?php

namespace App\Command;

use App\Entity\TaskList;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

class CreateTodoListCommand extends Command
{
    protected static $defaultName = 'create:todo-list';
    protected static $defaultDescription = 'Create new TODO list';
    protected static $defaultHelp = 'This command allows you to create a TODO-list...';

    private $entityManager;

    //
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

        parent::__construct();
    }

    // コマンドを構成 (引数、オプション、説明...)
    protected function configure()
    {
        $this
            ->setDescription(self::$defaultDescription)
            ->setHelp(self::$defaultHelp);
    }

    // 実行
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        // リスト生成に必要な情報を入力
        $name = $io->ask("What is your new TODO-list name?", "Tasks");

        // TaskListオブジェクトを生成
        $newList = (new TaskList())
            ->setName($name)
            ->setCount(0);
        
        // 登録
        try {
            $this->entityManager->persist($newList);
            $this->entityManager->flush();

            $io->success("A new verified user entity has been created");
        } catch (Exception $th) {
            $io->error($th->getMessage());
        }
        return 0;
    }
}
