# Product & Stock Service

## Deskripsi

Product & Stock Service merupakan layanan backend berbasis Laravel yang menyediakan API untuk mengelola data produk dan stok barang. Service ini mendukung REST API serta GraphQL untuk memudahkan integrasi dengan sistem lain.

---

## Teknologi yang Digunakan

* PHP 8.x
* Laravel 12
* MySQL
* Laravel Eloquent ORM
* GraphQL (Lighthouse)
* Postman

---

## Fitur

### REST API

* Menampilkan daftar produk
* Menampilkan detail produk
* Menambahkan produk
* Mengubah data produk
* Menghapus produk

### GraphQL

* Query daftar produk
* Query detail produk berdasarkan ID

---

## Struktur Data Produk

| Field      | Tipe      |
| ---------- | --------- |
| id         | Integer   |
| name       | String    |
| price      | Float     |
| stock      | Integer   |
| created_at | Timestamp |
| updated_at | Timestamp |

---

## Instalasi

Clone repository

```bash
git clone <repository-url>
```

Masuk ke folder project

```bash
cd product-stock-service
```

Install dependency

```bash
composer install
```

Copy file environment

```bash
cp .env.example .env
```

Generate application key

```bash
php artisan key:generate
```

Konfigurasi database pada file .env.

Jalankan migrasi

```bash
php artisan migrate
```

Jalankan server

```bash
php artisan serve
```

---

## Endpoint REST API

Semua endpoint REST API di bawah ini dilindungi menggunakan **API Key** yang dikirimkan melalui **Request Header** `X-API-KEY`.

### Daftar Endpoint

* **GET `/api/v1/products`** - Menampilkan daftar produk
* **GET `/api/v1/products/{id}`** - Menampilkan detail produk berdasarkan ID
* **GET `/api/v1/products/{id}/stock`** - Menampilkan informasi stok produk berdasarkan ID
* **POST `/api/v1/products/check-stock`** - Memeriksa ketersediaan stok produk (Payload: `{"product_id": 1, "quantity": 5}`)

### Contoh Penggunaan Header

Kirimkan header berikut pada setiap request:

```http
X-API-KEY: my-secret-api-key
```

---

## GraphQL Endpoint

```
POST /graphql
```

Contoh Query

```graphql
{
  products {
    id
    name
    price
    stock
  }
}
```

Contoh Query Detail

```graphql
{
  product(id:1){
    id
    name
    price
    stock
  }
}
```

---

## Pengujian

REST API diuji menggunakan Postman.

GraphQL diuji menggunakan Postman dengan metode POST ke endpoint `/graphql`.

---

## Author

Noval Ariadi

Sistem Informasi

Telkom University
