# LaraCMS

Alpha Development Build of LaraCMS

[![License: GPL v3](https://img.shields.io/badge/License-GPLv3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0)
![GitHub Release](https://img.shields.io/github/v/release/Vilkrin/LaraCMS)
![GitHub contributors](https://img.shields.io/github/contributors/Vilkrin/LaraCMS)

## Description

LaraCMS is an open-source content management system (CMS) built on the Laravel framework. It aims to provide a user-friendly interface for managing and publishing content on the web.

LaraCMS is currently in Early Alpha Development.

## Features (Currently Live)

-   Blog
-   Gallery - Single images atm - albums still wip
-   Admin - User Management (with Roles & Perms)

## Planned Features

-   Custom Pages
-   Custom Drag & Drop Menu's
-   URL Shortner
-   URL Redirects
-   Plugins to Expand on features
-   Themes

## 🏗️ Tech Stack

-   Laravel 12
-   Livewire
-   Laravel Nightwatch
-   Tailwind CSS
-   Spatie Laravel-Permission
-   Spatie Media Library
-   Spatie Laravel Sitemap

## Installation

git clone https://github.com/Vilkrin/LaraCMS.git  
cd laracms  
git checkout -b feat/your-feature # or fix/your-fix  

> Don't push directly to the main branch. Instead, create a new branch and push it to your branch.  

composer install  
npm install  

cp .env.example .env  
php artisan key:generate  

# Create or configure your database:  

# E.g. for SQLite  

touch database/database.sqlite  

php artisan migrate  
php artisan storage:link  

# Front-end asset build (watch mode) & Start Server  

Composer run dev  
