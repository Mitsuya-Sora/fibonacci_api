# フィボナッチ数を返すAPIサービス

## 使用技術

言語 : PHP

FW : Laravel

開発環境 : Docker

本番環境 : Heroku

## 本番環境

https://fibonacci-api-328.herokuapp.com/




## 実行例

PHPはunsigned intに対応しておらず、例n=99の時`218922995834555169026`のまま表現できないと判断したため、floatでの表現としました。64bitの場合、n>92の時にfloatで表現されます。

(参考:https://www.php.net/manual/ja/language.types.integer.php)

実行例1

`curl -X GET -H "Content-Type: application/json" "https://fibonacci-api-328.herokuapp.com/fibo?n=30"`

出力例1

`{"result":832040}`

実行例2

`curl -X GET -H "Content-Type: application/json" "https://fibonacci-api-328.herokuapp.com/fibo?n=99"`

出力例2

`{"result":2.189229958345552e+20}`

実行例3

`curl -X GET -H "Content-Type: application/json" "https://fibonacci-api-328.herokuapp.com/fibo?n=3.5"`

出力例３

`{"status":400,"message":"Bad Request. Query parameter 'n' should be a natural number."}`


## 主要な機能の実装を用いたファイル

https://github.com/Mitsuya-Sora/fibonacci_api/edit/main/app/Http/Controllers/CalculationsController.php

https://github.com/Mitsuya-Sora/fibonacci_api/edit/main/app/Services/CalculationService.php

https://github.com/Mitsuya-Sora/fibonacci_api/edit/main/routes/api.php

https://github.com/Mitsuya-Sora/fibonacci_api/blob/main/app/Exceptions/Handler.php

## テストファイル

https://github.com/Mitsuya-Sora/fibonacci_api/edit/main/tests/Feature/CalculationTest.php

https://github.com/Mitsuya-Sora/fibonacci_api/edit/main/tests/Unit/CalculationTest.php
