@servers(['web' => 'adrian@10.200.116.37'])

@setup
    $app_dir = '/var/www/sigai/sigai'
@endsetup

@macro('update')
    update:code
    update:db
@endmacro

@task('update:repo', ['on' => 'web'])
    cd {{ $app_dir }};
    git pull origin master
@endtask

@task('update:code', ['on' => 'web'])
    cd {{ $app_dir }};
    php artisan down
    git pull origin master
    composer update
    bower update
    grunt
    php artisan up
@endtask

@task('update:db', ['on' => 'web'])
    cd {{ $app_dir }};
    php artisan migrate
@endtask

@task('update:db-full', ['on' => 'web'])
    cd {{ $app_dir }};
    php artisan down
    php artisan db:drop --auto
    php artisan db:create
    php artisan migrate
    php artisan migrate
    php artisan db:seed
    php artisan up
@endtask

@task('merge:db', ['on' => 'web'])
    cd {{ $app_dir }};
    php artisan down
    php artisan db:dump --merge-data /tmp/dump.sql
    php artisan db:drop --auto
    php artisan db:create
    php artisan migrate
    php artisan db:seed
    php artisan db:restore /tmp/dump.sql
    php artisan up
@endtask