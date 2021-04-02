#
# Deploy Scripts
#

# move to deploy destination
DESTINATION="SymfonyEx"
cd $DESTINATION

# clear cache
php bin/console cache:clear

# migration
yes | php bin/console doctrine:migrations:migrate
php bin/console doctrine:migrations:status

# clear cache
php bin/console cache:clear

