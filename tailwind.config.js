/** @type {import('tailwindcss').Config} */
module.exports = {  
  plugins: [
    // ...
    require('tailwindcss'),
    require('autoprefixer'),
    require("daisyui"),
    // ...
  ],
  content: [
  "./resources/**/*.blade.php",
  "./resources/**/*.js",
  "./resources/**/*.vue",
],
variants: {
  width: ["responsive", "hover", "focus"],
  height: ["responsive", "hover", "focus"]
},
  theme: {
    screens: {
      sm: '480px',
      md: '768px',
      lg: '1024px',
      xl: '1280px',
      '2xl': '1536px',
    },
    extend: {},
  },
}