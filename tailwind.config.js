module.exports = {
  purge: {
    enabled: false,
    content: [
      './resources/views/**/*.php',
      './app/View/Components/**/*.php'
    ],
  },
  theme: {
    extend: {
      fontFamily: {
        "moonshiner": ["Montserrat", "sans-serif"]
      },
      colors: {
        blue: {
          100: '#7FF7FD',
          200: '#00DFEA',
          300: '#04AFB7',
        },
        melanzani: {
          100: "#690956",
          200: "#4A073D",
          300: "#290321"
        },
        coral: {
          100: "#EF7C7E",
          200: "#DD5255",
          300: "#A7393B"
        },
        cheddar: {
          100: "#FFD162",
          200: "#FFB400",
          300: "#D98E00"
        },
        grey: {
          100: "#060B10",
          200: "#CCCCCC",
          300 : "#edf2f7"
        }
      }
    },
  },
  variants: {
    borderColor: ['responsive', 'hover', 'focus', 'focus-within'],
  },
  plugins: [
    require('@tailwindcss/ui'),
  ],
}