# Laravel Clean API

A Laravel 12 project demonstrating clean architecture principles with:

- Service layer (`ProductService`, `AuthService`)
- DTO (Data Transfer Objects) for request validation
- API Resources for consistent JSON responses
- Helper functions for standardized success/error messages
- CRUD operations with pagination

## Features

- CRUD operations for Products
- Standardized API responses with helper
- Pagination support
- DTOs for request validation
- Clean separation of concerns (Service, Controller, DTO, Resource)

## Installation

1. Clone the repository:

```bash
git clone https://github.com/username/laravel-clean-api.git

composer install

cp .env.example .env
php artisan key:generate

php artisan migrate

php artisan serve


---

### 4️⃣ Usage / Foydalanish

```markdown
## Usage

- API endpoints for Products (index, store, update, show, delete)
- Authentication using Sanctum
- Responses always include `message`, `data`, and HTTP status code

## Example Response

```json
{
  "message": "Products fetched successfully",
  "data": [
    {
      "id": 1,
      "name": "Product 1",
      "price": 100,
      "stock": 10
    }
  ],
  "meta": {
    "per_page": 10,
    "current_page": 1,
    "total": 50,
    "last_page": 5
  }
}


---

### 6️⃣ Contributing / Qo‘shilish

```markdown
## Contributing

- Fork the repository
- Create a new branch for your feature or bugfix
- Open a pull request

## License

MIT

