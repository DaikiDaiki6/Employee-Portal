/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      width: {
        '1/3': '33%',
        '1/2': '50%',
        '1/4' : '25%',
        sm: '480px',
        md: '768px',
        lg: '976px',
        xl: '1440px',
      },
      screens: {
        '450px': '450px',
        '600px' : '600px',
        '902px': '902px',
        '1150px' : '1150px',
      },
      padding: { // Add padding utility
        '12': '3rem',
      },
      height: {
        '4/6': '66.6667%',
      },
      margin: {
        '12' : '12px'
      },
      
    },
  },
  plugins: [],
}

module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        primary: {"50":"#eff6ff","100":"#dbeafe","200":"#bfdbfe","300":"#93c5fd","400":"#60a5fa","500":"#3b82f6","600":"#2563eb","700":"#1d4ed8","800":"#1e40af","900":"#1e3a8a","950":"#172554"}
      }
    },
    theme: {
      fontFamily: {
        'body': [
          'Inter', 
          'ui-sans-serif', 
          'system-ui',
          // other fallback fonts
        ],
        'sans': [
          'Inter', 
          'ui-sans-serif', 
          'system-ui',
          // other fallback fonts
        ]
      }
    }
  },
  plugins: [
      require('flowbite/plugin')
  ],
}

