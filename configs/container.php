<?php

declare(strict_types=1);

use DI\ContainerBuilder;
use App\Config;

$builder = new ContainerBuilder();

$builder->addDefinitions([
    Config::class => fn() => new Config(require 'app.php'),
    \PDO::class => function(Config $config) {
        try {
            $pdo = new PDO(
                $config->get('db.driver') . ':host=' . $config->get('db.host') . ';dbname=' . $config->get('db.database'), 
                $config->get('db.username'), 
                $config->get('db.password'), 
                [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]
            );
        } catch (\PDOException $e) {
            throw new \PDOException();
        }

        return $pdo;
    }
]);

return $builder->build();
