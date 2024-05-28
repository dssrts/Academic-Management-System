/** @type {import('tailwindcss').Config} */

module.exports = {
    content: [
      './app/Filament/**/*.php',
      './resources/views/components/logo.blade.php',
      './resources/views/filament/**/*.blade.php',
      './vendor/filament/**/*.blade.php',
    ],
    theme: {
      extend: {},
    },
    plugins: [],
  };
  