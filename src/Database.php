<?php

namespace Au3pm\Registry;

use PDO;

class Database extends PDO {
    public static $instance;
    public DotEnv $env;

    public static function getInstance(): self {
        if (!isset(self::$instance)) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function __construct() {
        $this->env = new DotEnv('../.env');
        $this->env->load();

        switch (getenv('DB_DRIVER')) {
            case 'mysql':
                parent::__construct(sprintf('mysql:host=%s;dbname=%s;charset=utf8', getenv('DB_HOST'), getenv('DB_NAME')), getenv('DB_USER'), getenv('DB_PASS'));
                break;
            case 'sqlite':
                parent::__construct('sqlite:../database.db');
                break;
            default:
                throw new \Exception(sprintf('Unknown DB_DRIVER: "%s"', getenv('DB_DRIVER')));
        }

        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //$this->exec('CREATE TABLE IF NOT EXISTS packages (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT, author TEXT, version TEXT, repo TEXT, sha TEXT)');
    }

    public function getPackages($page) {
        $stmt = $this->prepare('SELECT packages.*, owners.external_id FROM packages LEFT JOIN owners ON packages.owner_id = owners.id LIMIT 20 OFFSET ' . ($page - 1) * 20);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
