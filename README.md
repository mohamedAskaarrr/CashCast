<p align="center">
    <img src="https://github.com/mohamedAskaarrr/CashCast/blob/main/cashcast.jpeg" width="100" alt="Logo">
</p>

<h1 align="center">CashCast</h1>

<p align="center">
  Smart budgeting web app with predictive analytics built on Laravel.
  <br>
  Track expenses, analyze trends, and plan smarter.
</p>

<p align="center">
    <a href="#"><img src="https://img.shields.io/badge/status-in%20progress-yellow" alt="Project Status"></a>
    <a href="#"><img src="https://img.shields.io/badge/build-passing-brightgreen" alt="Build Status"></a>
    <a href="#"><img src="https://img.shields.io/badge/laravel-11-red" alt="Laravel Version"></a>
    <a href="#"><img src="https://img.shields.io/badge/license-MIT-blue" alt="License"></a>
</p>

---

## 🚀 Features

- 📈 Visual spending dashboards
- 🧠 AI-lite trend predictions
- 🏷️ Auto-categorized expenses
- 🔁 Background job processing (Horizon + Redis)
- ⏱️ Automated analysis (Laravel Scheduler)

---

## ⚙️ Installation

```bash
git clone https://github.com/mohamedAskaarr/CashCast.git
cd CashCast
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
