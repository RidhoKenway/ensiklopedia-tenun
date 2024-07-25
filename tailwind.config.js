/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './index.html', 
    './*.{html,js,php}',
    './tenun/*.{html,js,php}',
    './testimoni/*.{html,js,php}',
    './admin/*.{html,js,php}',
    './admin/**/*.{html,js,php}',
    './JAWA/*.{html,js}', './SUMATERA/*.{html,js}', './SULAWESI/*.{html,js}', './KALIMANTAN/*.{html,js}', './PAPUA/*.{html,js}'
  ],
  theme: {
    container: {
      center: true,
      padding: '16px',
    },
    extend: {
      fontFamily: {
        Montserrat: ['Montserrat'],
        Jawa: ['Playfair Display'],
      },
      colors: {
        Ijo: '#007367',
        Sumatera: '#1D1B16',
        Merah: '#E02401',
      },
    },
  },
  corePlugins: {
    aspectRatio: false,
  },
  plugins: [
    require('@tailwindcss/aspect-ratio'),
    require('preline/plugin'),
  ],
}

