# 更新履歴

…という名のただのメモ書きです

## Add initial set of files

 - `symfony new SymfonyEx --full`を実行、フルセットのSymfonyプロジェクトを作成

## [Update] Configure for apache

 - `symfony/apache-pack`をrequire、`.htaccess` (参考: [公式](https://symfony.com/doc/current/setup/web_server_configuration.html))
 - `.env.local`作成

## [Update] add IndexController

 - `IndexController`作成(`console make:controller`)

## [Update] add Bootstrap

 - Encoreインストール(参考: [公式](https://symfony.com/doc/current/frontend/encore/installation.html))
    - `assets`生成、`assets/styles/*.scss`にscss記述 `app.js`に読み込むファイルを指定
 - Bootstrapインポート(参考: [公式](https://symfony.com/doc/current/frontend/encore/bootstrap.html))
 - scssのビルド(参考: [公式](https://symfony.com/doc/current/the-fast-track/en/22-encore.html#leveraging-bootstrap))
 - ビルドファイル出力先変更 ([webpack.config.js](webpack.config.js#L13-L15) 参考: [GitHub](https://github.com/symfony/webpack-encore/issues/580))

## [Update] separate css, modify scripts

 - scssファイルを変数定義とスタイル定義に分割、`app.scss`で統括的に読み込むよう変更
 - Stimulus系ファイル及び`app.js`での参照を削除、`scripts/`でVanillaJSを記述しimportするように

## [Add] Workflows

 - GitHub Actionsのワークフローファイルを追加

## [Update] stylesheets, separated templates

 - `index.html.twig`からヘッダ部をぬきだし、`header.html.twig`に移動
 - scss更新

## [Update] CI

 - `.github/workflows/deploy.yml`にCI/CDを記述、サーバにデプロイできるように
 - `README.md`にステータスバッジを表示

## [Update] TODO-list frame

 - TODOリストでも作ります?(雑ノリ) という思想のもとtwig, scssを更新

## [Add] Entities

 - `TaskList`,`Task`エンティティを追加
 - マイグレーションファイル生成 (`console m:mig`, `console d:m:m`)

## [Delete] controllers.json

 - `controller.json`削除
 - `webpack.config.js`の設定を(Stimulusを使用しないように)変更
