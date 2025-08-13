# Gallery

A simple PHP-powered image gallery app. Upload, categorize, view, and manage your images through a clean, Bootstrap-powered interface.

---

## Overview

This project provides a user-friendly interface to manage image uploads via PHP and MySQL. It’s a lightweight, Bootstrap-enhanced gallery setup—great for small personal projects, portfolios, or learning how file uploads work in PHP.

Why this repo exists:
- Makes PHP-based image management easy.
- Shows a clean, Bootstrap-styled layout without overcomplication.
- A good base for adding user auth, image processing, or cloud storage down the line.

---

## Features

- Upload images with categories  
- View image list in descending upload order  
- Edit or delete images with confirmation prompts  
- Bootstrap 5 styling for responsiveness

---

## Getting Started

### Prerequisites

- PHP 7.x or newer  
- MySQL or MariaDB  
- A web server like Apache or Nginx  
- `project/database/db.php` configured with correct database credentials

### Installation

Follow these steps to get it running:

```bash
# Clone the repo
git clone https://github.com/PapriBiswas2023/gallery.git
cd gallery

# Set up the DB:
# 1. Create a database, e.g. `gallery_db`
# 2. Run:
#    CREATE TABLE `images` (
#      `id` INT AUTO_INCREMENT PRIMARY KEY,
#      `filename` VARCHAR(255) NOT NULL,
#      `category` VARCHAR(100) NOT NULL
#    );

# Update connection details in:
# database/db.php

# Place project folder in your web server's root (e.g., htdocs or www)

# Access via browser:
# http://localhost/gallery/upload-image.php to add images
# http://localhost/gallery to view gallery
