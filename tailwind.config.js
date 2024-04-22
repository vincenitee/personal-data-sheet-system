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
                'mod-2': '1fr 12%',
                'mod-3': '1fr 1fr 40px',
                'mod-4': '1fr 1fr 1fr 50px',
                'mod-3-2': '1fr 150px 150px',
                'mod-5': '1fr 1fr 130px 130px 95px',
                'mod-7': 'repeat(6, minmax(0, 1fr)) 80px'
            },
            gridTemplateRows: {
                'mod-3': 'auto 2fr auto'
            },
            transitionProperty: {
                width: 'width',
            },
        },
    },
    plugins: [
        require('@tailwindcss/typography'),
    ],
    tailwindAttributes: ['myClassList'],
}
