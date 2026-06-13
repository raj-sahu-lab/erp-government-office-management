# Government Office Management — ERP System

A PHP-based workflow management system for government offices, handling ward/village administration, contact management, visit tracking, and approval workflows.

> **Note:** This is a 2015 portfolio codebase written in PHP 5.x. It uses the `mysql_*` extension (superseded by PDO in PHP 7) and MD5 password hashing — both reflective of the era. The SQL queries and password handling would be migrated to PDO with prepared statements and `password_hash()` before any production deployment today.

## Built: 2015

## Tech Stack

- **Backend:** PHP (MySQL)
- **Database:** MySQL
- **Frontend:** HTML, CSS, JavaScript, jQuery
- **Authentication:** Session-based login with role management

## Features

### Core Modules
- **Ward Management** — Ward contact records, visit scheduling and tracking
- **Village Management** — Village contact records, editing capabilities
- **Visit Tracking** — Schedule and record field visits with outcomes
- **Contact Directory** — Manage contacts across wards and villages
- **User Management** — Login, password change, role-based access

### Administrative
- **Approval Workflow** — Multi-level approval for office processes
- **Pagination System** — Custom PHP pagination for large record sets
- **Geographic Hierarchy** — District → Ward → Village structure
- **Report Generation** — List views with filtering

## Architecture

```
├── *.php               — Application pages
├── dbconnect.php       — Database connection config
├── include/            — Shared PHP libraries
├── css/                — Stylesheets
├── js/                 — JavaScript files
├── images/             — UI assets
└── Login.Submit.php    — Authentication handler
```

## Setup

1. Create MySQL database and import schema
2. Update `dbconnect.php` with your database credentials
3. Deploy to PHP/Apache server
4. Access `index.php` for login

## Note

Built for a real government office to manage field operations across multiple wards and villages. Handles the administrative workflow of tracking contacts, scheduling visits, and recording outcomes across geographic regions.
