/** @type {import('tailwindcss').Config} */
export default {
    mode: 'jit',
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./resources/**/*.html",
        "./resources/**/*.css",
    ],
    theme: {
        extend: {},
    },
    plugins: [],
}
