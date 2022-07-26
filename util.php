<?php

// session initialization
session_start();

// create a PDO instance for global access
function pdo(): PDO
{
    static $pdo;

    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

    if (!$pdo) {
        $config = include __DIR__ . '/config.php';
        try {
            $pdo = new PDO(
                $config['driver'] . ":host=" . $config['db_host'] . ";dbname=" . $config['db_name'] . ";charset=" . $config['charset'],
                $config['db_user'],
                $config['db_pass'],
                $options
            );
        } catch (PDOException $e) {
            die("Ошибка подключения к БД!");
        }
    }

    return $pdo;
}

// save message in session
function addMessage(string $message): void
{
    if ($message) {
        $_SESSION['message'] = $message;
    }
}

// show and delete message in session
function showMessage($message = null): void
{
    if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-danger mb-3 col-3">
            <?= $_SESSION['message']; ?>
        </div>
    <?php }
    unset($_SESSION['message']);
}

// check user authentication
function check_auth(): bool
{
    return isset($_SESSION['user_id']);
}
