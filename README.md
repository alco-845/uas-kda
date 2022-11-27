## To Do:
1. Create database kda_jwt
2. Migrate and seed
3. Run the server

## Login url:
http://127.0.0.1:8000/login

header:
- username
- password

## Check is authorized or not
http://127.0.0.1:8000/user/{id}

## Data Mahasiswa
Unauthorized feature: Get
- Get : http://127.0.0.1:8000/mahasiswa
- Get : http://127.0.0.1:8000/mahasiswa/{id}
- Post : http://127.0.0.1:8000/mahasiswa/{id}
- Put : http://127.0.0.1:8000/mahasiswa/{id}
- Delete : http://127.0.0.1:8000/mahasiswa/{id}

header:
- nim
- nama
- alamat

## Authorization:
bearer {token}