# 🌀 VINEXEL Framework

**Vivid Innovation for Excellence**

![Vinexel Logo](https://vinexel.com/static/vinexel/images/logo.png)

> “Think different. Build the Vinexel way.” — _Vinexel Pioneers_

Vinexel is a next-generation **PHP framework** engineered for **high-performance, multi-domain, and modular architectures**.  
It combines the elegance of Laravel’s ecosystem, the power of H-MVC, and the flexibility of custom architecture — all written in clean, modern PHP 8.3+ syntax.

It’s not just a framework — it’s an **ecosystem** that powers entire platforms, including **multi-IB systems, e-commerce, SSO services, SaaS, and enterprise-grade portals.**

---

## 🧠 Core Philosophy

Vinexel was built to provide a **stable, flexible, and modern foundation** for developers who demand more control over every layer of their applications.  
Its design focuses on:

- **Clarity** — clean separation of domains, adapters, and infrastructure.
- **Consistency** — predictable structure across projects.
- **Performance** — optimized PDO queries, Redis integration, and lightweight autoloading.
- **Scalability** — multi-domain support for SaaS and enterprise platforms.

---

## ⚙️ Architectural Overview

Vinexel adopts a **Hybrid Modular H-MVC** pattern enriched with **Hexagonal Architecture principles**, which means:

Each domain (e.g., yourdomain1, yourdomain2, yourdomain3) is isolated yet powered by the same core — enabling **multi-tenant** or **multi-project** management from a single Vinexel instance.

---

## 🚀 Key Features

### 🧩 Modular & Scalable Architecture

- H-MVC + Hexagonal principle structure with domain isolation.
- Fully PSR-4 compliant autoloading.
- Modular routing with per-domain route files.

### 🔐 Security & Middleware

- **Session-based authentication** with traits:
  - `Protection` → Enforces login access.
  - `Restriction` → Prevents redundant login.
- **Flasher** library for real-time notification messages.
- **CSRF-safe form submissions** and input sanitization.

### ⚡ Redis Integration

- Custom-built internal **Redis engine** (`Deeper\Libraries\Redis`)
- Session, cache, and flash message handling faster than Predis.
- Supports **SSO (Single Sign-On)** for seamless multi-application authentication.

### 🧰 Database Layer

- Built-in **PDO Query Builder** via `Vision\Modules\Database`.
- Secure prepared statements and bound parameters.
- Methods: `query()`, `bind()`, `execute()`, `single()`, `rowCount()`, and `lastInsertId()`, etc.

### 🎨 View System

- Integrated custom **Twig** for **Rapid Templating Engine**.
- Supports file extensions `.php` pure native syntax and `.rapid.php` for custom rapid comprehensive templating engine.
- Global view helpers (`asset()`, `getUserData()`, `getUserEmail()`).

### 🧑‍💻 User Management

- Authentication system with `Protection` and `Restriction`.
- Password hashing, email verification, and activation codes.
- PIN-based recovery system with secure update methods.

### 🧱 Installer & Environment Bootstrapping

- **Dynamic installer** (`InstallForms` + `BaseModel::installer()`)
- Auto-configures admin credentials on first setup.
- Supports `.env` + fallback to `config.php`.

### 🌐 Multi-Domain & SaaS Support

- Intelligent domain detection at runtime.
- Domain-to-project routing for example:
  - `127.0.0.1:8000` → `Project1`
  - `127.0.0.1:8001` → `Project2`
  - `127.0.0.1:8002` → `Project3`
  - and more unlimited projects

### 🔄 Flash & Session Utilities

- `Flasher` and `Session` built into the framework core.
- Instant notifications with styles (Bootstrap/Tailwind).
- Session persistence using Redis backend.

### 🧠 CLI & Development Tools

- Vinexel CLI for creating controllers, models, routes, and migrations.
- `php vision make:model User` → instantly scaffolds model classes.
- Supports multiple environments: `development`, `testing`, `production`.

---

## 📦 Installation

### 1️⃣ Install Composer

If you don’t have Composer installed, get it here:  
👉 [https://getcomposer.org/download/](https://getcomposer.org/download/)

### 2️⃣ Create a New Vinexel Project

```bash
composer create-project vinexel/vinexel my-project
```

### 3️⃣ Run the Local Development Server
```bash
php vision serve

php vision serve {project-port}
```

### 🧾 Configure your environment after installation completed at instalation panel

### 🌍 Official Links

Website: https://vinexel.com
Documentation: Coming soon
Author: Elwira Perdana

### 📜 License

Vinexel Framework is open-source software licensed under the MIT License.
© PT Iconic Wira Niaga — Vision to Innovation.
