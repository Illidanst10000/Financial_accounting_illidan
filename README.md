
## Financial accounting

It's my laravel project for upgrade my skills. There I tried to do application about my finance for myself and friends. In general there is a simple functional for create/update/delete and look on your finance.

## Some info for you

- Earnings and spendings - main functional where you can count your money, plus or minus $$$

- Earnings create with Source - way how you get money - salary, sell smth, etc

- Spendings create with Category and Tags

- Category - it means where you spend money - Food, Clothes, Medicine, etc. (Now only admin can create Categories)

- Tag - more information about Category or smth else - if you choose Food you can also add "McDonalds" as tag. It's up to you

- For every user there is Balance. Balance - it's 4 accounts: Debit (card), Credit(card), Cash, Debt. When you create earn or spend you also have to choose on of this part of balance.

- Transfer - you can send money between accounts. For example you take cash from your Debit card - you create Transfer.

## API

Now I have main functional API:

- Auth with JWT token

CRUD for

- Earnings
- Spendings
- Tags
- Transfers

