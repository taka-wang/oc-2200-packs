# Telephone in Address

I rewrite this [module](https://www.opencart.com/index.php?route=marketplace/extension/info&extension_id=11702&filter_category_id=21&filter_license=0&filter_download_id=42&page=5) in ocmod format for opencart 2.2.

## Usage

In country management panel, add your address format with `{telephone}` field. Since the address format is transcation based, thus it will take affect from the next order.

## Example

```
{firstname}{company}
{postcode} {zone} {address_1}
{telephone}
```