# Poduzetnici.hr

**Poduzetnici.hr** is a comprehensive platform designed to empower the entrepreneurial ecosystem in Croatia. It goes beyond simple classifieds, serving as a dynamic hub where entrepreneurs can:

-   **Share Knowledge**: Exchange insights, experiences, and advice.
-   **Find Resources**: "Tražim" - Easily locate the tools, services, and partners you need.
-   **Offer Services**: "Nudim" - Showcase your expertise and solutions to a targeted audience.
-   **Connect**: Build meaningful business relationships and networks.

## 🚀 About the Platform

This application is built to facilitate growth and collaboration. Whether you are a startup founder, a freelancer, or an established business owner, **Poduzetnici.hr** provides the tools to connect with the right people and opportunities.

## 🛠 Tech Stack

-   **Framework**: [Laravel 11](https://laravel.com)
-   **Frontend**: Laravel Blade Templates
-   **Styling**: [Tailwind CSS](https://tailwindcss.com) with a custom "Modern Dark/Sleek" design system.
-   **Database**: MySQL
-   **Authentication**: Laravel Breeze

## 📂 Project Structure

-   `resources/views/layouts/app.blade.php`: Main application layout with the dark navigation bar.
-   `resources/views/welcome.blade.php`: Home page with hero section, categories, and featured ads.
-   `resources/views/ads/`: Contains ad listing (`index`) and detail (`show`) views.
-   `resources/views/auth/`: Customized authentication views (Login, Register) matching the V2 design.

## 🏁 Getting Started

1.  **Clone the repository**
2.  **Install Dependencies**:
    ```bash
    composer install
    npm install
    ```
3.  **Environment Setup**:
    -   Copy `.env.example` to `.env`
    -   Configure your database credentials in `.env`
4.  **Generate Key**:
    ```bash
    php artisan key:generate
    ```
5.  **Run Migrations** (Once DB is connected):
    ```bash
    php artisan migrate
    ```
6.  **Start Development Server**:
    ```bash
    npm run dev
    # In a separate terminal:
    php artisan serve
    ```

## 🎨 Design System

The project uses a custom Tailwind configuration with:
-   **Fonts**: 'Outfit' (Headings) and 'Plus Jakarta Sans' (Body).
-   **Colors**: Primary Teal (`#14b8a6`) and Dark Slate (`#0f172a`) palette.
