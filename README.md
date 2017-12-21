# oc-2200-packs

Opencart 2.2 packages

### MySQL Script

```sql
mysql -u root -p

DROP DATABASE IF EXISTS opencart;
CREATE DATABASE opencart;
CREATE USER opencartuser@localhost;
SET PASSWORD FOR opencartuser@localhost= PASSWORD("yourpassword");
GRANT ALL PRIVILEGES ON opencart.* TO opencartuser@localhost IDENTIFIED BY 'yourpassword';
FLUSH PRIVILEGES;
exit
```
