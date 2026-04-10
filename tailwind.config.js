/** @type {import('tailwindcss').Config} */
export default {
  // Tambahkan 'class' agar dark mode manual kamu jalan
  darkMode: 'class',

  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    // Jika kamu punya folder khusus di dalam views:
    "./resources/views/pages/**/*.blade.php",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
