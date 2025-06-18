
# GitHub Issues Viewer – Laravel + Bootstrap

This is a Laravel application that allows a GitHub user to view **all open issues assigned to them** across visible repositories, and view details of any individual issue. The UI is styled with **Bootstrap 5** and powered by the GitHub REST API.

---

## ✨ Features

- Lists **open** GitHub issues assigned to the authenticated user.
- Shows issue **number**, **title**, and **creation date**.
- Allows navigation to a detailed view with issue **description**.
- Uses **GitHub Personal Access Token (PAT)** for authentication.
- Clean and responsive **Bootstrap UI**.
- Written in **Laravel 10+**, PHP 8.1+.

---

## 🚀 Getting Started

### 1. Clone the Repo

```bash
git clone https://github.com/johnpatricklleno/github-viewer.git
cd github-viewer
```

---

### 2. Install Dependencies

```bash
composer install
npm install
```

---

### 3. Set Up Environment

Copy the `.env` and configure your local token:

```bash
cp .env.example .env.local
```

Then in `.env.local` or `.env`, add your **GitHub Personal Access Token**:

```
GITHUB_PERSONAL_TOKEN=ghp_yourtokenhere
```
---

### 4. Generate Key

```bash
php artisan key:generate
```

---

### 5. Build Assets (Optional)

Only needed if modifying JS or CSS:

```bash
npm run dev
```

---

### 6. Run the Server

```bash
php artisan serve
```

Visit:  
👉 http://localhost:8000/issues

---

## 🧱 Project Structure

- `app/Services/GithubService.php` – Handles GitHub API logic.
- `app/Http/Controllers/GithubIssueController.php` – Routes & view data.
- `resources/views/` – Blade views (`Bootstrap 5` based).
- `routes/web.php` – Routes for listing and showing issues.

---

## 📷 Screenshots

| Issue List | Issue Detail |
|------------|--------------|
| ![List](screenshots/list.png) | ![Detail](screenshots/detail.png) |

---

## ⚙️ GitHub Token Setup

To generate a GitHub token:
1. Go to GitHub → Settings → Developer Settings → Personal Access Tokens
2. Click **"Generate new token (classic)"**
3. Select the following scopes:
   - `repo`
   - `read:user`
4. Save and copy the token to your `.env.local` or `.env` file
---

## 🧠 Notes

- Laravel version: `10+`
- PHP version: `8.1+`
- Frontend: `Blade + Bootstrap 5`
- GitHub API: `https://api.github.com/issues`

---
