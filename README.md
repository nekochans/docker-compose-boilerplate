# docker-compose-boilerplate
Docker Compose boilerplate

## 事前準備

### [Docker Hub](https://hub.docker.com/) のアカウントを取得する

Docker Hubでアカウントを取得して下さい。

GitHubのアカウント名と合わせると分かりやすいので、そうしておくとベストだと思います。

### Docker for Macのインストール

公式サイトからDocker for Macをダウンロードしてインストールします。

https://docs.docker.com/docker-for-mac/install/

## 参考資料

### 公式（英語）

https://docs.docker.com/

### 公式（日本語）

http://docs.docker.jp/

### [いまさらDockerに入門したので分かりやすくまとめます](https://qiita.com/gold-kou/items/44860fbda1a34a001fc1)

かなり分かりやすくまとまっています。

公式と合わせて読む事でDockerの基礎に関する理解が深まるでしょう。

### Dockerfileの開発手順

[効率的に安全な Dockerfile を作るには](https://qiita.com/pottava/items/452bf80e334bc1fee69a) という記事が分かりやすいです。

### 良いDockerfileの書き方

- [Dockerfile reference](https://docs.docker.com/engine/reference/builder/#usage)
- [Dockerfile のベストプラクティス](http://docs.docker.jp/engine/articles/dockerfile_best-practice.html)
- [Dockerfile のベストプラクティスを自分なりに整理してみた](https://qiita.com/ao_log/items/f615e0e82164ad854792)
- [Dockerfileを書くときに気をつけていること10選](https://qiita.com/c18t/items/f3a911ef01f124071c95)

### コマンドリファレンス的な記事

- [Docker コマンドチートシート](https://qiita.com/wMETAw/items/34ba5c980e2a38e548db)

### docker-composeのリファレンス

複数のコンテナを扱う際は `docker-compose` コマンドを利用します。

- [公式](https://docs.docker.com/compose/)
- [Docker Compose - docker-compose.yml リファレンス](https://qiita.com/zembutsu/items/9e9d80e05e36e882caaa)

## 基本操作

後でちゃんと説明とか書きます。

### 初回起動

`docker-compose up --build -d`

### 起動

二回目以降は下記のコマンドだけでOKです。

`docker-compose up -d`

ただし `Dockerfile` の内容が書き換わっている場合は再度buildを行う必要があります。

その際には古いimageは不要だと思うので `docker-compose down --rmi all` で古いimageを消してしまってから再度初回実行のコマンドを実行して下さい。

### 停止

`docker-compose down`

### 停止（作成されたイメージも削除）

`docker-compose down --rmi all`

## Alpine Linuxについて

DockerコンテナのOSにはAlpine Linuxが利用されています。

これはコンテナ向けに軽量化されたLinux ディストリビューションです。

普段CentOSやAmazonLinuxを扱っていると、多少扱いにくく感じますが、近年コンテナでの採用率が高いので慣れておくと良いでしょう。

### Alpine Linux製のPHP公式イメージ

ベースとしてPHPの公式イメージを利用しているのですが、CentOS等と比べて設定ファイルの場所等が結構違います。

`php.ini` は `/usr/local/etc/php/php.ini` になります。

これは `php --ini` でも確認出来ます。

```
Configuration File (php.ini) Path: /usr/local/etc/php
Loaded Configuration File:         (none)
Scan for additional .ini files in: /usr/local/etc/php/conf.d
Additional .ini files parsed:      /usr/local/etc/php/conf.d/docker-php-ext-mysqli.ini,
/usr/local/etc/php/conf.d/docker-php-ext-opcache.ini,
/usr/local/etc/php/conf.d/docker-php-ext-pdo_mysql.ini,
/usr/local/etc/php/conf.d/docker-php-ext-sodium.ini
```

`php-fpm.conf` は `/usr/local/etc/php-fpm.conf` にあります。

また `/usr/local/etc/php-fpm.d/` 配下のファイルはアルファベット順に読み込まれていて、最後になっているファイルは `/usr/local/etc/php-fpm.d/zz-docker.conf` です。

その為、他のファイルを上書きしても `zz-docker.conf` にそれを打ち消す内容を書くと上書きされてしまいます。

その為、設定を修正する際は `zz-docker.conf` を修正するほうがトラブルが少ないでしょう。

（参考）[PHPの公式DockerイメージでUNIXソケット通信しようとして罠にハマるの巻](https://yoshinorin.net/2017/03/06/php-official-docker-image-trap/)

## DB用のコンテナについて

`docker-compose.yml` に記載してある `mysql` がそれに該当します。

ローカルPCにmysqlのクライアントがインストールされていれば以下のコマンドでローカルから接続する事も可能です。

`mysql -u sample_user -h 0.0.0.0 -p sample_db`

余談ですが、本番環境化ではDBのようなデータの永続化が重要な物をコンテナで運用するのは向いていません。

その為、本プロジェクトではMySQLのコンテナは開発環境のみの利用という想定です。

本番環境化では [Amazon Aurora](https://aws.amazon.com/jp/rds/aurora/) のようなサービスを使うのが無難です。

MySQLコンテナのバージョンにあえて5.7系を使っている理由はAmazon Auroraのバージョンが現時点ではMySQL 5.7互換しか存在しない為です。
