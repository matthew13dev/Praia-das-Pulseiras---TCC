FROM php:8.1-apache

# Copia os arquivos da pasta src para o diretório padrão do Apache


# Define as permissões corretas para os arquivos
RUN chown -R www-data:www-data /var/www/html && \
    find /var/www/html -type d -exec chmod 755 {} \; && \
    find /var/www/html -type f -exec chmod 644 {} \;

# Expõe a porta 80
EXPOSE 80
