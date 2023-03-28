
## Financial accounting

This is my Laravel project that I created to improve my skills. It is an application for managing finances for myself and my friends. The main functionalities are creating, updating, deleting, and viewing your finances.

## Some info for you

- `Earnings` and `spendings` are the main functions that allow you to track your money, whether it's an addition or subtraction of $$$.

- `Earnings` are created with Sources, which are ways you receive money, such as salary, selling something, etc

- `Spendings` are created with Categories and Tags

- `Category` is where you spend money, such as Food, Clothes, Medicine, etc.

- `Tag` provides additional information about the category or other relevant details. For example, if you choose Food, you can also add "McDonald's" as a tag.

- Each user has a `Type`, which represents their accounts. For example, Debit (card), Credit (card), Cash, Debt. When you create an earning or spending, you must also select one of these account types.

- `Transfer` allows you to send money between accounts. For example, if you withdraw cash from your Debit card, you create a transfer.

## API

You can access the API documentation by navigating to the `/api/documentation` route.

---

The project is still under development, and I plan to make some changes to the application architecture to make it more flexible for users. I will add many new features, including asynchronous functionality, numerous charts, and sorting for earnings and expenses. There may be changes to the frontend, as well as the creation and integration of a Telegram bot. Additionally, since the project is private, there is no user registration, and only an administrator can create users.
