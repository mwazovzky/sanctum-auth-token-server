# Laravel Sanctum token authentication

## Login

Create token

## Authentication

Request authentication using Bearer token

```
curl --location --request GET 'http://localhost:8000/api/user' \
--header 'Accept: application/json' \
--header 'Authorization: Bearer 1|okKUA9gALcLLPDA0LBEguonDRqpKrEGBY12Nnw2u456f128c' \
--form 'email="alex@example.com"' \
--form 'password="password"'
```
