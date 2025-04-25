# Usa una imagen base de Node.js
FROM node:14

# Configura el directorio de trabajo dentro del contenedor
WORKDIR /app

# Copia el package.json y package-lock.json para instalar las dependencias
COPY package*.json ./

# Instala las dependencias de Node.js
RUN npm install

# Copia el resto de los archivos del proyecto
COPY . .

# Instala PHP
RUN apt-get update && apt-get install -y php php-cli

# Expón los puertos en los que se ejecutarán los servidores
EXPOSE 3000 80

# Comando para ejecutar ambos servidores (Node.js y PHP) en paralelo
CMD npm start & php -S 0.0.0.0:80 inicio.php
