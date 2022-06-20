# データベース及び演習最終課題
## データベース設計
### メンバーテーブル
**会員情報テーブル:member**
* id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT
* username VARCHAR(50)
* password VARCHAR(128)

**講義テーブル:lecture**
* id(1~講義数) SMALLINT
* kougi_name VARCHAR(50)

**ToDoテーブル:todo**
* id
* kougi_id(講義の中から選択)
* deadline(期限)
* title(タイトル)
* content(内容)
* complete_flg(完了したかどうか)