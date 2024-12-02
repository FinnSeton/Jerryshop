import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',    // Match all Blade templates
    './resources/**/*.js',                 // Match all JavaScript files
    './resources/**/*.vue',                // Match all Vue components
  ],

  theme: {
    extend: {
      // Extend default colors
      colors: {
        brand: '#1c64f2',
        accent: '#ff6347',
      },
      // Add custom spacing
      spacing: {
        128: '32rem',  // Custom spacing unit
      },
      // Add custom fonts
      fontFamily: {
        sans: ['Figtree', ...defaultTheme.fontFamily.sans],
        serif: ['Merriweather', ...defaultTheme.fontFamily.serif],
      },
      // Custom box shadow
      boxShadow: {
        'brand': '0 4px 6px rgba(28, 100, 242, 0.1)',
      },
    },
  },

  plugins: [forms],

  darkMode: 'media', // Use 'media' strategy for dark mode
};
