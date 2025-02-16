/** @type {import('tailwindcss').Config} config */
const config = {
  content: [
    './index.php', './app/**/*.php', './resources/**/*.{php,vue,js}',
    './resources/styles/woocommerce.css'
  ],
  theme: {
    extend: {
      spacing: {
        'hero': '40rem',
        'heroMax': '65rem',
      },
      height: {
        'slidebig': '40rem',
      },
      colors: {
        'sh80-green': '#00FF00', // Preserved but not in use
        'sh80-cula': '#00d2ff',  // New primary color
        'sh80-offwhite': '#F5F5F5',
        primary: "#1475be",
        sh80: {
          orange: '#FF4200',
          purple: '#4000a9',
          blue: '#00D2FF',
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
          lineHeight: '22px',
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
  plugins: [
  ],
};

export default config;
