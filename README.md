# データベース及び演習最終課題
## データベース概要
このプログラムは、ToDoリスト作成が行えるWebアプリケーションである。
会員登録を行いToDoを登録すると、登録したToDoを一覧にして確認することが出来る。
## 開発・動作確認環境
### 開発環境
AWS Cloud9   
XAMPP:OS X 7.4.28    
PHP:7.4.30    
Laravel:6.20.44   
Composer:version 2.3.10
### 動作確認環境
OS:macOS BigSur バージョン11.6.5
XAMPP:OS X 7.4.28
PHP:7.4.30
Laravel:6.20.44
Composer:version 2.3.10
## データベースセットアップ方法
* **手順1(Laravelのインストールのため、既にインストールされている場合はスキップ)**
Composerを```brew install composer```でインストールする。
```composer global require "laravel/installer"```でLaravelをインストールする。
```vim ~/.zshrc```で、vimでファイルを開き、
```export PATH="$PATH:/Users/<ユーザー名>/.composer/vendor/bin"```をファイル最後の行に追加し、保存する。
その後```source ~/.zshrc```でパスを通す。
これでLaravelのインストールが完了した。
* **手順2**
htdocs内にこのフォルダを配置する。

* **手順3**
``` mysql -u root -p```
でroot接続する。（パスワードは無しのため、何も打たずEnterでOK）

* **手順4**
```
source /Applications/XAMPP/xamppfiles/htdocs/k20127_DBlastissue/setup.sql
```
を実行し、データベースとユーザーを作成する。
(database名は"ToDo_db"、user名は"wdtkr"、パスワードは"password"で作成)
また、上記が実行出来ない場合、/htdocs以下を自身のファイル構造に置き換えて実行する必要がある。
セットアップが完了したら、```exit;```でmysqlを抜ける。
* **手順5**
.envファイル内の一部を以下の内容に書き換える。
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ToDo_db
DB_USERNAME=wdtkr
DB_PASSWORD=password
```

```cd k20127_DBlastissue/cms``` でcms内に移動。
```php artisan migrate```を実行。
実行ができると、ToDo_dbにテーブルが作成される。
（.envファイルの設定が適切にされていれば、マイグレーションを実行してもToDo_dbにのみ上手くテーブルが追加されているはず）
```
php artisan db:seed --class="TodocontentsTableSeeder
```
を実行すると、ToDoのテストデータが追加される。
* **手順6**
```
php artisan serve --port=8080
```
でサーバーを起動。また、XAMPPでMySQL Databaseを起動させておく。(configureからportが3306になっていることを確認)
表示されたURLに接続すると、Webアプリケーションを使用できる。
