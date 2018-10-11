-- 'qiita_stocker' というユーザー名のユーザーを '(YourPassword999)' というパスワードで作成
-- データベース 'qiita_stocker' への権限を付与
CREATE DATABASE IF NOT EXISTS qiita_stocker CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;
GRANT ALL on qiita_stocker.* TO `qiita_stocker`@`%` identified BY '(YourPassword999)';

-- 'qiita_stocker_test' というユーザー名のユーザーを '(YourPassword999)' というパスワードで作成
-- データベース 'qiita_stocker_test' への権限を付与
CREATE DATABASE IF NOT EXISTS qiita_stocker_test CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;
GRANT ALL on qiita_stocker_test.* TO `qiita_stocker_test`@`%` identified BY '(YourPassword999)';
