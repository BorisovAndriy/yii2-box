<?php

use yii\db\Migration;
use \yii\db\Schema;


class m170830_104200_create_tbl_users extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB COMMENT = "Cправочник статусов пользователей"';
        }

        $this->createTable("{{%user_status}}", [
            'id'                    => Schema::TYPE_PK,
            'name'                  => Schema::TYPE_STRING          . '(32) NOT NULL COMMENT "Название"',
            'description'           => Schema::TYPE_STRING          . ' NULL COMMENT "Описание"',
            'created_at'            => Schema::TYPE_INTEGER         . ' NULL COMMENT "Время создания записи"',
            'updated_at'            => Schema::TYPE_INTEGER         . ' NULL COMMENT "Время создания записи"'
        ], $tableOptions);


        $this->createIndex('name', '{{%user_status}}', 'name', true);


        //устанавливает время создание записи
        $this->execute("
                CREATE TRIGGER `task_user_status_created_at` BEFORE INSERT ON `user_status` FOR EACH ROW
                BEGIN
                    SET NEW.created_at = UNIX_TIMESTAMP();
                END;
        ");

        //устанавливает время обновления записи
        $this->execute("
                CREATE TRIGGER `task_user_status_updated_at` BEFORE UPDATE ON `user_status` FOR EACH ROW
                BEGIN
                    SET NEW.updated_at = UNIX_TIMESTAMP();
                END;
        ");

        $this->insert('user_status', ['id' => 1, 'name' => 'Enable', 'description' => 'Аккаунт пользователя активен']);
        $this->insert('user_status', ['id' => 2, 'name' => 'Disable', 'description' => 'Аккаунт пользователя отключен или заблокирован']);



        /**
         *
        */

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4  COLLATE utf8mb4_unicode_ci ENGINE=InnoDB COMMENT = "Cправочник ролей пользователей"';
        }

        $this->createTable("{{%user_role}}", [
            'id'                    => Schema::TYPE_PK,
            'name'                  => Schema::TYPE_STRING          . '(32) NOT NULL COMMENT "Название"',
            'description'           => Schema::TYPE_STRING          . ' NULL COMMENT "Описание"',
            'created_at'            => Schema::TYPE_INTEGER         . ' NULL COMMENT "Время создания записи"',
            'updated_at'            => Schema::TYPE_INTEGER         . ' NULL COMMENT "Время создания записи"'
        ], $tableOptions);


        $this->createIndex('name', '{{%user_role}}', 'name', true);

        //устанавливает время создание записи
        $this->execute("
                CREATE TRIGGER `task_user_role_created_at` BEFORE INSERT ON `user_role` FOR EACH ROW
                BEGIN
                    SET NEW.created_at = UNIX_TIMESTAMP();
                END;
        ");

        //устанавливает время обновления записи
        $this->execute("
                CREATE TRIGGER `task_user_role_updated_at` BEFORE UPDATE ON `user_role` FOR EACH ROW
                BEGIN
                    SET NEW.updated_at = UNIX_TIMESTAMP();
                END;
        ");


        $this->insert('user_role', ['id' => 1, 'name' => 'administrator', 'description' => 'Администраторы']);
        $this->insert('user_role', ['id' => 2, 'name' => 'authUser', 'description' => 'Авторизированный пользователь']);
        $this->insert('user_role', ['id' => 3, 'name' => 'guest', 'description' => 'Гость']);





        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4  COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        // Users table
        $this->createTable(
            '{{%user}}',
            [
                'id'            => Schema::TYPE_PK,
                'email'         => Schema::TYPE_STRING .  '(100) NOT NULL',
                'username'      => Schema::TYPE_STRING .  '(100) NOT NULL',
                'password_hash' => Schema::TYPE_STRING .  ' NOT NULL',
                'role_id'       => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT "1" COMMENT "Роль"',
                'status_id'     => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT "1" COMMENT "Статус"',
                'created_at'    => Schema::TYPE_INTEGER . ' NULL COMMENT "Время создания записи"',
                'updated_at'    => Schema::TYPE_INTEGER . ' NULL COMMENT "Время создания записи"'
            ],
            $tableOptions
        );
        // Indexes

        $this->createIndex('email', '{{%user}}', 'email', true);
        $this->createIndex('username', '{{%user}}', 'username', true);
        $this->createIndex('password_hash', '{{%user}}', 'password_hash');
        $this->createIndex('role_id', '{{%user}}', 'role_id');
        $this->createIndex('status_id', '{{%user}}', 'status_id');

        $this->addForeignKey('FK__user__role_id', '{{%user}}', 'role_id', '{{%user_role}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK__user__status_id', '{{%user}}', 'status_id', '{{%user_status}}', 'id', 'CASCADE', 'CASCADE');

        //устанавливает время создание записи
        $this->execute("
                CREATE TRIGGER `task_user_created_at` BEFORE INSERT ON `user` FOR EACH ROW
                BEGIN
                    SET NEW.created_at = UNIX_TIMESTAMP();
                END;
        ");

        //устанавливает время обновления записи
        $this->execute("
                CREATE TRIGGER `task_user_updated_at` BEFORE UPDATE ON `user` FOR EACH ROW
                BEGIN
                    SET NEW.updated_at = UNIX_TIMESTAMP();
                END;
        ");


        $this->insert('user', [
            'id' => 1,
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password_hash' => Yii::$app->security->generatePasswordHash('admin'),
            'role_id' => 1,
            'status_id' => 1
        ]);


        return true;

    }
    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_status}}');
        $this->dropTable('{{%user_role}}');
        $this->dropTable('{{%user}}');
    }
}
