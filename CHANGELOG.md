# 🧩 Vinexel Framework — Changelog

All notable changes to this project will be documented in this file.  
This project adheres to [Semantic Versioning](https://semver.org/).

---

## [v1.0.0] - 2025-10-19

### 🎉 Initial Release

- First public release of **Vinexel Framework 1.x**
- Introduced **H-MVC Architecture** structure:
  - app / {project} /
- Implemented **Multi-Domain Routing System**
  - Auto-detect project folder based on accessed domain
- Added **Environment Modes**
  - `development`, `testing`, `production`
- Built-in **PSR-4 Autoloader**
- Database layer using **PDO Query Builder**
- Session and Auth helper integration
- Default MVC skeleton for rapid project creation
- Support for `.env` and fallback `config.php` values
- Framework-ready for **Laragon (recommended)** environment

---

## [Unreleased]

### 🚧 Upcoming Features (planned for 1.x minor update)

- CLI tool: `vision` and `vision make:controller`
- Built-in RESTful API scaffolding
- Native job queue and task scheduler
- Cache driver (Redis, File, Memory)
- Package publishing system for shared modules
- WebSocket and event broadcasting layer

---

## 🗓️ Versioning Policy

Vinexel follows **semantic versioning** (`MAJOR.MINOR.PATCH`):

- **MAJOR** → Breaking changes (1.x → 2.x)
- **MINOR** → Backward-compatible new features (1.0 → 1.1)
- **PATCH** → Backward-compatible bug fixes (1.0.0 → 1.0.1)

---

## 🧠 Credits

Vinexel Framework is built and maintained by the **Vinexel Pioneers** —  
a community of developers crafting automated, multi-domain ecosystems.

> “Build your ecosystem. Be a Vinexel Architect.”
