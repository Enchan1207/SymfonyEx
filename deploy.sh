#
# Deploy Scripts
#

alias console='php bin/console'

# clear cache
console cache:clear

# migration
console doctrine:migrations:migrate
console doctrine:migrations:status

# clear cache
console cache:clear

unalias console
