#
# Deploy scripts
#

# Resolve dependencies
echo "Resolve dependencies..."
composer update
yarn install
yarn encore prod

ls ~/.ssh
cat ~/.ssh/Config

# Compress and transfer using SFTP
echo "Transfer..."
cd ../
tar czf - SymfonyEx | ssh r-techlab@r-techlab.sakura.ne.jp 'tar zxvf - -C /home/r-techlab/symfony'

