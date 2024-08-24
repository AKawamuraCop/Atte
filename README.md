# Atte(勤怠管理アプリ)

## 作成した目的
人事評価のため
</br>
## アプリケーションURL
</br>

## 他のリポジトリ
</br>

## 機能一覧
・ログイン/ログアウト機能<br />
・新規会員登録機能<br />
・打刻機能<br />
・日付別勤怠閲覧機能<br />
・ユーザー一覧閲覧機能<br />
・ユーザー月別閲覧機能<br />
<br />
## 使用技術(実行環境)
・PHP 8.1<br />
・Laravel 10.48.17<br />
・MySQL 8.0.26<br />

## テーブル設計図
![image](https://github.com/user-attachments/assets/58de492e-fe5f-435f-8080-a21bb8a94f92)


## ER図
![ER](https://github.com/user-attachments/assets/91090ae0-f549-456f-9918-8c324a820dcd)

## 環境構築
### Dockerビルド
1. git clone git@github.com:AKawamuraCop/Atte.git
2. DockerDesktopアプリを立ち上げる
3. docker-compose up -d —build

### Laravel環境構築
1. docker-compose exec php bash
2. composer install
3. 「.env.example」ファイルを「.env」ファイルに命名を変更。または、新しく.envファイルを作成。
4. .envに以下の環境変数を追加
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```
5. アプリケーションキーの作成
```
php artisan key:generate
```

6. マイグレーションの実行
```
php artisan migrate
```
7. シーディングの実行
```
php artisan db:seed
```
## URL
・開発環境：http://localhost/
<br />
・phpMyAdmin : http://localhost:8080/
