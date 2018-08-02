# Dominik's Pimcore 5 Project Skeleton

This a skeleton for Pimcore 5 Applications.

This Skeleton comes pre-installed with following features:

 - **CoreShop Pimcore Bundle** -> lot of helpful stuff
 - **CoreShop SEO Bundle** -> SEO like a Pro
 - **Docker** -> fully compatible docker images for PHP7.1 and PHP7.2
 - **Deployer** -> deploy like a Pro

# Setup

**Create a new Project**
```
composer create-project dpfaffenbauer/pimcore-skeleton:5.4
```

**Start docker**
```
docker-compose up -d
```

**Connect to docker**
```
docker-compose exec php bash
```

**Install Pimcore**
```
bin/console vendor/bin/pimcore-install --admin-username=admin \
                                       --admin-password=admin \
                                       --mysql-host-socket=db \
                                       --mysql-username=pimcore \
                                       --mysql-password=pimcore \
                                       --mysql-database=pimcore
```

**DONE**