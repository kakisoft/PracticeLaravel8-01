# PracticeLaravel8-01
Laravel8 で遊ぶ用  
Laravel Framework 8.15.0

## 起動・終了
```
docker-compose up -d
docker-compose down
```

## コンテナに入る
```
docker-compose exec app bash
```


## 終了時にコンテナを削除
```
docker-compose down --rmi all
docker-compose down --rmi all --volumes
```

_______________________________________________________________________________
_______________________________________________________________________________
_______________________________________________________________________________
# 初回起動時

## composer install
```
composer install
```

## .env を用意
.env.example をコピー。  
必要があれば編集。


## .env のDB設定編集
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=myapp01
DB_USERNAME=user
DB_PASSWORD=password
```


## migrate
```
php artisan migrate
```


## キーを用意
コピーしない場合は、コマンドで作成。
```
php artisan key:generate
```


_______________________________________________________________________________
_______________________________________________________________________________
_______________________________________________________________________________
# プロジェクト作ったり、モデルを追加したり

## Create Project
```
composer create-project --prefer-dist  "laravel/laravel=5.5" my-laravel-app
```

## Rollback
```
php artisan migrate:rollback
```

## Migration ファイルと Model を作成
8 からは Models階層がデフォルトになった・・・  

※単数形  
```
php artisan make:model Post -m
php artisan make:model Category001/Comment -m
php artisan make:model Category002/Question01RegistrationInformation -m
（編集）
php artisan migrate
```

## Model 編集
テーブル名を指定（しなくてもできるけど、やっといた方が便利）
```
php artisan make:migration add_api_token_1_to_user_table --table=users
（編集）
php artisan migrate
```


## RequestModel追加
```
php artisan make:request PostRequest
php artisan make:request Question01RegistrationInformationRequest
```


## Controller 追加
Laraveベストプラクティスの命名規則では、コントローラ名は単数。  
https://github.com/alexeymezenin/laravel-best-practices/blob/master/japanese.md  
```
php artisan make:controller PostsController
php artisan make:controller CommentsController


// web コントローラ
php artisan make:controller Question01Controller


// API コントローラ
php artisan make:controller API/Question01ApiController
```


## シーダ
```
// 作成
php artisan make:seeder UsersTableSeeder
php artisan make:seeder Question01RegistrationInformationTableSeeder


// 実行（前準備だっけ？）
composer dump-autoload

// データ作成（シーダを基にレコードを登録）
php artisan db:seed
php artisan db:seed --class=UsersTableSeeder
php artisan db:seed --class=Question01RegistrationInformationTableSeeder


// リフレッシュ
php artisan migrate:refresh --seed
```

_______________________________________________________________________________
# キャッシュをクリア

```
# Model を更新した時とか（クラスの変更が反映されてないっぽい時とか）
composer dump-autoload

-----------------------------------------------
# 設定ファイルのキャッシュをクリア
php artisan cache:clear

# アプリケーションのキャッシュをクリア
php artisan config:clear

# ルートのキャッシュをクリア
php artisan route:clear

# ビューのキャッシュをクリア
php artisan view:clear

-----------------------------------------------
# コンパイルされたクラスをクリア
php artisan clear-compiled

# 最適化されたクラスローダを生成
php artisan optimize

# 設定をキャッシュしておかないと、アクセスするたびに毎回全ファイルを読み込む。
php artisan config:cache

```

_______________________________________________________________________________
_______________________________________________________________________________
_______________________________________________________________________________
# リポジトリパターン

 1. サービスクラスとデータアクセスクラス、データストアが依存した状態
 2. インジェクションを使い、ビジネスロジックからデータアクセス処理を分離した状態
 3. データアクセスクラスを抽象と具象に分け、クラス間の結合を弱めた状態


2 - Song  
3 - Album  



