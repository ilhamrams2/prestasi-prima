export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      keyframes: {
        grow: {
          '0%': { transform: 'scale(0.5)', opacity: '0' },
          '100%': { transform: 'scale(1)', opacity: '1' },
        },
        fadeInScale: {
          '0%': { opacity: '0', transform: 'scale(0.5)' },
          '100%': { opacity: '1', transform: 'scale(1)' },
        },
        fadeInUp: {
          '0%': { opacity: '0', transform: 'translateY(15px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        },
        kingInteractive: {
          '0%': { transform: 'scale(0.5) rotate(-10deg)', opacity: '0' },
          '50%': { transform: 'scale(1.1) rotate(10deg)', opacity: '1' },
          '70%': { transform: 'scale(0.95) rotate(-5deg)' },
          '100%': { transform: 'scale(1) rotate(0)' },
        },
      },
      animation: {
        grow: 'grow 0.8s ease-out forwards',
        fadeInScale: 'fadeInScale 0.8s ease-out forwards',
        fadeInUp: 'fadeInUp 0.8s ease-out forwards',
        kingInteractive: 'kingInteractive 1s ease-out forwards',
      },
    },
  },
  plugins: [],
}
