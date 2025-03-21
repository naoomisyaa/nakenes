import { defineConfig } from 'vite';

export default defineConfig({
  root: '.', // Harus menunjuk ke lokasi index.html
  build: {
    outDir: 'dist', // Pastikan ini ada
  }
});
