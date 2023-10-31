# Doc
## Installation guide
### Install dependencies
```bash
git clone https://github.com/Codeshaper-bd/dashcode-laravel.git
cd dashcode-laravel
cp .env.example .env
# If you are using api make IS_API_PROJECT=true in env file
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed
# if public/storage folder is present in public folder then remove it.
php artisan storage:link 
npm install
```
### Run the app
```bash
npm run dev
```

### Testing configuration
*  enable pdo_sqlite on php extension in laragon
* sudo apt install php8.1-sqlite3

## Multi-language support
- [x] Search in second search box. Choose flag name from [iconify](https://icon-sets.iconify.design/emojione/).
- [x] Eg. 'Bangladesh' searched in [iconify](https://icon-sets.iconify.design/emojione/) then select icon provider `emojione` and then copy the country name part from the icon name. Eg. `emojione:flag-for-bangladesh` copied `bangladesh`.
- [x] Add your language code and flag name to the `available_locales` array in `config/app.php`. Eg. `[.. , 'bd' => 'bangladesh', ..]`
- [x] Create a new json file in `lang/` with the name of your language code. Eg. `lang/bd.json`
- [x] Copy the content of `lang/en.json` to your new json file.
- [x] Translate the content of your new json file.

# Api Documentation
## Authentication
- [x] Postman [collection](https://api.postman.com/collections/24461563-44d29f80-f3c6-443d-b974-673814076daa?access_key=PMAT-01GJA5RV70QHN3434V13CKFCCW)
