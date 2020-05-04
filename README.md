# eShopCart lightweight

Cart management - on the fly - with no database and no authentification
- Product list importation from custom .csv file loading
- Cart storage in the client session using cookies
- Place order save and export on the disk and/or via email options

### Requirement
- Server side : PHP 7.2
- Client side : HTML5 / CSS3 / Javascript

### Configuration
- CONFIG/config.inc.php (server set up)
- CONFIG/objects.csv for example (contain datas see example file structure in project )

### CSV File informations
- separator with ; (semicolon)
- first row default heading name  : ID | NAME | PRICE | CATEGORY | DESCRIPTION
- possible to set custom vars by adding after the default

### Update changelog
v1.2 :
- array key name collection ID from csv header
- initiate reservation list for customer

v1.1 :
- export cart's data in csv for reservation
- material icon webkit import
- improved webkit lisibility
- cart adding product animation

### Todo
- modify quantity in the Manager
- easier installation
- email confirmation
- reservation module for seller management
