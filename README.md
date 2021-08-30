# sample-docker

1. セットアップ
```
bin/setup
```

2. 起動する
```
bin/start
```

3. phpコンテナに入る
```
docker exec -it sample_app_php bash
```

4. .envを書き換える docker-compose.ymlを参照する
```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE= sample_db
DB_USERNAME=docker
DB_PASSWORD=docker
```

5. cacheを削除する
```
php artisan config:cache
```

6. migrationを走らせる
```
php artisan migarate
```