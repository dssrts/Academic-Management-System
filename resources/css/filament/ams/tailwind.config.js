import preset from '../../../../vendor/filament/filament/tailwind.config.preset'
/** @type {import('tailwindcss').Config} */

export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    theme: {
        screens: {
          sm: '480px',
          md: '768px',
          lg: '976px',
          xl: '1440px',
        },
        colors: {
          'blue': '#1fb6ff',
          'purple': '#7e5bef',
          'pink': '#ff49db',
          'orange': '#ff7849',
          'green': '#13ce66',
          'yellow': '#ffc82c',
          'gray-dark': '#Ffffff',
          'gray': '#Ffffff',
          'gray-light': '#Ffffff',
          'plm-blue': '#2D349A',
          'white': '#Ffffff'
  
        },
        fontFamily: {
          sans: ['Inter', 'sans-serif'],
          serif: ['Inter', 'serif'],
        },
        extend: {
          spacing: {
            '128': '32rem',
            '144': '36rem',
          },
          borderRadius: {
            '4xl': '2rem',
          },
          backgroundImage: {
            'school': "url('images/school.jpg')",
            'footer-texture': "url('/img/footer-texture.png')",
          }
        }
      }
}

