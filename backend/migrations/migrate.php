<?php
require_once __DIR__ . '/../includes/db_connection.php';

// Helper function
function createTable(PDO $pdo, string $table, string $sql)
{
    $stmt = $pdo->prepare("SHOW TABLES LIKE :table");
    $stmt->execute([':table' => $table]);

    if (! $stmt->fetch()) {
        try {
            $pdo->exec($sql);
            echo "✅ Created table: $table <br>";
        } catch (PDOException $e) {
            echo "❌ Error creating $table: " . $e->getMessage() . "<br>";
        }
    } else {
        echo "ℹ️ Table already exists: $table <br>";
    }
}

/* ========== Categories Table ========== */
createTable($pdo, 'categories', "
    CREATE TABLE categories (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        slug VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
");

/* ========== Posts Table ========== */
createTable($pdo, 'posts', "
    CREATE TABLE posts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        slug VARCHAR(255),
        category_id INT DEFAULT NULL,
        featured_image VARCHAR(255) DEFAULT NULL,
        short_description VARCHAR(500) DEFAULT NULL,
        long_description TEXT DEFAULT NULL,
        published_by INT DEFAULT NULL,
        published_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        status INT DEFAULT 0,
        created_by INT DEFAULT NULL,
        updated_by INT DEFAULT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
");
