SMK PRESTASI PRIMA WEB PORTAL
=============================

What is this?
-------------
This is the central web platform for SMK Prestasi Prima. It handles the public website, administrative panels (AdminPP), and various interactive modules like the 360 Virtual Tour.

It is built on Laravel. It is fast. It is local.

System Requirements
-------------------
If you want to run this, you need a capable machine.

- **PHP 8.1+** (PHP 8.2 or 8.3 recommended).
- **Composer** (Dependency manager).
- **Node.js & NPM** (For compiling assets).
- **MySQL/MariaDB** (Database).

If you are on Windows, use Laragon or WSL2. Do not use XAMPP unless you enjoy pain.

Installation
------------
1.  **Clone the repository**:
    ```bash
    git clone <repo_url> presta-prima
    cd presta-prima
    ```

2.  **Install Dependencies**:
    DO NOT SKIP THIS.
    ```bash
    composer install
    npm install
    ```

3.  **Environment Setup**:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
    Edit `.env` and set your database credentials (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).

4.  **Database & Seeding**:
    We have seeders. Use them.
    ```bash
    php artisan migrate:fresh --seed
    ```

Running the Thing
-----------------
You need multiple processes running. Use separate terminals.

**Terminal 1: The Web Server**
```bash
php artisan serve
```

**Terminal 2: The Asset Bundler**
```bash
npm run dev
```
*Note: This handles Tailwind JIT and hot implementation. Do not edit CSS manually.*

**Terminal 3: Realtime Server (Reverb)**
```bash
php artisan reverb:start
```
*Note: Required for Admin Chat, Notifications, and Visitor stats. Runs on port 8080.*

Architecture & Philosophies
---------------------------
1.  **No CDNs**: We host assets locally. If you need a library, install it via NPM and import it in `resources/js/app.js`. Do not paste separate `<script src="https://cdn...">` tags in Blade files. It makes the site slow and dependent on third parties.
2.  **Vite**: We use Vite for bundling. It is fast. Learn it.
3.  **Blade & Alpine**: We use server-side rendering with Blade and minimal JS sprinkling with Alpine.js. We do not use a massive SPA framework where it is not needed.
4.  **Reverb**: We use Laravel Reverb for WebSockets. It replaces Pusher. It is self-hosted.

Documentation
-------------
We take documentation seriously.

- **System Documentation (Docusaurus)**: Run `cd documentation && npm start` and visit `http://localhost:3000`. It contains architecture, user manuals, and deployment guides.
- **API Documentation (Swagger)**: Visit `http://localhost:8000/api/documentation` to see the OpenAPI spec.
- **Deployment Scripts**: Use `./deploy.sh` for automated production deployment. Run `./pre-deploy-check.sh` before you ship.

Directory Structure
-------------------
- `app/` - The core logic.
- `resources/views/prestasiprima/` - The public facing site.
- `resources/views/layouts/` - Admin layouts.
- `documentation/` - System documentation (Docusaurus).

Contribution
------------
Read `documentation/docs/contributing.md` before you start. If you commit code that breaks the build, revert it immediately.
If you add a massive image without compressing it, shame on you.

License
-------
Proprietary. Property of SMK Prestasi Prima.
