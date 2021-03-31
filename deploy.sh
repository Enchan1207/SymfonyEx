#
# Deploy scripts
#

echo "Transfer..."
cd ../
tar czf - SymfonyEx | ssh r-techlab@r-techlab.sakura.ne.jp 'tar zxvf - -C /home/r-techlab/symfony'
