/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      backgroundImage: {
        'marvel-nav': "url('/public/img/Marvel.png')",
      }
    },
    fontFamily: {
      sans: ['Ysabeau SC', ],
      serif: ['Merriweather', 'serif'],
      orbitron: ['Orbitron']
      
    },
  },
  plugins: [],
}