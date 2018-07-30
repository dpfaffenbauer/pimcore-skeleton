<?php

namespace Deployer;

require __DIR__ . '/vendor/deployer/deployer/recipe/symfony3.php';  //Comes form deployer.phar
require __DIR__ . '/vendor/w-vision/pimcore-deployer/recipes/pimcore.php';
require __DIR__ . '/vendor/w-vision/pimcore-deployer/recipes/yarn.php';

host('host.host.host')
    ->user('user')
    ->port(22)
    ->set('deploy_path', '/var/www')
    ->identityFile('.deployer/id_deployer')
    ->stage('dev')
    ->set('branch', 'master');

// Project Configuration
set('repository', 'repo');

// Configuration
//set('ssh_type', 'ext-ssh2');

set('default_stage', 'dev');
set('shared_files', [
    'app/config/parameters.yml',
    'var/config/system.php',
    'var/config/debug-mode.php',
    'var/config/maintenance.php',
    'var/config/reports.php',
    'var/config/GeoLite2-City.mmdb',
    'var/bundles/LuceneSearchBundle/state.cnf'
]);
set('shared_dirs', [
    'web/var',
    'var/email',
    'var/recyclebin',
    'var/versions',
    'var/sessions',
    'var/bundles/LuceneSearchBundle/index',
    'var/bundles/LuceneSearchBundle/site-map'
]);
set('pimcore_shared_configurations', [
    'var/config/website-settings.php',
    'var/config/reports.php',
    'var/config/web2print.php',
    'var/config/workflowmanagement.php',
    'var/config/importdefinitions.php'
]);

/*set('bin/php', function () {
    return '/opt/cpanel/ea-php72/root/usr/bin/php';
});*/

/*set('bin/composer', function() {
    return '{{bin/php}} composer.phar';
});*/

desc('Deploy your project');
task('deploy', [
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:assets:install',
    'deploy:yarn:install',
    'deploy:yarn:encore:production',
    'deploy:clear_paths',
    'deploy:pimcore:install-classes',
    'deploy:pimcore:migrate',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
])->desc('Deploy your project');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');