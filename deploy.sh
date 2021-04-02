#
# Deploy Scripts
#

alias console='php bin/console'

# move to deploy destination
DESTINATION="SymfonyEx"
cd DESTINATION

# clear cache
console cache:clear

# migration
console doctrine:migrations:migrate
console doctrine:migrations:status

# clear cache
console cache:clear

# finishing
unalias console
