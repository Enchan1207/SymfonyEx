<?php

namespace App\Command;

use App\Entity\Task;
use DateTime;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

class CreateTodoCommand extends Command
{
    protected static $defaultName = 'create:task';
    protected static $defaultDescription = 'Create new TODO';
    protected static $defaultHelp = 'This command allows you to create a TODO...';

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

        // TODO生成に必要な情報を入力
        $name = $io->ask("What is your new TODO task?", "buy something");
        $relatedListID = $io->ask("Tell me related list ID", "1");
        $expires = (new DateTime())
        ->setDate(2021, 4, 2);
        
        // TaskListオブジェクトを生成
        $newList = (new Task())
            ->setName($name)
            ->setRelatedListID($relatedListID)
            ->setExpires($expires);
        
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
