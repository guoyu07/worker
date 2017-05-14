FROM php:5.6-cli

# Installing git to install dependencies later and necessary libraries for postgres
# and mysql including client tools. You can remove those if you don't need them for your build.
RUN apt-get update && \
    apt-get install -y \
      git

# Install Composer and make it available in the PATH
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

# Set the WORKDIR to /app so all following commands run in /app
WORKDIR /app

# Copy composer file into the app directory.
COPY composer.json ./

# Install dependencies with Composer.
# --prefer-source fixes issues with download limits on Github.
# --no-interaction makes sure composer can run fully automated
RUN composer install --prefer-source --no-interaction

# Copy all files into the app directory.
COPY . ./

# Run unittest when container launches
CMD ["php", "./vendor/bin/phpunit"]
