@servers(['web' => 'deployer@localhost -p 22'])

@task('deploy', ['on' => 'web'])
    cd /var/www/gitlab-deploy
    git pull origin main
    composer install --no-dev --optimize-autoloader
    php artisan migrate --force
    php artisan config:cache
    php artisan route:cache
    echo "Deployment selesai!"
@endtask
