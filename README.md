
# toutou-node
[![test](https://github.com/Itu-tree/toutou-node/actions/workflows/test.yaml/badge.svg)](https://github.com/Itu-tree/toutou-node/actions/workflows/test.yaml)
[![deploy](https://github.com/Itu-tree/toutou-node/actions/workflows/deploy.yml/badge.svg)](https://github.com/Itu-tree/toutou-node/actions/workflows/deploy.yml)

成果物を紹介したり、記事を書いたりする場所

# 全体構成

![response](./ReadMeImage/about-local.png)

# 開発環境のセットアップ
## 開発環境
- [VSCode Remote Containers](https://code.visualstudio.com/docs/remote/containers)
    - windows(WSL2)
    - docker

## セットアップ
Ubuntuのコンソール
```
$ git clone https://github.com/Itu-tree/toutou-node.git
$ cd toutounode
$ make local-deploy
```
### npm packageのメンテナンス
portofolioとblogのnginxのコンテナに入る

```
$ npm outdated
$ npm update
```

toutounode.localhost　にアクセス

# リモートサーバーにデプロイ
## コードのクローンとdockerのビルド、サーバーの立ち上げ
サーバーのコンソール
```
$ git clone https://github.com/Itu-tree/toutou-node.git
$ cd toutounode
$ make prod-deploy
```

## 管理者アカウントの作成
サーバーのコンソールからコンテナに入る
```
$ cd toutounode/blog
$ docker-compose exec php bash
```

コンテナ内で以下のコマンドを入力
```
# php artisan tinker
>>>　App\User::firstOrCreate(['name'=>'admin','email'=>'admin@gmail.com','password'=>Hash::make('password')])
```

