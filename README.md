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