/** @type {import('tailwindcss').Config} config */
const config = {
  content: ['./index.php', './app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    extend: {
      spacing: {
        'hero': '20rem',
        'heroMax': '65rem',
      },
      height: {
        'slidebig': '40rem',
      },
      colors: {
        primary: "#1475be",
        sh80: {
          green: '#a2eb00',
          orange: '#f27e25',
          purple: '#544787',
          teal: '#458da6',
          offwhite: '#f7ebd5',
        },
      }, // Extend Tailwind's default colors
      fontSize: {
        'h1': ['28px', {
          lineHeight: '34px',
        }],
        'h2': ['24px', {
          lineHeight: '30px',
        }],
        'h3': ['20px', {
          lineHeight: '26px',
        }],
        'h4': ['18px', {
          lineHeight: '22px',
        }],
        'h1-m': ['40px', {
          lineHeight: '34px',
        }],
        'h2-m': ['24px', {
          lineHeight: '28px',
        }],
        'h3-m': ['20px', {
          lineHeight: '30px',
        }],
        'h4-m': ['18px', {
          lineHeight: '22px',
        }],
      },
    },
  },
  plugins: [],
};

export default config;
