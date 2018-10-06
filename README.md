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
