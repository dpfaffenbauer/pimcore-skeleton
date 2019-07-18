# Dominik's Pimcore Project Skeleton

This a skeleton for Pimcore Applications.

This Skeleton comes pre-installed with following features:

 - **CoreShop Pimcore Bundle** -> lot of helpful stuff
 - **CoreShop SEO Bundle** -> SEO like a Pro
 - **Docker** -> fully compatible docker images for PHP7.1 and PHP7.2 AND PHP7.3
 - **Deployer** -> deploy like a Pro

# Setup

**Create a new Project**
```
composer create-project dpfaffenbauer/pimcore-skeleton:6.0
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
vendor/bin/pimcore-install --admin-username=admin \
                                       --admin-password=admin \
                                       --mysql-host-socket=db \
                                       --mysql-username=pimcore \
                                       --mysql-password=pimcore \
                                       --mysql-database=pimcore
```

**DONE**
