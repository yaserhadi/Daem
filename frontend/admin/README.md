# Vue Vben Admin Integration

This folder is intended for the [Vue Vben Admin](https://github.com/vbenjs/vue-vben-admin) codebase. The admin panel can be used as the UI for the Jetstream-powered Laravel backend.

To get started:

1. Clone the Vben admin project into this directory:

   ```bash
   git clone https://github.com/vbenjs/vue-vben-admin.git frontend/admin
   ```

2. Install the dependencies and run the development server:

   ```bash
   cd frontend/admin
   pnpm install # or yarn / npm install
   pnpm dev
   ```

3. Update `vite.config.js` to also build the admin panel. A simplified example:

   ```js
   import { defineConfig } from 'vite';
   import laravel from 'laravel-vite-plugin';
   import vue from '@vitejs/plugin-vue';

   export default defineConfig({
       plugins: [
           laravel({
               input: [
                   'resources/js/app.js',
                   'frontend/admin/src/main.ts',
               ],
               refresh: true,
           }),
           vue(),
       ],
   });
   ```

4. Create a route in `routes/web.php` that serves the admin panel:

   ```php
   Route::get('/admin/{any?}', fn () => view('admin'))
       ->where('any', '.*')
       ->middleware(['auth']);
   ```

5. Add a `resources/views/admin.blade.php` that loads the compiled assets (from `public/build` by default) and mounts the admin Vue application.

This setup allows the Jetstream backend (authentication, teams, etc.) to be accessed by the Vue Vben Admin frontend.
