FROM node:22-alpine

WORKDIR /app

# Menyalin konfigurasi dependency
COPY package*.json ./

# Menginstal dependency
RUN npm ci --omit=dev

# Menyalin kode backend
COPY . .

EXPOSE 3000

CMD ["npm", "start"]