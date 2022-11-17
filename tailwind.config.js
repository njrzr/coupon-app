/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php"
  ],
  theme: {
    extend: {
      'fontFamily': {
        'noto': 'Noto Sans'
      }
    },
  },
  plugins: [],
}
