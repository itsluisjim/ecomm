# 🐆 JagTech E-Commerce Website 

Our motivation for developing this system is to be able to provide affordable computers for students. Another reason behind developing this system is put good use of hardware that is not being used by the Information Technology Department. The proposed system will allow students to purchase surplused inventory from the IT department at an affordable price. This system is intended for students and faculty who are associated with the University either through enrollment or employment.

## 💻 Tech Stack:
![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white) ![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white)  ![JavaScript](https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E) ![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white) ![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white) 


## Requirement Specification

* ### User Requirements
    1. The system shall allow the user to create an account and be able to log in.
    2. The system shall allow users to filter items based on price, category, and brand.
    3. The system shall allow users to add/remove items to their shopping cart.
    4. The system shall display information about items to the user like an image, price, status, and a short item description.
    5. The system shall allow the user to view the item from clicking on the item card.
    6. The system shall allow the user checkout items.
    7. The system shall allow the user to navigate to different pages through a navigation bar.
    8. The system shall store the information on items available to sell in a database.


* ### System Requirements
    1. Most of pages the user is on, will contain a header at the top of each page the header will contain the home button, account button, the shopping cart, and a nav bar.
    
    2. The home page will show a message from the university and a section for featured products. Should the user click on an item card, the user will be taken to a specific page with the item and more details.
    
    3. Should the user click on a category, all items meeting that criteria will be loaded on the page. Clicking on either the name or the picture of an item will bring up the specific item.
    
    4. When the user clicks on an image, a page must load the specific image with its description of use, name of the item, and price of the item. The item will have a button that allows the user to add to cart. The availability of the item, the price of the item, and the name of the item will be stored in a database. If the database holds the value of "not available" for availability, the webpage will not load the product.
    
    5. The cart page must update each time a button is clicked on the web-page with the item that the “Add to Cart” button was clicked on. The cart icon will show the user the number of items they have added to their cart by displaying a number badge over the cart if the user is not on the cart page. The cart page must also contain a “remove from cart” button to clear the selected item. There must be another button on the cart page to proceed to checkout, which will load a generic receipt.
    
    6. The account page will display their basic user account information such as email, name and last name.
    
    7. The administrator account will be able to add more items into the stock through the website itself. The backend database should update with the information added through the admin page and the product page should display the information after it is entered into the system.

# User Interface
## Homepage
![ActiveUserHomepage](https://user-images.githubusercontent.com/105807191/230662027-5f9bc230-937a-474a-a563-e60699dfcf0f.png)

## Product Page
![ProductPage](https://user-images.githubusercontent.com/105807191/230662059-85128495-b379-44a3-a0e6-78324d1f3324.png)

## Item Page
![Item](https://user-images.githubusercontent.com/105807191/230662225-1a2ac566-ce4e-4e90-ba0c-fc239f27c64a.png)

## Cart Page
![Cart](https://user-images.githubusercontent.com/105807191/230662072-47f2c27e-b26f-4b2b-abeb-c3ee09bfd614.png)

## Checkout Page
![Checkout](https://user-images.githubusercontent.com/105807191/230662080-4b454d78-82e2-485a-bb81-761af40332fc.png)

# Authentication

## Login
![Login](https://user-images.githubusercontent.com/105807191/230662427-6d01d3ac-b714-417f-ac6d-81af1fd2ec99.png)

The Login Page requires users to enter their System ID and Password to access their account. If the information that is provided is incorrect, a message will appear notifying the user of the error. If users forgot their password, they can click on the ’forgot password’ link. The forgot password link is a dead link, we did not create a system that can handle password resets. It will be left for future implementation. For those who do not have an account, they can click the ’Create an Account’ link to register. The page also includes a ’Return to homepage’ button that allows users to navigate back to the homepage.

## Sign-Up
![create](https://user-images.githubusercontent.com/105807191/230662444-6793a14d-e662-4eae-a1b0-73b451e1ef2a.png)

The Create Account Page allows users to easily create an account by providing their First name, Last name, Email, System ID, and Password. After entering their information, they can create their account or log in using the provided link. Every error is handled through a JavaScript query selector that activates through an event handler when information changes in the query. If the inputted information is wrong or incomplete, a CSS error is displayed, and the button remains disabled. If the System ID entered is not exactly 8 digits long, the CSS error class will be applied using JavaScript, and the button will remain inactive until the correct digit count is implemented. This same process is applied to email, password, and confirm password.
