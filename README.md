<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Calo

Introduction
In the modern era, the presence of concert ticket scalpers is hard to avoid. Many concertgoers find themselves unable to purchase tickets through official channels and must resort to scalpers. However, the lack of centralized information on scalpers makes it difficult for buyers to find reliable sellers and compare prices. Calo, a web application, aims to provide a platform for buying and selling concert tickets securely and efficiently.

Calo is designed to facilitate safe and quick transactions between ticket buyers and scalpers. It offers a sophisticated search feature for buyers to find desired concert tickets and allows scalpers to market their tickets to a wider audience. Online shopping is preferred due to advancements in internet services and banking, which simplify transactions and offer convenience (Olii et al. 2020).

In Indonesia, online buying and selling applications are widespread. An example is Tiket.com, an online travel agency (OTA) website that allows users to book hotel rooms domestically and internationally (Rahmadiansyah et al. 2023).

### Methods

This project was developed using a combination of programming languages. For the front end, HTML, CSS, and JavaScript were used, while PHP was employed for the back end. Laravel and Tailwind CSS frameworks were utilized. MySQL, managed with TablePlus, served as the database management system. Laravel Herd was used as the web server.

The agile software development methodology, particularly extreme programming (XP), was chosen due to its adaptability to changing requirements and emphasis on communication, collaboration, and incremental testing (Ariesta et al. 2021).

## Contributing

Nurcahya Priantoro: Backend development, frontend-backend integration, UI design, diagram creation, report writing.

Nurul Fadillah: Frontend development, diagram creation, report writing.

Qurrotul ‘Aini: Diagram creation.

## Feature

User Management: Register, login, and manage user data.
Ticket Management: View ticket details, prices, and availability.
Ticket Sales: Buy and sell tickets.
Search Bar: Filter products by ticket name.
Ticket History: View purchase and sales history.
Help Center: Contact admin for support via WhatsApp.

## Conclusion

Calo aims to simplify and secure the process of buying and selling concert tickets. By providing a centralized platform, it ensures that users can find reliable sellers, compare prices, and conduct transactions with confidence.

## How To Install

**Clone the Repository: **

git clone https://github.com/Cahyo23042004/E-Commerce-Jual-Beli-Tiket-Bekas-Calo.git

cd E-Commerce-Jual-Beli-Tiket-Bekas-Calo

**Install Dependencies: **

npm install

composer install

**Set Up Environment Variables:**

Create a .env file in the root directory and add the necessary environment variables. Example:

**Generate Application Key:**

php artisan key:generate

**Run Database Migrations:**

php artisan migrate

**Start the Development Server:**
npm run dev
php artisan serve
