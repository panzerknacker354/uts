# UAS PRAKTIKUM PENGEMBANGAN APLIKASI WEB
### Kelas ..
### Waktu : +- 90 Menit
## Rules
Ada beberapa peraturan yang harus temen - temen pahami dalam UAS kali ini di antaranya :

- Perserta wajib berdo'a terlebih dahulu sebelum melaksanakan UAS.
- Peserta di perbolehkan untuk Searching dan bebas berselancar di internet
- Peserta dilarang saling tukar hasil UAS
- Peserta dilarang berdiskusi satu sama lainnya

Sebelum masuk ke soal peserta UAS di haruskan menyiapkan environment terlebih dahulu di antaranya :

### Database Environment
- Database : uas_db
- Table: users
```
create table users(
    id int primary key auto_increment,
    first_name varchar(30),
    last_name varchar(30),
    username varchar(20),
    email varchar(30),
    password varchar(75)
);
```
- table : categories
```
create table categories(
    id int primary key auto_increment,
    name varchar(30),
    description text
);
```
- Table : books
```
create table books(
    id int primary key auto_increment,
    serial varchar(20),
    title varchar(30),
    author varchar(45),
    synopsis text,
    id_books_categories int
);
```

### STEP 1
Pertama - tama Peserta lakukan clone terlebih dahulu file project dari repository dengan cara :
```
git clone link repository
```
### STEP 2
lakukan configurasi database yang berada di dalam
```
/config/database.php
```
Sesuaikan Koneksi seperti host, username, password dan nama database;

### Clue
ada beberapa clue yang bisa di jadikan sebagai celah dalam UAS kali ini.
- require_once();
- __construct();
- Class Object
- eloquent/record.php
- app/controllers/UserController.php
- Execute Resource

## SOAL
1. Buatlah CRUD sederhana pada table books dan categories dengan output berupa json yang telah di sediakan `app/presenters/presenter.php`

2. Relasikan table books dan categories sehingga mendapatkan output sebagai berikut :
```
[
    'id' : 1,
    'type' : 'books'
    'attribute' : {
        'serial' : 'KYH787JYU87',
        'title' : 'Books about PHP Native',
        'author' : 'Danis Yogaswara',
        'relations' : 'categories',
        'id_relation' : 2
    }
]
```
### NOTE :
- setting PHP PATH di C:/xampp/php copy ke environment variable computer masing-masing
- Lakukan Eksekusi menggunakan terminal `php index.php`
