/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ['./public/**/*.{html, js, php}', './public/**/*'],
    theme: {
        container: {
            center: true,
            // padding: '1rem',
        },
        extend: {
            fontFamily: {
                poppins: ['Poppins'],
            },
            backgroundColor: {
                wisp: '#E7F6FF',
                creame: '#FEF5EA',
                steel: '#E3EDF8',
            },
            borderColor: {
                wisp: '#E7F6FF',
                creame: '#FEF5EA',
                steel: '#E3EDF8',
            },
        },
    },
    plugins: [],
    tailwindAttributes: ['myClassList'],
}
