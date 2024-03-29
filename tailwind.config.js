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
                'white-alt': '#f6f6f6',
            },
            borderColor: {
                wisp: '#E7F6FF',
                creame: '#FEF5EA',
                steel: '#E3EDF8',
            },
            gridTemplateColumns: {
                'mod-3': '1fr 1fr 85px',
                'mod-3-2': '1fr 150px 150px',
            }
        },
    },
    plugins: [],
    tailwindAttributes: ['myClassList'],
}