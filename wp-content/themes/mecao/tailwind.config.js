const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{php,html,js}", "./template-parts/*.{php,html,js}", "./rankings/*.{php,html,js}"],
  theme: {
    screens: {
      sm: '480px',
      md: '768px',
      lg: '976px',
      xl: '1440px',
    },
    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      white: '#FFFFFF',
      black: '#000000',
      stone: colors.stone,
      gray: {
        dark: '#2b2b2b',
        DEFAULT: '#808080',
        light: '#78716c'
      },
      'red': {
        DEFAULT: '#E41920',
        dark: '#CF171D',
      },
      'yellow': {
        light: '#FFFF00',
        DEFAULT: '#FACC15',
        dark: '#F0C105'
      },
      'blue': {
        DEFAULT: '#2A28A2',
        dark: '#201E7B'
      },
    },
    fontFamily: {
      'sans': ['Satoshi', 'sans-serif'],
      'display': ['Array', 'sans-serif'],
      'mono': ['Roboto Mono'],
    },
    boxShadow: {
      'small': '0 0 10px 0 rgb(0 0 0 / 0.06)',
      DEFAULT: '0 4px 4px 0 rgb(0 0 0 / 0.08), 0 2px 3px 0 rgb(0 0 0 / 0.09)',
    },
    textShadow: {
      sm: '0 1px 2px var(--tw-shadow-color)',
      DEFAULT: '0 2px 4px var(--tw-shadow-color)',
      lg: '0 8px 16px var(--tw-shadow-color)',
    },
    extend: {
      gridTemplateColumns: {
        'home-matches': '72px 1fr 72px',
        'match-score': ' 56px minmax(0, 1fr) 80px',
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
}

