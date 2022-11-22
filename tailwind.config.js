/** @type {import('tailwindcss').Config} */
module.exports = {
  mode: 'jit',
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
