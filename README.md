# 🚀 OrderDark

**OrderDark** is a Laravel group ordering application that supports user registration, group management, order storage, and box order tracking.

---

## ✨ Overview

OrderDark is designed to manage group orders with the following capabilities:

- Register users with optional profile image upload.
- Create groups with a unique 6-character join key.
- Join groups using the key.
- Save orders and attach categories to each order.
- Retrieve group orders through a queued job.
- Create and list box orders for group deliveries.

---

## 🔧 Main API Endpoints

| Endpoint                    | Method | Purpose                                             |
| --------------------------- | ------ | --------------------------------------------------- |
| `/api/storeUser`            | POST   | Create a user with `name` and optional `image`      |
| `/api/getUser/{id}/{name}`  | GET    | Validate user and return profile image              |
| `/api/storeGroup`           | POST   | Create a group and set the admin user               |
| `/api/joinGroup/{key}/{id}` | GET    | Join an existing group using a group key            |
| `/api/check/{id}`           | GET    | Verify group admin membership and return group name |
| `/api/getGroup/{groupId}`   | GET    | Return the group's orders and user data             |
| `/api/setBox/{groupId}`     | GET    | Create a new box order for a group                  |
| `/api/getBoxs/{groupId}`    | GET    | List box orders for a group                         |
| `/api/storeOrder`           | POST   | Save an order and its related categories            |
| `/api/getOrder/{id}`        | GET    | Fetch category items for a box order                |
| `/api/showOrder/{id}`       | GET    | Fetch category items for a specific order           |

---

## 🛠 Installation

```bash
cp .env.example .env
composer install
php artisan key:generate
```

Then update your database settings in `.env` and run:

```bash
php artisan migrate
```

If your project uses frontend assets:

```bash
npm install
npm run build
```

---

## 💻 Development

Start the local server:

```bash
php artisan serve
```

If you use Laravel queues for group order retrieval:

```bash
php artisan queue:listen --tries=1
```

---

## 🗄 Database Tables

This project uses the following tables:

- `users`
- `groups`
- `order`
- `categories`
- `box_orders`

---

## 📌 Notes

- Group keys must be exactly **6 characters** and must be unique.
- Uploaded profile images are saved to `public/images`.
- Group order retrieval leverages a queued job for data aggregation.

---

## 📄 License

This project is distributed under the **MIT License**.
