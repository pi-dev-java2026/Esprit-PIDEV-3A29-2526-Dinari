<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

class GenerateRepositoriesCommand extends Command
{
    protected static $defaultName = 'app:generate-repositories';

    protected function configure()
    {
        $this
            ->setName('app:generate-repositories')
            ->setDescription('Generates repository classes for all entities.')
            ->setHelp('This command will generate repository classes for all entities in src/Entity.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Generating repositories for all entities...');

        $filesystem = new Filesystem();
        $finder = new Finder();
        $finder->files()->in('src/Entity')->name('*.php');

        foreach ($finder as $file) {
            $entityClass = $file->getBasename('.php');
            $repositoryCode = <<<PHP
<?php

namespace App\Repository;

use App\Entity\\$entityClass;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class {$entityClass}Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry \$registry)
    {
        parent::__construct(\$registry, $entityClass::class);
    }
}
PHP;

            $repositoryPath = 'src/Repository/' . $entityClass . 'Repository.php';

            if (!$filesystem->exists($repositoryPath)) {
                $filesystem->dumpFile($repositoryPath, $repositoryCode);
                $output->writeln("Generated repository: $entityClass");
            } else {
                $output->writeln("Already exists: $entityClass");
            }
        }

        $output->writeln('Done!');
        return Command::SUCCESS;
    }
}