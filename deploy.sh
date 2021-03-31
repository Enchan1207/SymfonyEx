# Deploy scripts

# resolve dependencies
composer install
yarn encore dev

# compression
cd ../
tar -czvf SymfonyEx.tgz SymfonyEx/

# SFTP!
sftp r-techlab@r-techlab.sakura.ne.jp:/home/r-techlab/symfony/ <<< $'put {local_file_path}'
