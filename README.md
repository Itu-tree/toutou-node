# portfolio
ポートフォリオの説明と技術の説明．
Github flowを採用

## 後で書く記事
### シェルスクリプトをかく
stop-dev.sh , docker-compose のコマンド
### web.phpを分ける
RouteServiceProviderで関数を作成，登録

###　簡単な記事管理システム
記事の状態遷移

### システムの図
ngixn-proxy と色々なdockr-compose
https://github.com/nginx-proxy/nginx-proxy
markdown editor,bootstrap4 の記事,SEOの記事,uuid,settings.json,login後のredirect先を関数で指定

### 静的コンテンツはnginxのコンテナにコピーしておく

#### 画像保存パス

記事idを使って保存したかったが，記事idは記事が作成されてから生成される．
新規記事作成時に，初期化したpostモデルを渡す．

### body と　md_bodyの保存

以前，qiitaの記事44万件をDBに入れたことがあったが，mysqlのデータ領域は25GB位だった．個人ブログなので，さすがに万は超えないでしょ．

## 参考サイト

https://qiita.com/at-946/items/dc8562346904cca2bb3b

https://suin.io/561

https://qiita.com/ucan-lab/items/5fc1281cd8076c8ac9f4

https://qiita.com/ka2asd/items/372d30be64c57a8a81b1

## editor 

https://www.tiny.cloud/docs/plugins/textpattern/

https://github.com/nhn/tui.editor

https://qiita.com/miyarappo/items/dfd4a2493883e96a1948


vue 未経験の場合は，した二つを読む
https://reffect.co.jp/vue/vue-js-input-operate#i
https://jp.vuejs.org/v2/guide/installation.html

texteditor
https://github.com/hinesboy/mavonEditor/blob/master/README-EN.md
https://qiita.com/watatakahashi/items/097120d3a77ee90695eb
katexのスタイルを使う
https://github.com/KaTeX/KaTeX



#error 実行ユーザーがphp-fpmであるために，ファイルの書き込みができない．ので，php-fpmの設定(portfolio/docker/php/php-fpm.d/zzz-www.conf)を見直すか，
docker fileで権限を設定する

```
RUN chown -R www-data:www-data web/storage
RUN chown -R www-data:www-data web/bootstrap/cache
```


"chmod(): Operation not permitted", laravel image
env

PHP_EXTRA_CONFIGURE_ARGS=--enable-fpm --with-fpm-user=www-data --with-fpm-group=www-data --disable-cgi
SHLVL=1


'--enable-fpm' '--with-fpm-user=www-data' '--with-fpm-group=www-data'

https://qiita.com/taumu/items/88c294a77c6499cbb988

https://www.php.net/manual/ja/install.fpm.configuration.php
```
listen.acl_users string
POSIX の Access Control List をサポートしている場合は、このオプションでそれを指定できます。 これを設定した場合は、listen.owner および listen.group は無視されます。 値には、ユーザー名をカンマ区切りのリスト形式で指定します。PHP 5.6.5 以降で利用可能です。
```

```
"message": "chmod(): Operation not permitted",
    "exception": "ErrorException",
    "file": "/var/www/html/vendor/league/flysystem/src/Adapter/Local.php",
    "line": 367,
    "trace": [
        {
            "function": "handleError",
            "class": "Illuminate\\Foundation\\Bootstrap\\HandleExceptions",
            "type": "->"
        },
        {
            "file": "/var/www/html/vendor/league/flysystem/src/Adapter/Local.php",
            "line": 367,
            "function": "chmod"
        },
        {
            "file": "/var/www/html/vendor/league/flysystem/src/Adapter/Local.php",
            "line": 167,
            "function": "setVisibility",
            "class": "League\\Flysystem\\Adapter\\Local",
            "type": "->"
        },
```
視認性の問題か？
filesystems の　visivilityをコメントアウト
     // 'visibility' => 'public',
          // 'visibility' => 'public',

![response](./ReadMeImage/コメント%202020-06-28%20082825.png)

php artisan stratga:link   ??
storage が必要だった
http://blog.localhost/storage/images/test.html

# vue
https://qiita.com/mimoe/items/b2ebfc1b38e5a905d19b
