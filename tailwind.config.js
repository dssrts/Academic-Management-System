import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

  theme: {
        screens: {
          sm: '480px',
          md: '768px',
          lg: '976px',
          xl: '1440px',
        },
        colors: {
          transparent: 'transparent',
          current: 'currentColor',

          'white':{
            10:  "#FFFFFF" ,
            30:  "#D6D7D8" ,
            100: "#141B29" , 
          },

          'black':{
            100:  "#676c72" ,
            200:  "#434343" ,
            300:  "#000000" ,
            400:  "#000000" ,
          },

          'gray':{
            100:  "#676c72" ,
            200:  "#434343" ,
            300:  "#000000" ,
            400:  "#000000" ,
            500:  "#000000" ,
          },


          'blue': {
            hover: '#4F74BB',
            DEFAULT: '#2D349A',
            pressed: '#2D6B9A',
            surface: "#EFF0FF", 
          },

          'gold': {
            hover: '#D2CB65',
            DEFAULT: '#AB830F ',
            pressed: '#C9AE5D',
            surace: '#FFF0E0 ',
            amber: '#D5A106',
          },

          'red': {
            DEFAULT: '#E63049 ',
          },

          'green': {
            DEFAULT: '#378805 ',
            bright: '#07AA07',
          }
        },
        fontSize: {
          'heading1':'32px',
          'heading5':'20px',
          'paragraph2':'16px',
          'paragraph3':'14px',
          'paragraph5':'10px',
          'extra-bold': '72px',
          'title-2': '64px',
          'title-3': '48px',
          'title-4': '40px',
          'title-5': '36px'
        },
        fontFamily: {
          'inter': ['Inter', 'sans-serif'],
          'katibeh': ['Katibeh', 'sans-serif'],
        },
        extend: {
          spacing: {
            '128': '32rem',
            '144': '36rem',
          },
          borderRadius: {
            '4xl': '2rem',
          },
          boxShadow: {
            "double-shadow": "var(--double-shadow)",
          },
          animation: {
            'blob': 'blob 7s linear infinite', // Example animation
          },
          keyframes:{
            blob:{
              "0%":{
                transform: "translate(0px,0px) scale(1)",
              },
              "33%":{
                transform: "translate(30px,-25px) scale(1.2)",
              },
              "66%":{
                transform: "translate(-20px,20px) scale(0.8)",
              },
              "100%":{
                transform: "translate(0px,0px) scale(1)",
              },
            }
          }
      }
    }
  }